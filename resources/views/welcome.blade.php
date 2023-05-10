@extends(backpack_view('blank'))

@php
    Widget::add()
        ->type('style')
        ->content('assets/css/main.css');
@endphp

@section('content')
@endsection
