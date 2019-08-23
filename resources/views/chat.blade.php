@extends('layouts.app')

@section('content')
<!-- <messenger-component :user="{{ auth()->user() }}"/> -->
<router-view :user="{{ auth()->user() }}" />
@endsection
