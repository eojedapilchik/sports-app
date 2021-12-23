<?php

namespace App\Repositories;

use App\Repositories\SportRepositoryInterface;

class LeagueRepository extends AbstractRepository implements LeagueRepositoryInterface
{

    public function retrieveAll()
    {
        //dd('from SportRepository');
        $response=$this->client->request('GET', 'all_leagues.php');
        return json_decode($response->getBody()->getContents(),true)["leagues"];    
    }

    public function findById($id)
    {
        $response=$this->client->request('GET', 'all_leagues.php');
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
        $response = $this->client->request('GET', 'all_leagues.php');
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