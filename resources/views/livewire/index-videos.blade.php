@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
  <link href="../resources/assets/css/imgrec.css" type="text/css" rel="stylesheet">
  <link href="../resources/assets/css/buscador.css" type="text/css" rel="stylesheet">

  <div class="float-left">
    <input wire:model="search" type="search" class="form-control" placeholder="Ingrese lo que desee buscar">
    {{ $search }}
  </div>

  <br>

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
@endsection
