<?php

namespace FridgeCodeWebApp\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = DB::table('users')
            ->select('id')
            ->where('email', Auth::user()->email)->first();
            
        $data = DB::table('products')
            ->join('purchases', 'purchases.barcode', '=', 'products.barcode')
            ->join('units', 'units.id', '=', 'purchases.unit_id')
            ->select('products.name', 'products.picture_url', 'products.barcode', 'products.expiration', 'purchases.number_of_item', 'units.unitName')
                ->where('purchases.user_id', '=', $user_id->id)
            ->orderBy('products.name')
            ->get();

        foreach($data as $item) {
            if($item->expiration < date('Y-m-d',strtotime("+10 day"))) {
                session()->flash('danger', 'The product will expire soon');
            }
            if($item->number_of_item < 2 && strcmp($item->unitName, 'piece') !== 0) {
                session()->flash('warning', 'Slowly out of stock');
            }
        }

        return view('home', compact('data'));
    }

    public function show($id) {
        $data = DB::table('products')
            ->join('purchases', 'purchases.barcode', '=', 'products.barcode')
            ->join('units', 'units.id', '=', 'purchases.unit_id')
            ->join('locations', 'locations.id', '=', 'products.location_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.name', 'products.picture_url', 'products.barcode', 'products.expiration', 'purchases.number_of_item', 'units.unitName', 'brands.brandName', 'locations.locationName')
                ->where('products.barcode', '=', $id)
            ->get();


        return view('product', compact('data'));
    }
}

