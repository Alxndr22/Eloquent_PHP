@extends('index')

@section('title')
    All items
@endsection

@section('main_content')
    @foreach($all_items as $i)
        <div style="background-color: #f1f1f1; margin-right: 5px; padding: 5px">
            <ul>
                <li style="list-style: none"><a href="/search/type={{ $i->type }}">{{ $i->type }}</a></li>
                <li style="list-style: none">{{ $i->name }}</li>
            </ul>
        </div>
    @endforeach

@endsection
