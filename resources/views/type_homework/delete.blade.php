<div class="modal fade" id="eliminarTipo-{{$th->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-danger">
          <h5 class="modal-title">Eliminar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('typeHomework.destroy',$th->id)}}" method="post" class="form">
                <input name="_method" type="hidden" value="DELETE">
                @csrf
                <h4>Confirma que desea eliminar el tipo de trabajo: <b>{{$th->name}}</b></h4>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>