<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\SportRepositoryInterface;
use Illuminate\Support\Collection;

class SportRetrievalController extends Controller
{
    //private SportRepositoryInterface $sportRepository;
    private $sportRepository;

    public function __construct(SportRepositoryInterface $sportRepository) 
    {
        $this->sportRepository = $sportRepository;
    }

    public function index()
    {
        $sports =$this->sportRepository->retrieveAll();
        return view('sports',['sports'=>$sports]);
    }
}