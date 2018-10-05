<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\Data;



class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $client = new Client();
        $res = $client->request('GET', "https://maps.googleapis.com/maps/api/place/textsearch/json?query=mosque+in+nigeria&key=AIzaSyAyV9IYZc12a7-Lh9DpimpNNJmXADIkG80");
  			$response = json_decode($res->getBody()->getContents());
        $count = 392;
        for ($i = 1; $i < $count; $i++) {
          
        }

  	    	foreach ($response->results as  $h) {
            // foreach($h->photos as  $p){
  	        	Data::firstorCreate([
                  'formatted_address' => $h->formatted_address,
  		        	  'lat' => $h->geometry->location->lat,
  		            'lng' => $h->geometry->location->lng,
  		            'icon' => $h->icon,
  		            'google_id' => $h->id,
  		            'name' => $h->name,
  		            'place_id' => $h->place_id,
  		            'rating' => $h->rating,
  		            'reference' => $h->reference,
                  'pagetoken' => $response->next_page_token,
  	            ]);
    	        }
            }
          }
