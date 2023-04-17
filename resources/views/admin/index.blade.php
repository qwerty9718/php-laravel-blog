@extends('admin.include.main')
@section('content')

    index

    <h2>{{auth()->user()->name}} : Id {{auth()->user()->id}}</h2>
    <h2>Role :  {{auth()->user()->getRole->title}}</h2>

@endsection
