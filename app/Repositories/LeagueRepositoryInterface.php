<?php

namespace App\Repositories;

interface LeagueRepositoryInterface extends RepositoryInterface
{
    public function findByField($field,$value);
}