<div class="modal fade" id="addHomework-{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Calificar Trabajo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('student.update',$student->id)}}" method="post" class="form">
                <input name="_method" type="hidden" value="PATCH">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Nombre Estudiante</span>
                  <input type="text" value="{{$student->fullname}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required disabled>
                  <input type="hidden" name="student_id" value="{{$student->id}}">
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Trabajo</span>
                  <select name="homework_id" id="homework_id" class="form-control">
                    <option value="" disabled selected>--Elegir un trabajo --</option>
                    @foreach($homeworks as $hm)
                        <option value="{{$hm->id}}">{{$hm->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="input-group mb-3 input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Grado Asignado</span>
                <select name="level_section_id" id="level_section_id" class="form-control">
                  <option value="" disabled selected>--Elegir un trabajo --</option>
                  @foreach($homeworks as $hm)
                      <option value="{{$hm->id}}">{{$hm->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="input-group mb-3 input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Puntos</span>
                <input type="text" class="form-control">
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
      </div>
    </div>
  </div>