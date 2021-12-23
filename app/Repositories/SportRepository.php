<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use GuzzleHttp\Client;
use App\Repositories\SportRepositoryInterface;

class SportRepository implements SportRepositoryInterface
{

    public function retrieveAll()
    {
        //dd('from SportRepository');
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'all_sports.php');
        return json_decode($response->getBody()->getContents(),true)["sports"];
        
    }
}