@extends('admin.layout.master')

@section('header')
    Edit Entry Load Type
@endsection

@section('loadType')
    is-active
@endsection

@section('add_button')
        <div class="col-1 col-sm-1 col-xl-1 u-mr-auto u-mb-xsmall">
            <form action="{{ route('admin.deleteLoadType',$LoadType->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="c-btn c-btn--danger c-btn--fullwidth" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
@endsection

@section('content')
     <form action="{{ route('admin.updateLoadType',$LoadType->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="load_type">Load Type</label>
                    <input class="c-input" type="text" value="{{$LoadType->loadType}}" name="loadType" id="load_type">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection