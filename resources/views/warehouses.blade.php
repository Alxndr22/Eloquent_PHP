@extends('index')

@section('title')
    Our Warehouses
@endsection

@section('main_content')
    @foreach($warehouses as $w)
        <div style="background-color: #f1f1f1; margin-right: 5px; padding: 5px">
            <ul>
                <li style="list-style: none">№{{ $w->number }}</li>
                <li style="list-style: none">{{ $w->location }}</a></li>

                <br>Товари на складі:
                @foreach($items as $i)
                    @foreach($i as $ii)
                        @if($ii->warehouse_id === $w->id)
                            <li style="list-style: none"> • {{ $ii->type }} {{ $ii->name }}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    @endforeach

@endsection
