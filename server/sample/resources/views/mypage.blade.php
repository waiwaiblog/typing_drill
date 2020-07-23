@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-5 text-center">{{ Auth::user()->name . __("'s Mypage!") }}</h1>
            <section class="tab">
                <ul class="tab__label">
                    <li><a href="#" class="active" data-id="tab__info">登録情報一覧</a></li>
                    <li><a href="#" data-id="tab__product">スコア一覧</a></li>
                </ul>
                <section class="tab__content active" id="tab__info">
                    サイトの情報。
                </section>
                <section class="tab__content" id="tab__product">
                    サイトの情報。aaa
                </section>
            </section>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
@endsection
