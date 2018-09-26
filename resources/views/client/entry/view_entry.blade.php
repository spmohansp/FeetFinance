@extends('client.layout.master')

@section('header')
    Add Entry
@endsection

@section('viewentry')
    is-active
@endsection

@section('content')

    @foreach(Auth::user()->entries as $entry)
        <div class="c-pipeline__card" onclick="location.href='/client/entry/{{$entry->id}}/view'">
            <div class="o-media">
                <div class="o-media__img u-mr-small">
                    <div class="c-avatar c-avatar--small">
                        <img class="c-avatar__img" src="https://png.icons8.com/material/50/000000/container-truck.png" alt="Adam Sandler">
                    </div>
                </div>
                <div class="o-media__body">
                    <h5 class="c-pipeline__card-title">{{$entry->vehicles->vehicleNumber}} ( {{$entry->customers->name}} )</h5>
                    <p class="c-pipeline__card-subtitle">{{$entry->dateFrom}}  -  {{$entry->dateTo}}</p>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection