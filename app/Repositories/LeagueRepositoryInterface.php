<?php

namespace App\Repositories;

interface LeagueRepositoryInterface
{
    public function findByField($field,$value);
}