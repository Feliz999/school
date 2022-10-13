@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nuevo Periódo.</h3>
            <hr>
            <form action="{{route('period.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre Periodo</span>
                    <input type="text" name="period" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Número</span>
                    <select name="number_id" class="form-control" id="number_id">
                        <option value="" disabled selected>--Elegir un número--</option>
                        @foreach($numbers as $number)
                        <option value="{{$number->id}}">{{$number->number}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Periodos</h3>
            <hr>
            @if(isset($periods))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Nivel</th>
                            <th scope="row">Periodo</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($periods as $period)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$period->number->number}}</td>
                        <td>{{$period->period}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarPeriod-{{$period->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarPeriod-{{$period->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                        @include('period.editar')
                        @include('period.delete')
                    @endforeach
                </table>
                {{ $periods->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection