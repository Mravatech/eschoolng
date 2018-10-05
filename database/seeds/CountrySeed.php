<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\Country;


class CountrySeed extends Seeder
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
        $res = $client->request('GET', "https://battuta.medunes.net/api/region/ng/all/?key=b0e88810a32a7bede34383767d07eb40");
  			$response = json_decode($res->getBody()->getContents());
  	    	foreach ($response as  $h) {
            // foreach($h->photos as  $p){
  	        	Country::firstorCreate([
  	        		'country' => 'NG',
  	        		'region' => $h->region,
  	            ]);
    	        }
    }
}
