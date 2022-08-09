<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del tag']) !!}

    @error('name')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del tag', 'readonly']) !!}

    @error('slug')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    
@enderror
</div>

<div class="form-group">
    {{-- <label for="">Color</label>
    <select name="color" id="" class="form-control">
        <option value="">Seleccione un color</option>
        <option value="red">Rojo</option>
        <option value="yellow">Amarillo</option>
        <option value="green">Verde</option>
    </select> --}}
    {!! Form::label('color', 'Color:') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

    @error('color')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    
@enderror
</div>