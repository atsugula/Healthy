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
            <video controls autoplay>
                <source src="../public/assets/img/avatars/BARBARUS.mp4" type="video/mp4">
            </video>   
        </div>   
    </div>     
     <h3>POSTRE CON PROTEINA BARBARUS HEALTHY SPORTS</h3>
<hr>
<div class="publisher">
    <img src="../public/assets/img/avatars/Logo HA 98X98px.png">
    <div>
        <p>Universidad de Healthy</p>
        <span>500k Suscriptores</span>
    </div>
</div>    
     <div class="vid-description">
            <p>• Este productos es un suplemento dietario. no es un medicamento y no suple una alimentacion equilibrada.</p>
            <p>• No consumir en estado de embarazo y lactancia.</p>
            <p>• Puede causar hipersensibilidad.</p>
            <p>• Mantengase fuera del alcance de los niños.</p>
            <p>• Mantengase en su envase original protegido de la luz y el calor, a una temperatura inferior a 30°c y 65% h.r </p>
            <p>• Advertencias: Pacientes en tratamiento contra alteraciones sanguíneas y plaquetarias abstenerse de consumir este producto.</p>
    </div>
    <hr>
</div>
@endsection
