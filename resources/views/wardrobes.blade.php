@extends('index')

@section('title')
    Wardrobes
@endsection

@section('main_content')
    @foreach($wardrobes as $w)
        <div style="background-color: #f1f1f1; margin-right: 5px; padding: 5px">
            <ul>
                <li style="list-style: none">{{ $w->type }}</li>
                <li style="list-style: none"><a href="/search/name={{ $w->name }}" style="text-decoration: none">{{ $w->name }}</a></li>
                Матеріал:
                @foreach($materials as $m)
                    <ul style="padding-left: 10px">
                        @if($m->ids === $w->id)
                            <li style="list-style: none"><a href="/search/material={{ $m->material }}" style="text-decoration: none">{{ $m->material }}</a></li>
                        @endif
                    </ul>
                @endforeach
                <li style="list-style: none"><a href="/search/color={{ $w->color }}" style="text-decoration: none">{{ $w->color }}</a></li>
                <li style="list-style: none"><a href="/search/price={{ $w->price }}" style="text-decoration: none">{{ $w->price }}</a><br></li>
                <li style="list-style: none"><a href="/search/quantity={{ $w->quantity }}" style="text-decoration: none">{{ $w->quantity }}</a></li>
                Власник:
                @foreach($ow as $o)
                    @foreach($o as $oo)
                        @if($oo->pivot->item_id === $w->id)
                            <li style="list-style: none">►{{ $oo->name }} {{ $oo->surname }}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    @endforeach

@endsection
