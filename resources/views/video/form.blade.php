<div class="box box-info padding-1">
    <div class="box-body">

      <div class="row">
        <div class="col-12 col-md-12">
          <div class="form-group">
              {{ Form::label('id_categoria',__('Category')) }}
              {{ Form::select('id_categoria', $categorias, $video->id_categoria, ['class' => 'form-control select2' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => __('Select the category')]) }}
              {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $video->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-group">
            {{ Form::label('link') }}
            {{ Form::text('link', $video->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
        <div class="col-12 col-md-12">
          <div class="form-group">
            <input type="file" name="miniatura" id="miniatura" value="{{ $video->miniatura ?? 'img/default.jpg' }}">
          </div>
        </div>
        <div class="col-12 col-md-12">
          <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textArea('description', $video->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
