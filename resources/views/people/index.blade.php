@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nuevo Padre de Familia</h3>
            <hr>
            <form action="{{route('people.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="fullname" class="form-control" placeholder="Nombre Completo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-address-card"></i></span>
                    <input type="text" name="cui" class="form-control" placeholder="C.U.I." aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-cake-candles"></i></span>
                    <input type="date" name="birthday" class="form-control" placeholder="Fecha de Cumpleaños" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-phone"></i></span>
                    <input type="phone" name="phone" class="form-control" placeholder="Teléfono" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-location-dot"></i></span>
                    <input type="text" name="address" class="form-control" placeholder="Dirección de Vivienda" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Correo Eléctrónico" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-regular fa-comment"></i></span>
                    <select name="type_people_id" id="type_people_id">
                        <option value="" disabled> --Elegir tipo de Padre de Familia--</option>
                        @foreach($typePeoples as $tp)
                            <option value="{{$tp->id}}">{{$tp->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-image"></i></span>
                    <img src="" alt="foto">
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Padres de Familia</h3>
            <hr>
            @if(isset($peoples))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Nombre</th>
                            <th scope="row">Teléfono</th>
                            <th scope="row">C.U.I.</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($peoples as $people)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$people->fullname}}</td>
                        <td>{{$people->phone}}</td>
                        <td>{{$people->cui}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarPeople-{{$people->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarPeople-{{$people->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                        @include('people.editar')
                        @include('people.delete')
                    @endforeach
                </table>
                {{ $peoples->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection