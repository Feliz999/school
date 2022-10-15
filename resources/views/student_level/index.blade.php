@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nuevo Catedrático</h3>
            <hr>
            <form action="{{route('student_level.store')}}" method="post" class="form">
                @csrf
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Estudiante</span>
                  <select name="student_id" id="student_id" class="form-control">
                    <option value="" disabled selected>--Elegir un trabajo --</option>
                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->fullname}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="input-group mb-3 input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Grado Asignar</span>
                <select name="level_section_id" id="level_section_id" class="form-control">
                  <option value="" disabled selected>--Elegir un trabajo --</option>
                  @foreach($level_sections as $ls)
                      <option value="{{$ls->id}}">{{$ls->level->number->number}}{{$ls->level->name}}-{{$ls->section->name}}-{{$ls->matter->name}}</option>
                  @endforeach
                </select>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary">Asignar</button>
                </div>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Trabajos Calificados</h3>
            <hr>
            @if(isset($students_level))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Alumno</th>
                            <th scope="row">Grado</th>
                            <th scope="row">Sección</th>
                            <th scope="row">Materia</th>
                            <th scope="row">Mestro</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($students_level as $sh)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sh->student->fullname}}</td>
                        <td>{{$sh->level_section->level->number->number}} - {{$sh->level_section->level->name}}</td>
                        <td>{{$sh->level_section->section->name}}</td>
                        <td>{{$sh->level_section->matter->name}}</td>
                        <td>{{$sh->level_section->teacher->fullname}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarSH-{{$sh->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarSH-{{$sh->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $students_level->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@endsection