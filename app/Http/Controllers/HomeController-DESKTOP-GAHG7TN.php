<?php

namespace FridgeCodeWebApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
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
    //display products on the main page + display specific items
    public function index()
    {
        //temékek listázása adatbázisból
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

        //recipes for expiring products
        $dataForRecipe = $this-> equalRecipe();

        if(isset($dataForRecipe)) {
            return view('home', compact('data', 'dataForRecipe'));
        }
        else {
            return view('home', compact('data'));
        }
        
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

    public function search() {
        $dataForRecipe = $this->equalRecipeSearch();

        $recipe = $this->connect();
        $data = DB::table('products')
            ->select('products.name')
            ->get();

        for($i =0; $i < count($recipe['results']); $i++) {
            if( isset($recipe['results'][$i]['sections']) ) {
                for($j=0; $j < count($recipe['results'][$i]['sections']); $j++){
                    for($k=0; $k < count($recipe['results'][$i]['sections'][$j]['components']); $k++) {
                        foreach($data as $item) {
                            if( strpos(strtolower($item->name), strtolower($recipe['results'][$i]['sections'][$j]['components'][$k]['ingredient']['name'])) !==false ){
                                $id = [$i];
                            }
                        }
                        
                    }
                }
            }
            else {
                for($j=0; $j < count($recipe['results'][$i]['recipes'][0]['sections']); $j++) {
                    for($k=0; $k < count($recipe['results'][$i]['recipes'][0]['sections'][$j]['components']); $k++) {
                        foreach($data as $item) {
                            if( strpos(strtolower($item->name), strtolower($recipe['results'][$i]['recipes'][0]['sections'][$j]['components'][$k]['ingredient']['name'])) !==false ){
                                $id = [$i];
                            }
                        }
                    }
                }
            }
        }
        
        return view('recipeSearch', compact('dataForRecipe', 'id'));
    }

//-------------------------------------------------------------------------------------------------------------------------------------------------//
    //recipe api connection
    private function connect() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://tasty.p.rapidapi.com/recipes/list?from=0&sizes=5000",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: tasty.p.rapidapi.com",
                "x-rapidapi-key: 5026982454msh199a5c4402ea26cp10a4cajsn730bff034f6b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
    
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $recipe = json_decode($response, true);
        }

        return $recipe;
    }

    //comparison of recipes with products
    private function equalRecipe() {
        $recipe = $this->connect();
        $data = DB::table('products')
            ->select('products.name')
            ->get();

        for($i =0; $i < count($recipe['results']); $i++) {
            if( isset($recipe['results'][$i]['sections']) ) {
                for($j=0; $j < count($recipe['results'][$i]['sections']); $j++){
                    for($k=0; $k < count($recipe['results'][$i]['sections'][$j]['components']); $k++) {
                        foreach($data as $item) {
                            if( strpos(strtolower($item->name), strtolower($recipe['results'][$i]['sections'][$j]['components'][$k]['ingredient']['name'])) !==false ){
                                $dataForRecipe = [$recipe['results'][$i]['sections'][$j]['components'][$k]['ingredient']['name']];
                            }
                        }
                        
                    }
                }
            }
            else {
                for($j=0; $j < count($recipe['results'][$i]['recipes'][0]['sections']); $j++) {
                    for($k=0; $k < count($recipe['results'][$i]['recipes'][0]['sections'][$j]['components']); $k++) {
                        foreach($data as $item) {
                            if( strpos(strtolower($item->name), strtolower($recipe['results'][$i]['recipes'][0]['sections'][$j]['components'][$k]['ingredient']['name'])) !==false ){
                                $dataForRecipe = [$recipe['results'][$i]['recipes'][0]['sections'][$j]['components'][$k]['ingredient']['name']];
                            }
                        }
                    }
                }
            }
        }
        return $dataForRecipe;
    }

    private function equalRecipeSearch() {
        $recipe = $this->connect();
        $data = DB::table('products')
            ->select('products.name')
            ->get();

        for($i =0; $i < count($recipe['results']); $i++) {
            if( isset($recipe['results'][$i]['sections']) ) {
                for($j=0; $j < count($recipe['results'][$i]['sections']); $j++){
                    for($k=0; $k < count($recipe['results'][$i]['sections'][$j]['components']); $k++) {
                        foreach($data as $item) {
                            if( strpos(strtolower($item->name), strtolower($recipe['results'][$i]['sections'][$j]['components'][$k]['ingredient']['name'])) !==false ){
                                $dataForRecipe = [$recipe['results'][$i]];
                            }
                        }
                        
                    }
                }
            }
            else {
                for($j=0; $j < count($recipe['results'][$i]['recipes'][0]['sections']); $j++) {
                    for($k=0; $k < count($recipe['results'][$i]['recipes'][0]['sections'][$j]['components']); $k++) {
                        foreach($data as $item) {
                            if( strpos(strtolower($item->name), strtolower($recipe['results'][$i]['recipes'][0]['sections'][$j]['components'][$k]['ingredient']['name'])) !==false ){
                                $dataForRecipe = [$recipe['results'][$i]];
                            }
                        }
                    }
                }
            }
        }
        return $dataForRecipe;
    
    }
}

