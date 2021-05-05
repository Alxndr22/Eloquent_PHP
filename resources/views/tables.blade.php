@extends('index')

@section('title')
    Tables
@endsection

@section('main_content')
    @foreach($tables as $t)
        <div style="background-color: #f1f1f1; margin-right: 5px; padding: 5px">
            <ul>
                <li style="list-style: none">{{ $t->type }}</li>
                <li style="list-style: none"><a href="/search/name={{ $t->name }}" style="text-decoration: none">{{ $t->name }}</a></li>
                Матеріал:
                @foreach($materials as $m)
                    <ul style="padding-left: 10px">
                        @if($m->ids === $t->id)
                            <li style="list-style: none"><a href="/search/material={{ $m->material }}" style="text-decoration: none">{{ $m->material }}</a></li>
                        @endif
                    </ul>
                @endforeach
                <li style="list-style: none"><a href="/search/color={{ $t->color }}" style="text-decoration: none">{{ $t->color }}</a></li>
                <li style="list-style: none"><a href="/search/price={{ $t->price }}" style="text-decoration: none">{{ $t->price }}</a><br></li>
                <li style="list-style: none"><a href="/search/quantity={{ $t->quantity }}" style="text-decoration: none">{{ $t->quantity }}</a></li>
                Власник:
                @foreach($ow as $o)
                    @foreach($o as $oo)
                        @if($oo->pivot->item_id === $t->id)
                            <li style="list-style: none">►{{ $oo->name }} {{ $oo->surname }}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    @endforeach

@endsection
