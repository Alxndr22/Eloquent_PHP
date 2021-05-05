@extends('index')

@section('title')
    Search
@endsection

@section('main_content')
    @foreach($obj as $o)
        <div style="background-color: #f1f1f1; margin-right: 5px; padding: 5px">
            <ul>
                <li style="list-style: none">{{ $o->type }}</li>
                <li style="list-style: none"><a href="/search/name={{ $o->name }}" style="text-decoration: none">{{ $o->name }}</a></li>
                Матеріал:

                @foreach($materials as $m)
                    <ul style="padding-left: 10px">
                        @if($m->ids === $o->id)
                            <li style="list-style: none"><a href="/search/material={{ $m->material }}" style="text-decoration: none">{{ $m->material }}</a></li>
                        @endif
                    </ul>
                @endforeach
                <li style="list-style: none"><a href="/search/color={{ $o->color }}" style="text-decoration: none">{{ $o->color }}</a></li>
                <li style="list-style: none"><a href="/search/price={{ $o->price }}" style="text-decoration: none">{{ $o->price }}</a><br></li>
                <li style="list-style: none"><a href="/search/quantity={{ $o->quantity }}" style="text-decoration: none">{{ $o->quantity }}</a></li>
            </ul>
        </div>
    @endforeach

@endsection
