@extends('layouts.app')

@section('content')
        <register :categories="{{ $category }}">
            @csrf
        </register>
@endsection
