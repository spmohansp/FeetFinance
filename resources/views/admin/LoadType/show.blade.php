@extends('admin.layout.master')

@section('header')
    Entry Load Type
@endsection

@section('loadType')
    is-active
@endsection

@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="/admin/loadType/add"><img class="c-avatar__img" src="https://png.icons8.com/metro/1600/plus.png"></a>
        </div>
    </div>
@endsection

@section('content')
	 @foreach($loadTypes as $loadType)
        <div class="c-pipeline__card" onclick="location.href='/admin/loadType/{{$loadType->id}}/edit'">
            <div class="o-media">
                <div class="o-media__img u-mr-small">
                    <div class="c-avatar c-avatar--small">
                        <img class="c-avatar__img" src="https://png.icons8.com/material/50/000000/container-truck.png" alt="Adam Sandler">
                    </div>
                </div>
                <div class="o-media__body">
                    <h5 class="c-pipeline__card-title">{{$loadType->loadType}}</h5>
                    <!-- <p class="c-pipeline__card-subtitle">hk</p> -->
                </div>
            </div>
        </div>
        @endforeach

@endsection