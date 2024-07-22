<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="text" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $deuda?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numdoc" class="form-label">{{ __('Numdoc') }}</label>
            <input type="text" name="numdoc" class="form-control @error('numdoc') is-invalid @enderror" value="{{ old('numdoc', $deuda?->numdoc) }}" id="numdoc" placeholder="Numdoc">
            {!! $errors->first('numdoc', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="importe" class="form-label">{{ __('Importe') }}</label>
            <input type="text" name="importe" class="form-control @error('importe') is-invalid @enderror" value="{{ old('importe', $deuda?->importe) }}" id="importe" placeholder="Importe">
            {!! $errors->first('importe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saldo" class="form-label">{{ __('Saldo') }}</label>
            <input type="text" name="saldo" class="form-control @error('saldo') is-invalid @enderror" value="{{ old('saldo', $deuda?->saldo) }}" id="saldo" placeholder="Saldo">
            {!! $errors->first('saldo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="vence" class="form-label">{{ __('Vence') }}</label>
            <input type="text" name="vence" class="form-control @error('vence') is-invalid @enderror" value="{{ old('vence', $deuda?->vence) }}" id="vence" placeholder="Vence">
            {!! $errors->first('vence', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="antiguedad" class="form-label">{{ __('Antiguedad') }}</label>
            <input type="text" name="antiguedad" class="form-control @error('antiguedad') is-invalid @enderror" value="{{ old('antiguedad', $deuda?->antiguedad) }}" id="antiguedad" placeholder="Antiguedad">
            {!! $errors->first('antiguedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="anticuacion" class="form-label">{{ __('Anticuacion') }}</label>
            <input type="text" name="anticuacion" class="form-control @error('anticuacion') is-invalid @enderror" value="{{ old('anticuacion', $deuda?->anticuacion) }}" id="anticuacion" placeholder="Anticuacion">
            {!! $errors->first('anticuacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rango" class="form-label">{{ __('Rango') }}</label>
            <input type="text" name="rango" class="form-control @error('rango') is-invalid @enderror" value="{{ old('rango', $deuda?->rango) }}" id="rango" placeholder="Rango">
            {!! $errors->first('rango', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente" class="form-label">{{ __('Cliente') }}</label>
            <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror" value="{{ old('cliente', $deuda?->cliente) }}" id="cliente" placeholder="Cliente">
            {!! $errors->first('cliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="clilugar" class="form-label">{{ __('Clilugar') }}</label>
            <input type="text" name="clilugar" class="form-control @error('clilugar') is-invalid @enderror" value="{{ old('clilugar', $deuda?->clilugar) }}" id="clilugar" placeholder="Clilugar">
            {!! $errors->first('clilugar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="entnombrejefevendedor" class="form-label">{{ __('Entnombrejefevendedor') }}</label>
            <input type="text" name="entnombrejefevendedor" class="form-control @error('entnombrejefevendedor') is-invalid @enderror" value="{{ old('entnombrejefevendedor', $deuda?->entnombrejefevendedor) }}" id="entnombrejefevendedor" placeholder="Entnombrejefevendedor">
            {!! $errors->first('entnombrejefevendedor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="entnombresupervisor" class="form-label">{{ __('Entnombresupervisor') }}</label>
            <input type="text" name="entnombresupervisor" class="form-control @error('entnombresupervisor') is-invalid @enderror" value="{{ old('entnombresupervisor', $deuda?->entnombresupervisor) }}" id="entnombresupervisor" placeholder="Entnombresupervisor">
            {!! $errors->first('entnombresupervisor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="entnombrevendedor" class="form-label">{{ __('Entnombrevendedor') }}</label>
            <input type="text" name="entnombrevendedor" class="form-control @error('entnombrevendedor') is-invalid @enderror" value="{{ old('entnombrevendedor', $deuda?->entnombrevendedor) }}" id="entnombrevendedor" placeholder="Entnombrevendedor">
            {!! $errors->first('entnombrevendedor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="plazo" class="form-label">{{ __('Plazo') }}</label>
            <input type="text" name="plazo" class="form-control @error('plazo') is-invalid @enderror" value="{{ old('plazo', $deuda?->plazo) }}" id="plazo" placeholder="Plazo">
            {!! $errors->first('plazo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechaultimopago" class="form-label">{{ __('Fechaultimopago') }}</label>
            <input type="text" name="fechaultimopago" class="form-control @error('fechaultimopago') is-invalid @enderror" value="{{ old('fechaultimopago', $deuda?->fechaultimopago) }}" id="fechaultimopago" placeholder="Fechaultimopago">
            {!! $errors->first('fechaultimopago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ciunombre" class="form-label">{{ __('Ciunombre') }}</label>
            <input type="text" name="ciunombre" class="form-control @error('ciunombre') is-invalid @enderror" value="{{ old('ciunombre', $deuda?->ciunombre) }}" id="ciunombre" placeholder="Ciunombre">
            {!! $errors->first('ciunombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="deudore_id" class="form-label">{{ __('Deudore Id') }}</label>
            <input type="text" name="deudore_id" class="form-control @error('deudore_id') is-invalid @enderror" value="{{ old('deudore_id', $deuda?->deudore_id) }}" id="deudore_id" placeholder="Deudore Id">
            {!! $errors->first('deudore_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="limitecredito" class="form-label">{{ __('Limitecredito') }}</label>
            <input type="text" name="limitecredito" class="form-control @error('limitecredito') is-invalid @enderror" value="{{ old('limitecredito', $deuda?->limitecredito) }}" id="limitecredito" placeholder="Limitecredito">
            {!! $errors->first('limitecredito', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rutid" class="form-label">{{ __('Rutid') }}</label>
            <input type="text" name="rutid" class="form-control @error('rutid') is-invalid @enderror" value="{{ old('rutid', $deuda?->rutid) }}" id="rutid" placeholder="Rutid">
            {!! $errors->first('rutid', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="coordenadax" class="form-label">{{ __('Coordenadax') }}</label>
            <input type="text" name="coordenadax" class="form-control @error('coordenadax') is-invalid @enderror" value="{{ old('coordenadax', $deuda?->coordenadax) }}" id="coordenadax" placeholder="Coordenadax">
            {!! $errors->first('coordenadax', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="coordenaday" class="form-label">{{ __('Coordenaday') }}</label>
            <input type="text" name="coordenaday" class="form-control @error('coordenaday') is-invalid @enderror" value="{{ old('coordenaday', $deuda?->coordenaday) }}" id="coordenaday" placeholder="Coordenaday">
            {!! $errors->first('coordenaday', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $deuda?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $deuda?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $deuda?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ctrlupdate" class="form-label">{{ __('Ctrlupdate') }}</label>
            <input type="text" name="ctrlupdate" class="form-control @error('ctrlupdate') is-invalid @enderror" value="{{ old('ctrlupdate', $deuda?->ctrlupdate) }}" id="ctrlupdate" placeholder="Ctrlupdate">
            {!! $errors->first('ctrlupdate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>