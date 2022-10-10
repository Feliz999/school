@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nuevo Trabajo</h3>
            <hr>
            <form action="{{route('homework.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-briefcase"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Nombre de Trabajo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-check"></i></span>
                    <input type="text" name="points" class="form-control" placeholder="20" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-calendar-days"></i></span>
                    <input type="date" name="date_expiration" class="form-control" placeholder="Fecha de Cumpleaños" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-brands fa-creative-commons-nd"></i></span>
                    <select name="type_homework_id" id="" class="form-control">
                        <option value="" disabled selected>--Elegir un tipo de trabajo--</option>
                        @foreach($typeHomeworks as $th)
                        <option value="{{$th->id}}">{{$th->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-brands fa-creative-commons-nd"></i></span>
                    <select name="matter_id" id="" class="form-control">
                        <option value="" disabled selected>--Elegir una materia--</option>
                        @foreach($matters as $matter)
                        <option value="{{$matter->id}}">{{$matter->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-comment"></i></span>
                    <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-image"></i></span>
                    <input type="file" class="form-control">
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Trabajos</h3>
            <hr>
            @if(isset($homeworks))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Nombre</th>
                            <th scope="row">Puntos</th>
                            <th scope="row">Fecha de Expiración</th>
                            <th scope="row">Descripción</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($homeworks as $hm)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$hm->name}}</td>
                        <td>{{$hm->points}}</td>
                        <td>{{$hm->date_expiration}}</td>
                        <td>{{$hm->description}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarHomework-{{$hm->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarHomework-{{$hm->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                        @include('homework.editar')
                        @include('homework.delete')
                    @endforeach
                </table>
                {{ $homeworks->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection