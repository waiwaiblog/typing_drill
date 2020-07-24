@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-5 text-center">{{ Auth::user()->name . __("'s Mypage!") }}</h1>
            <section class="tab">
                <ul class="tab__label">
                    <li><a href="#" class="active" data-id="tab__info">WorkBookList</a></li>
                    <li><a href="#" data-id="tab__product">ScoreList</a></li>
                </ul>
                <section class="tab__content active" id="tab__info">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Difficulty</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_drills as $my_drill)
                            <tr>
                                <td scope="row">{{ $my_drill->title }}</td>
                                <td>{{ $my_drill->category->category_name }}</td>
                                <td>{{ $my_drill->difficulty }}</td>
                                <td><a href="{{ route('edit', ['id' => $my_drill->id]) }}">Edit</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="tab__content" id="tab__product">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Score</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_scores as $my_score)
                            <tr>
                                <td scope="row">{{ $my_score->drill->title }}</td>
                                <td>{{ $my_score->score }}</td>
                                <td>{{ $my_score->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </section>
        </div>
    </div>

@endsection
