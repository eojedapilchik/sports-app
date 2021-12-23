@extends('layouts.master')

@section('title','Leagues')

@section('content')
    <main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Leagues</h1>
            <p class="lead text-muted">Check all the Leagues of {{$sport}}. Click on a League to Display Teams information</p>
            <!-- <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p> -->
        </div>
        </div>
    </section>
    
     <div class="container">
        <table class="table table-striped table-responsive table-hover data-rows">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" style="width: 35%;">League Name</th>
                    <th scope="col">Sport Name</th>
                    <th scope="col">Alternate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leagues as $league)        
                    <tr onclick="window.location='{{route('index.teams',$league["idLeague"])}}';" >
                        <td>{{$league["idLeague"]}}</td>
                        <td>{{$league["strLeague"]}}</td>
                        <td>{{$league["strSport"]}}</td>
                        <td>{{$league["strLeagueAlternate"]}}</td>
                    </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>

    </main>

@endsection