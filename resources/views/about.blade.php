@extends('index')

@section('title','About')

@section('contant')

    <div class="content">
        <div class="title m-b-md">
            About {{ $data['fullname'] }}
        </div>
        <h2>Email me at {{ $data['email'] }}</h2>
    </div>

@endsection
