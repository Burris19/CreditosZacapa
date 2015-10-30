@extends('base_modal.modal')

@section('modal-title')
    Crear Cliente
@stop

@section('modal-id')
    "modal-create"
@stop

@section('modal-body')
    <div id="respuesta" class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong></strong>
    </div>
    {!! Form::open(['url' => 'clientes','id'=>'form-create','method' => 'POST','class'=>'form-horizontal', 'data-url' => 'clientes' ]) !!}
        <div class="box-body">
            <div class="form-group">
                <label for="nombre" class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-10">
                    {!! Form::text('codigo',null,['class' => 'form-control', 'placeholder' => 'Codigo del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="area" class="col-sm-2 control-label">DPI</label>
                <div class="col-sm-10">
                    {!! Form::number('dpi',null,['class' => 'form-control', 'placeholder' => 'DPI del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">NIT</label>
                <div class="col-sm-10">
                    {!! Form::number('nit',null,['class' => 'form-control', 'placeholder' => 'NIT del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Nombre del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-10">
                    {!! Form::text('apellido',null,['class' => 'form-control', 'placeholder' => 'Apellido del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-10">
                    {!! Form::text('direccion',null,['class' => 'form-control', 'placeholder' => 'Direccion del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-10">
                    {!! Form::number('telefono',null,['class' => 'form-control', 'placeholder' => 'Telefono Del Cliente', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">Edad</label>
                <div class="col-sm-10">
                    {!! Form::number('edad',null,['class' => 'form-control', 'placeholder' => 'Edad del Cliente', 'required']) !!}
                </div>
            </div>
            <button type="submit" class="hide"></button>
        </div>
    {!! Form::close() !!}

@stop

@section('modal-footer')
    <button id="btn-save" type="button" class="btn btn-effect-ripple btn-primary">Guardar</button>
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop
