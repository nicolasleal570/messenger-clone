@extends('layouts.app')

@section('content')
<b-container fluid style="height: calc(100vh - (1.5rem * 2) - 56px);">
    <b-row class="h-100">
        {{-- CONTACTOS --}}
        <b-col cols="4">
            {{-- CHAT STRUCTURE --}}
            <contact-list-component></contact-list-component>
        </b-col>

        {{-- MENSAJES --}}
        <b-col cols=8 class="h-100">
            <active-conversation-component></active-conversation-component>
        </b-col>
    </b-row>
</b-container>
@endsection
