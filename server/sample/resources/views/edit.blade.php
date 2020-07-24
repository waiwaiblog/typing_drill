@extends('layouts.app')

@section('content')
    <edit :drill="{{ $drill }}">
        @csrf
    </edit>
@endsection
