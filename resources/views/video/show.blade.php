@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'playvideo')

@section('content')
<link href="../resources/assets/css/video.css" type="text/css" rel="stylesheet">

<div class="container play-container">
     <div class="row">
        <div class="play-video">
          <iframe width="400" height="300" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <h3>{{ $video->titulo }}</h3>
<hr>
<div class="publisher">
    <img src="../public/assets/img/avatars/Logo HA 98X98px.png">
    <div>
        <p>Universidad de Healthy</p>
        <span>500k Suscriptores</span>
    </div>
</div>
    <div class="vid-description">
      {{ asset('storage/' . $video->miniatura) }}
      {{ $video->description }}
    </div>
    <hr>
</div>
@endsection
