@extends('layouts.layoutMaster')

@section('template_title')
    {{ $video->name ?? "{{ __('Show') Video" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Video</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('videos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $video->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            {{ $video->link }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $video->description }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria:</strong>
                            {{ $video->id_categoria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
