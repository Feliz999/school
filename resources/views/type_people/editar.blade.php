<div class="modal fade" id="editarTipo-{{$tp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Editar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('typePeople.update',$tp->id)}}" method="post" class="form">
                <input name="_method" type="hidden" value="PATCH">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <label for="name" class="input-group-text" id="inputGroup-sizing-lg">Nombre</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="name"  value="{{$tp->name}}" required>
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <label for="description" class="input-group-text" id="inputGroup-sizing-lg">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">{{$tp->description}}</textarea>
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