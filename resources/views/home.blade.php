@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('mensaje'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    {{ __('Bienvenido ').Auth::user()->name}}<br>
                    Listado de Prestamos
                    <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Libro</th>
										<th>Fecha Vencimiento</th>
										<th>Devuelto</th>
                                        <th>Pasado de Fecha?</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $reserva->book->titulo }}</td>
											<td>{{ $reserva->fecha_vencimiento }}</td>
											<td>{{ $reserva->cerrada==1  ? 'Si' : 'No'; }}</td>
                                            <td>{{ strtotime($reserva->fecha_vencimiento)<strtotime(now())  ? 'Si' : 'No' }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
