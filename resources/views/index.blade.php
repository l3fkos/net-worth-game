@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-2 text-center">
            <div style="margin-bottom: 60px;" class="title">
                Who's Richer?<br>
                <span style="font-size: 18pt;">Get 7 out of 10 right to win.</span>
            </div>
        </div>
    </div>

    <compare-button  celeb_1_image="{{$celeb1->image}}"
                     celeb_1_net_worth="{{$celeb1->net_worth}}"
                     celeb_1_name="{{$celeb1->name}}"
                     celeb_1_category="{{$celeb1->category}}"
                     celeb_2_image="{{$celeb2->image}}"
                     celeb_2_net_worth="{{$celeb2->net_worth}}"
                     celeb_2_name="{{$celeb2->name}}"
                     celeb_2_category="{{$celeb2->category}}">
    </compare-button>

    <br><br><br><br><br><br><br>



{{--    <div class="row justify-content-center d-inline">--}}
{{--        <div class="celeb-container col-5 text-center hvr-bob  hvr-border-fade">--}}
{{--            <div class="image-container">--}}
{{--                <compare-button  celeb_1_image="{{$celeb1->image}}"--}}
{{--                                 celeb_2_net_worth="{{$celeb2->net_worth}}"--}}
{{--                                 celeb_1_net_worth="{{$celeb1->net_worth}}"--}}
{{--                                 celeb_1_name="{{$celeb1->name}}"--}}
{{--                                 celeb_1_category="{{$celeb1->category}}">--}}
{{--                </compare-button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="celeb-container col-5 text-center hvr-bob  hvr-border-fade ml-5">--}}
{{--            <div class="image-container">--}}
{{--                <compare-button2 celeb_2_image="{{$celeb2->image}}"--}}
{{--                                 celeb_2_net_worth="{{$celeb2->net_worth}}"--}}
{{--                                 celeb_1_net_worth="{{$celeb1->net_worth}}"--}}
{{--                                 celeb_2_name="{{$celeb2->name}}"--}}
{{--                                 celeb_2_category="{{$celeb2->category}}">--}}
{{--                </compare-button2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <a href="/index">--}}
{{--            <button class="btn btn-dark h-50px ml-5 pl-4 pr-4">--}}
{{--                Next--}}
{{--            </button>--}}
{{--        </a>--}}
{{--    </div>--}}


@endsection
