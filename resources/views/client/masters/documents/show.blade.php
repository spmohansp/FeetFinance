@extends('client.layout.master')

@section('header')
    {{ $vehicle->vehicleNumber }} Documents
@endsection

@section('vehicle')
    is-active
@endsection

@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.adddocument', $vehicle->id) }}"><img class="c-avatar__img" src="https://png.icons8.com/metro/1600/plus.png"></a>
        </div>
    </div>
@endsection

@section('content')

    @foreach($vehicle->documents as $document)
        <div class="c-pipeline__card" onclick="location.href='/client/document/{{$document->id}}/view'">
            <div class="o-media">
                <div class="o-media__body">
                    <h5 class="c-pipeline__card-title">{{$document->type}}</h5>
                    <p class="c-pipeline__card-subtitle">{{$document->duedate}}</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection