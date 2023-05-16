@extends('layouts.app')

@section('template_title')
    {{ $reserva->name ?? "{{ __('Show') Reserva" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Datos de') }} Reserva</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservas.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $reserva->cliente->nombre." ".$reserva->cliente->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Libro:</strong>
                            {{ $reserva->book->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Vencimiento:</strong>
                            {{ $reserva->fecha_vencimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Devuelto?:</strong>
                            {{ $reserva->cerrada==1  ? 'Si' : 'No'; }}
                        </div>
                        <div class="form-group">
                            <strong>Pasado de tiempo?:</strong>
                            {{ $reserva->cerrada==0 && strtotime($reserva->fecha_vencimiento)<strtotime(now())  ? 'Si' : 'No' ; }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
