<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">Nombre Empresa</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $empresa?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>')
            !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="direccion" class="form-label">{{ __('Dirección') }}</label>
                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                        value="{{ old('direccion', $empresa?->direccion) }}" id="direccion" placeholder="Direccion">
                    {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="nit" class="form-label">{{ __('NIT') }}</label>
                    <input type="text" name="nit" class="form-control @error('nit') is-invalid @enderror"
                        value="{{ old('nit', $empresa?->nit) }}" id="nit" placeholder="Nit">
                    {!! $errors->first('nit', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $empresa?->email) }}" id="email" placeholder="Email">
                    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                        value="{{ old('telefono', $empresa?->telefono) }}" id="telefono" placeholder="Telefono">
                    {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="personacontacto" class="form-label">{{ __('Persona contacto') }}</label>
                    <input type="text" name="personacontacto"
                        class="form-control @error('personacontacto') is-invalid @enderror"
                        value="{{ old('personacontacto', $empresa?->personacontacto) }}" id="personacontacto"
                        placeholder="Persona contacto">
                    {!! $errors->first('personacontacto', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="celularcontacto" class="form-label">{{ __('Celular contacto') }}</label>
                    <input type="text" name="celularcontacto"
                        class="form-control @error('celularcontacto') is-invalid @enderror"
                        value="{{ old('celularcontacto', $empresa?->celularcontacto) }}" id="celularcontacto"
                        placeholder="Celular contacto">
                    {!! $errors->first('celularcontacto', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group mb-2 mb20">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                {!! Form::label('status', 'Estado') !!}
                {!! Form::select('status',['1'=>'Activo','0'=>'Inactivo'], $empresa->status, ['id' =>
                'status', 'class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('status') }}</small>
            </div>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary col-12 col-md-4">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>