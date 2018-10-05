<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\Data;
use App\City;
use App\Country;

class ExtSeeder extends Seeder
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
        $res = $client->request('GET', "https://maps.googleapis.com/maps/api/place/textsearch/json?query=mosque+in+$country->region&key=AIzaSyAyV9IYZc12a7-Lh9DpimpNNJmXADIkG80");
        $response = json_decode($res->getBody()->getContents());
          foreach ($response->results as  $h) {
            // foreach($h->photos as  $p){
            if(isset($response->next_page_token)){
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
                $page = Data::orderby('id', 'desc')->select('pagetoken')->first();
                if($page === TRUE){
                $client = new Client();
                $res = $client->request('GET', "https://maps.googleapis.com/maps/api/place/textsearch/json?query=mosque+in+$country->region&key=AIzaSyAyV9IYZc12a7-Lh9DpimpNNJmXADIkG80&pagetoken".$page);
                $response = json_decode($res->getBody()->getContents());


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
              }else{
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
                ]);
              }
            }
          }
        }
      }
