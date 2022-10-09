<div class="modal fade" id="editarTeacher-{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn btn-primary">
          <h5 class="display-6">Editar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('teacher.update',$teacher->id)}}" method="post" class="form">
                <input name="_method" type="hidden" value="PATCH">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-sharp fa-solid fa-barcode"></i></i></span>
                  <input type="text" name="code" value="{{$teacher->code}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-user"></i></span>
                  <input type="text" name="fullname" value="{{$teacher->fullname}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-address-card"></i></span>
                  <input type="text" name="cui" value="{{$teacher->cui}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-cake-candles"></i></span>
                  <input type="date" name="birthday" value="{{$teacher->birthday}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-phone"></i></span>
                  <input type="phone" name="phone" value="{{$teacher->phone}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-location-dot"></i></span>
                  <input type="text" name="address" value="{{$teacher->address}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group mb-3 input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-envelope"></i></span>
                  <input type="email" name="email" value="{{$teacher->email}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
              </div>
              <div class="input-group input-group-lg">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-image"></i></span>
                  <img src="" alt="foto">
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