@extends('layouts.app')

@section('content')
    <top-page :categories="{{ $categories }}"
           :drills="{{ $drills }}"></top-page>
@endsection
