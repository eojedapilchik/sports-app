<?php

namespace App\Repositories;

interface TeamRepositoryInterface
{
    public function retreiveAllByLeague($league_id);
    public function findByTeamId($id);
}