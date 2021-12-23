<?php

namespace App\Repositories;

use App\Repositories\SportRepositoryInterface;
use App\Repositories\AbstractRepository;

class SportRepository extends AbstractRepository implements SportRepositoryInterface
{

    public function retrieveAll()
    {
        $response = $this->client->request('GET', 'all_sports.php');
        return json_decode($response->getBody()->getContents(),true)["sports"];
        
    }
}