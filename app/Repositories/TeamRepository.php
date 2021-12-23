<?php

namespace App\Repositories;

use App\Repositories\SportRepositoryInterface;
use GuzzleHttp\Client;

class TeamRepository extends AbstractRepository implements TeamRepositoryInterface
{

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/50130162/',
            'timeout'  => 2.0,
        ]);
    }

    public function retreiveAllByLeague($league_id)
    {
        $response = $this->client->request('GET', 'lookup_all_teams.php?id='.$league_id);
        $teams = json_decode($response->getBody()->getContents(),true)["teams"];
        return $teams;
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
}