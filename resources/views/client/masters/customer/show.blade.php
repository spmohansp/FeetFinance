@extends('client.layout.master')

@section('header')
    Fleet Finance Manager
@endsection

@section('customer')
    is-active
@endsection

@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="/client/customer/add"><img class="c-avatar__img" src="https://png.icons8.com/metro/1600/plus.png"></a>
        </div>
    </div>
@endsection

@section('content')

    @foreach(Auth::user()->customers as $customer)
        <div class="c-pipeline__card" onclick="location.href='/client/customer/{{$customer->id}}/view'">
            <div class="o-media">
                <div class="o-media__img u-mr-small">
                    <div class="c-avatar c-avatar--small">
                        <img class="c-avatar__img" src="https://cdn1.vectorstock.com/i/1000x1000/28/05/customer-flat-icon-vector-15222805.jpg" alt="Adam Sandler">
                    </div>
                </div>
                <div class="o-media__body">
                    <h5 class="c-pipeline__card-title">{{$customer->name}}</h5>
                    <p class="c-pipeline__card-subtitle">{{$customer->address}}</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection