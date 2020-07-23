@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        {{--    <div class="card-body">--}}
        {{--        @if (session('status'))--}}
        {{--            <div class="alert alert-success" role="alert">--}}
        {{--                {{ session('status') }}--}}
        {{--            </div>--}}
        {{--        @endif--}}
        {{--    </div>--}}
        <div class="container">
            <h1 class="display-5 text-center">{{ __('Introduction') }}</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
@endsection
