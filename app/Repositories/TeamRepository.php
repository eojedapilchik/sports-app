<?php

namespace App\Repositories;

use App\Repositories\SportRepositoryInterface;

class LeagueRepository extends AbstractRepository implements TeamRepositoryInterface
{

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/50130162/',
            'timeout'  => 2.0,
        ]);
    }

    public function findByTeamId($id)
    {
        
        $response=$this->client->request('GET', 'lookupteam.php?id='.$id);
        $leagues = json_decode($response->getBody()->getContents(),true)["teams"];
        $filtered = array_filter($leagues, function($league) use($id){
            if(isset($league)){
                if($league['idLeague']== $id) return true;
            }
            return false;
        });
        return $filtered;
    }

    public function retreiveAllByLeague($league_id)
    {
        $response = $this->client->request('GET', 'lookup_all_teams.php?id='.$league_id);
        $leagues = json_decode($response->getBody()->getContents(),true)["teams"];
        $filtered = array_filter($leagues, function($league) use($field,$value){
            if(isset($league)){
                if($league[$field]== $value) return true;
            }
            return false;
        });
        return $filtered;
    }
}