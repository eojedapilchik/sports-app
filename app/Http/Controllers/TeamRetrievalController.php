<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\TeamRepositoryInterface;
use Illuminate\Support\Collection;

class TeamRetrievalController extends Controller
{
    //private SportRepositoryInterface $sportRepository;
    private $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository) 
    {
        $this->teamRepository = $teamRepository;
    }

    public function indexByLeague($league_id)
    {
        $teams =$this->teamRepository->retreiveAllByLeague($league_id);
        return view('teams',['teams'=>$teams]);
    }
}