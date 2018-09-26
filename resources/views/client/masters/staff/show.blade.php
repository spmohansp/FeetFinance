@extends('client.layout.master')

@section('header')
    Fleet Finance Manager
@endsection

@section('staff')
    is-active
@endsection

@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="/client/staff/add"><img class="c-avatar__img" src="https://png.icons8.com/metro/1600/plus.png"></a>
        </div>
    </div>
@endsection

@section('content')


    @foreach(Auth::user()->staffs as $staff)
        <div class="c-pipeline__card" onclick="location.href='/client/staff/{{$staff->id}}/view'">
            <div class="o-media">
                <div class="o-media__img u-mr-small">
                    <div class="c-avatar c-avatar--small">
                        <img class="c-avatar__img" src="https://cdn1.vectorstock.com/i/1000x1000/28/05/customer-flat-icon-vector-15222805.jpg" alt="Adam Sandler">
                    </div>
                </div>
                <div class="o-media__body">
                    <h5 class="c-pipeline__card-title">{{$staff->name}}</h5>
                    <p class="c-pipeline__card-subtitle">{{$staff->address}}</p>
                </div>
            </div>
        </div>
    @endforeach




@endsection