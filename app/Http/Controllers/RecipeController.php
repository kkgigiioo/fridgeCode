<?php

namespace FridgeCodeWebApp\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    
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
        


    public function apis() {
        
        $recipe = $this->connect();

        return view('recipe', compact('recipe')); 
    }

    public function show($id) {
        $recipe = $this->connect();
        $test = $recipe['results'][$id];

        return view('oneRecipe', compact('test'));
    }
}
