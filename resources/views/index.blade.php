@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-4 text-center">
            <div style="margin-bottom: 270px;" class="title">
                Who's Richer?
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="celeb-container col-5 text-center hvr-bob  hvr-border-fade">
            <div class="image-container">
                <img class="rounded-circle" src="{{$celeb[$rand1]->image}}" >
            </div>
            <div class="celeb-name">
                <strong>{{$celeb[$rand1]->name}}</strong>
            </div>
            <div class="celeb-occupation">
                <h3>{{$celeb[$rand1]->category}}</h3>
            </div>
        </div>
        <div class="celeb-container col-5 text-center ml-5 hvr-bob hvr-border-fade">
            <div class="image-container">
                <img class="rounded-circle" src="{{$celeb[$rand2]->image}}">
            </div>
            <div class="celeb-name">
                <strong>{{$celeb[$rand2]->name}}</strong><br>
            </div>
                <div class="celeb-occupation">
                    <h3>{{$celeb[$rand2]->category}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
