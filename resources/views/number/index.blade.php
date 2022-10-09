@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nueva Número.</h3>
            <hr>
            <form action="{{route('number.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Número</span>
                    <input type="text" name="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Números</h3>
            <hr>
            @if(isset($numbers))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Número</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($numbers as $number)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$number->number}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarNumber-{{$number->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarNumber-{{$number->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                        @include('number.editar')
                        @include('number.delete')
                    @endforeach
                </table>
                {{ $numbers->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection