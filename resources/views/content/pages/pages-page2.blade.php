@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')

@section('content')
    <h4></h4>
    <link href="../resources/assets/css/imgrec.css" type="text/css" rel="stylesheet">
    <link href="../resources/assets/css/buscador.css" type="text/css" rel="stylesheet">

    @forelse ($categorias as $category)
        <h1><i class="fa-solid fa-heart-pulse"></i> {{ $category->name }}</h1>
        <div class="list-container">
            @forelse ($category->videos as $video)
                <div class="vid-list">
                    <a class="btn btn-sm btn-outline"href="{{ route('videos.show', $video->id) }}">
                        <img width="300" height="150"
                            src="{{ asset('storage/' . $video->miniatura) ?? 'img/default.jpg' }}" class="thumbnail"
                            alt="">
                    </a>
                    <div class="flex-div">
                        <img src="../public/assets/img/avatars/Logo HA 98X98px.png">
                        <div class="vid-info">
                            <a href="">{{ $video->titulo }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay videos disponibles.</p>
            @endforelse
        </div>
    @empty
        <p>No hay videos disponibles.</p>
    @endforelse

<hr @endsection
