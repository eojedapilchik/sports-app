@extends('layouts.master')
<style>
    img {
    border: 1px solid #ddd; /* Gray border */
    border-radius: 4px; /* Rounded border */
    padding: 5px; /* Some padding */
    width: 150px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>
@section('title','Teams')

@section('content')
    <main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Teams</h1>
            <p class="lead text-muted">Click on a Team to display Team Details</p>
            <!-- <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p> -->
        </div>
        </div>
    </section>
    
     <div class="container">
   
        @if (!is_null($teams))
            <div class="accordion" id="accordionTeams">
            @foreach ($teams as $team) 
            
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$team['idTeam']}}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$team['idTeam']}}" aria-expanded="true" aria-controls="collapse{{$team['idTeam']}}">
                            {{$team["strTeam"]}}  ID:{{$team["idTeam"]}}
                        </button>
                        </h2>
                        <div id="collapse{{$team['idTeam']}}" class="accordion-collapse collapse" aria-labelledby="heading{{$team['idTeam']}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <img src={{$team["strTeamBadge"]}} alt={{$team["strTeam"]}} class="thumbnail" >
                            <p><strong>Website: </strong> {{$team["strWebsite"]}}</p>
                            <p><strong>Stadium: </strong> {{$team["strStadium"]}}</p>
                            <p><strong>Description: </strong>
                            {{$team["strDescriptionEN"]}}</p>
                        </div>
                        </div>
                    </div>
                <br>
            @endforeach
            </div>
        @else
            <h3>No team was found, Sorry!</h3>
        @endif
    </main>

@endsection