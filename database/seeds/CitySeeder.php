<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\City;
use App\Country;



class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $countries = Country::all();
         foreach($countries as $country){
        $client = new Client();
        $res = $client->request('GET', "https://battuta.medunes.net/api/city/ng/search/?region=$country->region&key=b0e88810a32a7bede34383767d07eb40");
  			$response = json_decode($res->getBody()->getContents());
  	    	foreach ($response as  $h) {
            // foreach($h->photos as  $p){
  	        	City::firstorCreate([
  	        		'city' => $h->city,
  	        		'region' => $h->region,
  	        		'country' => $h->country,
  	        		'latitude' => $h->latitude,
  	        		'longitude' => $h->longitude,
  	            ]);
    	     }
    	}
    }
}