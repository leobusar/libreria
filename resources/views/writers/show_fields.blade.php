<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $writer->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $writer->nombre !!}</p>
</div>

<!-- Genero Field -->
<div class="form-group">
    {!! Form::label('genero', 'Genero:') !!}
    <p>{!! $writer->genero !!}</p>
</div>

<!-- Edad Field -->
<div class="form-group">
    {!! Form::label('edad', 'Edad:') !!}
    <p>{!! $writer->edad !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $writer->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $writer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $writer->updated_at !!}</p>
</div>

