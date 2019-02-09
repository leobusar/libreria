<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Field -->
<div class="form-group col-sm-12">
    {!! Form::label('genero', 'Genero:') !!}
    <label class="radio-inline">
        {!! Form::radio('genero', "F", null) !!} femenino
    </label>

    <label class="radio-inline">
        {!! Form::radio('genero', "M", null) !!} masculino
    </label>

</div>

<!-- Edad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad', 'Edad:') !!}
    {!! Form::number('edad', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('writers.index') !!}" class="btn btn-default">Cancel</a>
</div>
