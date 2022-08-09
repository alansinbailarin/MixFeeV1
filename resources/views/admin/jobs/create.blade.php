@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>Publica un trabajo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.jobs.store', 'autocomplete' => 'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Titulo:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo del trabajo']) !!}

                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'readonly']) !!}
                    
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="">Tags</p>
                    @foreach ($tags as $tag)
                            <label class="mr-2">
                                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                                {{ $tag->name }}
                            </label>
                    @endforeach
                            
                    @error('tags')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('company', 'Nombre de la compañia:') !!}
                    {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la compañia']) !!}

                    @error('company')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripcion del puesto:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripcion del puesto']) !!}
                    
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'Sobre nuestra empresa:') !!}
                    {!! Form::textarea('about', null, ['class' => 'form-control', 'placeholder' => 'Sobre la empresa']) !!}

                    @error('about')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('benefices', 'Beneficios del trabajo:') !!}
                    {!! Form::textarea('benefices', null, ['class' => 'form-control', 'placeholder' => 'Beneficios del trabajador']) !!}

                    @error('benefices')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('requisites', 'Requisitos para aplicar:') !!}
                    {!! Form::textarea('requisites', null, ['class' => 'form-control', 'placeholder' => 'Requisitos para el trabajador']) !!}

                    @error('requisites')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('responsabilities', 'Responsabilidades del trabajador:') !!}
                    {!! Form::textarea('responsabilities', null, ['class' => 'form-control', 'placeholder' => 'Responsabilidades del trabajador']) !!}

                    @error('responsabilities')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('requirements', 'Requerimientos para aplicar:') !!}
                    {!! Form::textarea('requirements', null, ['class' => 'form-control', 'placeholder' => 'Requerimientos para aplicar']) !!}

                    @error('requirements')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('company_url', 'Pagina web:') !!}
                    {!! Form::text('company_url', null, ['class' => 'form-control', 'placeholder' => 'Introduzca la url de la pagina web']) !!}

                    @error('company_url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('company_email', 'Correo electrónico:') !!}
                    {!! Form::text('company_email', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo electrónico']) !!}

                    @error('company_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('company_phone', 'Numero de telefono:') !!}
                    {!! Form::text('company_phone', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el numero de telefono']) !!}

                    @error('company_phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('location', 'Ubicacion:') !!}
                    {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Introduzca la ubicacion']) !!}

                    @error('location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'Tipo de trabajo:') !!}
                    {!! Form::select('type', ['Tiempo completo' => 'Tiempo completo', 'Medio tiempo' => 'Medio tiempo', 'Freelance' => 'Freelance', 'Contrato de practicas' => 'Practicas'], null, ['class' => 'form-control']) !!}

                    @error('type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('salary', 'Salario:') !!}
                    {!! Form::select('salary', ['1,000 > 5,000' => 'De 1,000 a 5,000', '5,000 > 8,000' => 'De 5,000 a 8,000', '8,000 > 15,000' => 'De 8,000 a 15,000', '15,000 > 20,000' => 'De 15,000 a 20,000', '20,000 > 25,000' => 'De 20,000 a 25,000', '25,000 > 30,000' => 'De 25,000 a 30,000', '> 30,000' => 'Mas de 30,000'], null, ['class' => 'form-control']) !!}

                    @error('salary')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>
                    <label>
                        {!! Form::radio('status', 2) !!}
                        Publicado
                    </label>

                    @error('status')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {!! Form::submit('Publicar trabajo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
        $("#title").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });

        // ClassicEditor
        // .create( document.querySelector( '#description' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
        // ClassicEditor
        // .create( document.querySelector( '#benefices' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
        // ClassicEditor
        // .create( document.querySelector( '#requisites' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
        // ClassicEditor
        // .create( document.querySelector( '#responsabilities' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
        // ClassicEditor
        // .create( document.querySelector( '#requirements' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
        // ClassicEditor
        // .create( document.querySelector( '#about' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
    </script>
@endsection
