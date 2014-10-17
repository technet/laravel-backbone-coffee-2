@extends('layouts.master')

@section('styles')
<!-- Any stylesheet references specific to this page goes here -->
@stop

@section('scripts')
{{ HTML::script('js/category/models.js') }}
{{ HTML::script('js/category/collections.js') }}
{{ HTML::script('js/category/views.js') }}
{{ HTML::script('js/category/category.js') }}
@stop

@section('content')
    <div class="col-md-12" id="search">
        Search Form
    </div>
    <div class="col-md-12" id="results">
        Category Table
    </div>

    @include('templates.categories-tpl') 
@stop
