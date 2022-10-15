<div class="modal" id="nota-{{$student->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Trabajos Realizados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="row">No.</th>
                        <th scope="row">Alumno</th>
                        <th scope="row">Trabajo</th>
                        <th scope="row">Puntos</th>
                    </tr>
                </thead>
                @foreach($student_homeworks as $sh)
                    @foreach($matters as $matter)
                        @if($sh->student_id == $student->id)
                            @if($sh->homework->matter_id)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$sh->student->fullname}}</td>
                                    <td>{{$sh->homework->name}}</td>
                                    <td>{{$sh->points}}/{{$sh->homework->points}}</td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$total_puntos}}/100</td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>