@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    @livewire('index-videos', ['key' => 'index-videos-component'])
    @livewireScripts
@endsection
