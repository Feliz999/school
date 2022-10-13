@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Asignación de Materias.</h3>
            <hr>
            <form action="{{route('level_section.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Grado</span>
                    <select name="level_id" id="level_id" class="form-control">
                        <option value="" disabled selected>--Elegir un grado--</option>
                        @foreach($levels as $level)
                            <option value="{{$level->id}}"> {{$level->number->number}} - {{$level->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Sección</span>
                    <select name="section_id" id="section_id" class="form-control">
                        <option value="" disabled selected>--Elegir una sección--</option>
                        @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Materias</span>
                    <select name="matter_id" id="matter_id" class="form-control">
                        <option value="" disabled selected>--Elegir una materia--</option>
                        @foreach($matters as $matter)
                            <option value="{{$matter->id}}">{{$matter->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Ciclo</span>
                    <select name="cicle_id" id="cicle_id" class="form-control">
                        <option value="" disabled selected>--Elegir un ciclo--</option>
                        @foreach($cicles as $cicle)
                            <option value="{{$cicle->id}}">{{$cicle->cicle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Maestro</span>
                    <select name="teacher_id" id="teacher_id" class="form-control">
                        <option value="" disabled selected>--Elegir un maestro--</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->fullname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Periodo</span>
                    <select name="period_id" id="period_id" class="form-control">
                        <option value="" disabled selected>--Elegir un periodo--</option>
                        @foreach($periods as $period)
                            <option value="{{$period->id}}">{{$period->number->number}} - {{$period->period}}</option>
                        @endforeach
                    </select>
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
            <h3>Listado de Grados Asignados</h3>
            <hr>
            @if(isset($lss))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Nivel</th>
                            <th scope="row">Grado</th>
                            <th scope="row">Sección</th>
                            <th scope="row">Materia</th>
                            <th scope="row">Bimestre</th>
                            <th scope="row">Descripción</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($lss as $levels)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$levels->level->number->number}}</td>
                        <td>{{$levels->level->name}}</td>
                        <td>{{$levels->section->name}}</td>
                        <td>{{$levels->matter->name}}</td>
                        <td>{{$levels->period->number->number}} - {{$levels->period->period}}</td>
                        <td>{{$levels->description}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarLevel-{{$level->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarLevel-{{$level->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                        
                    @endforeach
                </table>
                {{ $lss->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection