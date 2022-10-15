<div class="modal fade" id="addHomework-{{$student->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Calificar Trabajo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Materia</th>
                <th>Catedrático</th>
              </tr>
            </thead>
            @foreach($matters as $ma)
              @foreach($student_levels as $sl)
                @if($sl->student_id == $student->id)
                  @if($sl->level_section->matter->id == $ma->id)
                    <tbody>
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><button type="button" data-bs-toggle="modal" data-bs-whatever="{{$ma->id}}" data-bs-target="#nota-{{$student->id}}" data-bs-dismiss="modal fade" class="btn btn-info">{{$sl->level_section->matter->name}}</button></td>
                        <td>{{$sl->level_section->teacher->fullname}}</td>
                      </tr>
                      <tr>
                        <th scope="row">No.</th>
                        <th scope="row">Alumno</th>
                        <th scope="row">Trabajo</th>
                        <th scope="row">Puntos</th>
                        @php $total_puntos = 0; @endphp
                        @foreach($student_homeworks as $sh)
                          @if($sh->student_id == $student->id)
                            @if($sh->homework->matter_id == $ma->id)
                            <td>
                              
                            </td>
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sh->student->fullname}}</td>
                                <td>{{$sh->homework->name}}</td>
                                <td>{{$sh->points}}/{{$sh->homework->points}}</td>
                              </tr>
                              {{$total_puntos = $total_puntos + $sh->points}}
                            @endif
                          @endif
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>{{$total_puntos}}/100</td>
                        </tr>
                        
                      </tr>
                    </tbody>
                  @endif
                @endif
              @endforeach
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>