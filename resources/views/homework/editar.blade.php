<div class="modal fade" id="editarHomework-{{$hm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Editar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('homework.update',$hm->id)}}" method="post" class="form">
                <input name="_method" type="hidden" value="PATCH">
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>