@extends('layouts.app')

@section('content')
<div id="app">
    <home :user-data="{{ Auth::user() }}"/>
</div>
@endsection
