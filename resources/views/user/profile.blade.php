@extends('layouts.app')

@section('content')

    <user-profile-component csrf-token="{{ csrf_token() }}" :user="{{ auth()->user() }}" />

@endsection
