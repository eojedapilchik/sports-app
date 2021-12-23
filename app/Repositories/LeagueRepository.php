<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use GuzzleHttp\Client;
use App\Repositories\SportRepositoryInterface;

class LeagueRepository implements LeagueRepositoryInterface
{
    /*protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }*/

    public function retrieveAll()
    {
        //dd('from SportRepository');
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'all_leagues.php');
        return json_decode($response->getBody()->getContents(),true)["leagues"];
        
    }

    public function findById($id)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'all_leagues.php');
        $leagues = json_decode($response->getBody()->getContents(),true)["leagues"];
        $filtered = array_filter($leagues, function($league) use($id){
            if(isset($league)){
                if($league['idLeague']== $id) return true;
            }
            return false;
        });
        return $filtered;
    }

    public function findByField($field,$value)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'all_leagues.php');
        $leagues = json_decode($response->getBody()->getContents(),true)["leagues"];
        $filtered = array_filter($leagues, function($league) use($field,$value){
            if(isset($league)){
                if($league[$field]== $value) return true;
            }
            return false;
        });
        return $filtered;
    }
}