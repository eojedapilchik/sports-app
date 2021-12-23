<?php
namespace App\Repositories;
use GuzzleHttp\Client;

abstract class AbstractRepository
{

    protected $client;

    public function __construct()
    {

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.thesportsdb.com/api/v1/json/2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        //dd($client);
    }
}