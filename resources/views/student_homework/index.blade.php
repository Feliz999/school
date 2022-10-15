@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Nuevo Catedrático</h3>
            <hr>
            <form action="{{route('student_homework.store')}}" method="post" class="form">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Estudiante</span>
                  <select name="student_id" id="student_id" class="form-control">
                    <option value="" disabled selected>--Elegir un Estudiante--</option>
                    @foreach($students as $student)
                      <option value="{{$student->id}}">{{$student->fullname}}</option>
                    @endforeach
                  </select>
                  <input type="text" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required disabled>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Trabajo</span>
                  <select id="homework_id" class="form-control">
                    <option value="" disabled selected>--Elegir un trabajo --</option>
                    @foreach($homeworks as $hm)
                        <option value="{{$hm->id}}_{{$hm->points}}">{{$hm->name}} - {{$hm->points}}pts.</option>
                    @endforeach
                    <input type="hidden" id="idHomework" name="homework_id">
                  </select>
              </div>
              <div class="input-group mb-3 input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Grado Asignado</span>
                <select name="level_section_id" id="level_section_id" class="form-control">
                  <option value="" disabled selected>--Elegir un trabajo --</option>
                  @foreach($level_sections as $ls)
                      <option value="{{$ls->id}}">{{$ls->level->number->number}}{{$ls->level->name}}-{{$ls->section->name}}-{{$ls->matter->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="input-group mb-3 input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Puntos</span>
                <input type="text" name="points" id="points" class="form-control">
            </div>
              <div class="input-group input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-image"></i></span>
                  <input type="file" name="" class="form-control" id="">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary">Calificar</button>
                </div>
            </form>
        </div>
        <div class="col-md-9 text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h3>Listado de Trabajos Calificados</h3>
            <hr>
            @if(isset($student_homeworks))
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="row">No.</th>
                            <th scope="row">Alumno</th>
                            <th scope="row">Trabajo</th>
                            <th scope="row">Puntos</th>
                            <th scope="row">Acción</th>
                        </tr>
                    </thead>
                    @foreach($student_homeworks as $sh)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sh->student->fullname}}</td>
                        <td>{{$sh->homework->name}}</td>
                        <td>{{$sh->points}}/{{$sh->homework->points}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editarSH-{{$sh->id}}"><i data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#eliminarSH-{{$sh->id}}"><i data-fa-symbol="delete" class="fa-solid fa-trash fa-fw" style="color:red"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$total_puntos}}/100</td>
                    </tr>
                </table>
                {{ $student_homeworks->links() }}
            @else
                <h3>No Existen Registros!</h3>
                <h5><--- Agrega uno </h5>
            @endif
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('#points').change(validarPuntos);
        function validarPuntos(){
            homework = document.getElementById('homework_id').value.split('_');
            console.log(homework);
            puntos = homework[1];
            idHomework = homework[0];
            puntosIngresados = $('#points').val();
            if(puntosIngresados<=puntos){
                true;
                $('#idHomework').val(idHomework);
            }else{
                alert('El trabajo tiene un valor de '+puntos);
                $('#points').val(0);
            }
            console.log(puntos);

        }
    </script>
@endpush
@endsection