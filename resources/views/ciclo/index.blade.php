@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nuevo Ciclo.</h3>
            <hr>
            <form action="{{route('ciclo.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre</span>
                    <input type="text" name="cicle" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Descripción</span>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"></textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Ciclos</h3>
            <hr>
            @if(isset($ciclos))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Nombre</th>
                            <th scope="row">Descripción</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($ciclos as $ciclo)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ciclo->cicle}}</td>
                        <td>{{$ciclo->description}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarCiclo-{{$ciclo->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarCiclo-{{$ciclo->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                        @include('ciclo.editar')
                        @include('ciclo.delete')
                    @endforeach
                </table>
                {{ $ciclos->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection