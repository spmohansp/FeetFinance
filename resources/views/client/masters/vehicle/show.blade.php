@extends('client.layout.master')

@section('header')
    Fleet Finance Manager
@endsection

@section('vehicle')
    is-active
@endsection

@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="/client/vehicle/add"><img class="c-avatar__img" src="https://png.icons8.com/metro/1600/plus.png"></a>
        </div>
    </div>
@endsection

@section('content')

    @foreach(Auth::user()->vehicles as $vehicle)
        <div class="c-pipeline__card" onclick="location.href='/client/vehicle/{{$vehicle->id}}/view'">
            <div class="o-media">
                <div class="o-media__img u-mr-small">
                    <div class="c-avatar c-avatar--small">
                        <img class="c-avatar__img" src="https://png.icons8.com/material/50/000000/container-truck.png" alt="Adam Sandler">
                    </div>
                </div>
                <div class="o-media__body">
                    <h5 class="c-pipeline__card-title">{{$vehicle->vehicleName}}</h5>
                    <p class="c-pipeline__card-subtitle">{{$vehicle->vehicleNumber}}</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection