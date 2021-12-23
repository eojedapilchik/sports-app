<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\LeagueRepositoryInterface;
use Illuminate\Support\Collection;

class LeagueRetrievalController extends Controller
{
    //private SportRepositoryInterface $sportRepository;
    private $leagueRepository;

    public function __construct(LeagueRepositoryInterface $leagueRepository) 
    {
        $this->leagueRepository = $leagueRepository;
    }

    public function indexBySport($sport)
    {
        $league =$this->leagueRepository->findByField("strSport",$sport);
        dd($league);
        return view('welcome',['sports'=>$sports]);
    }
}