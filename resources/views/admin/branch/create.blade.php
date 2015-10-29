@extends('base_modal.modal')

@section('modal-title')
    Crear Usuario
@stop

@section('modal-id')
    "modal-create"
@stop

@section('modal-body')
    {!! Form::open(['url' => 'users','id'=>'form-create','method' => 'POST','class'=>'form-horizontal']) !!}

        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Nombre del branch']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Area</label>
                <div class="col-sm-10">
                    {!! Form::text('area',null,['class' => 'form-control', 'placeholder' => 'Area o region a la que pertenece']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-10">
                    {!! Form::date('fecha', \Carbon\Carbon::now() ,['class' => 'form-control', 'placeholder' => 'Con esta fecha iniciara el brach']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('modal-footer')
    <button id="btn-save" type="button" class="btn btn-effect-ripple btn-primary">Guardar</button>
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop