<div class="modal fade" id="editarNumber-{{$number->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Editar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('number.update',$number->id)}}" method="post" class="form">
                <input name="_method" type="hidden" value="PATCH">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <label for="name" class="input-group-text" id="inputGroup-sizing-lg">Número</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="number"  value="{{$number->number}}" required>
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