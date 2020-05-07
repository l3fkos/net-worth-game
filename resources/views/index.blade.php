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
                        <compare-button celeb_1_image="{{$celeb1->image}}" celeb_1_net_worth="{{$celeb1->net_worth}}" celeb_2_net_worth="{{$celeb2->net_worth}}"></compare-button>
                    </div>

                <div class="celeb-name">
                    <strong>{{$celeb1->name}}</strong><br>
                    {{$celeb1->net_worth}}
                </div>
                <div class="celeb-occupation">
                    <h3>{{$celeb1->category}}</h3>
                </div>
            </div>

        <div class="celeb-container col-5 text-center ml-5 hvr-bob hvr-border-fade">

                    <div class="image-container">
                        <compare-button2 celeb_2_image="{{$celeb2->image}}" celeb_2_net_worth="{{$celeb2->net_worth}}" celeb_1_net_worth="{{$celeb1->net_worth}}"></compare-button2>
                    </div>


            <div class="celeb-name">
                <strong>{{$celeb2->name}}</strong><br>
                {{$celeb2->net_worth}}
            </div>
                <div class="celeb-occupation">
                    <h3>{{$celeb2->category}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
