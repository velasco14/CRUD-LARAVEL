<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8f473bcba3.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">Prueba CRUD</h1>

    @if (session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}</div>
    @endif
    @if (session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif

    <script>
        var res=function(){
            var not=confirm("¿Quieres eliminar el usuario?");
            return not;
        }
    </script>

    <!-- Registro datos-->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("crud.create")}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Id de usuario</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Apodo</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapodo">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcontraseña">
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                      </div>
                  </form>
            </div>
            
          </div>
        </div>
      </div>
    
      <div class="p-5 table-responsive">
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalAgregar">Añadir usuario</button>
    <table class="table table-striped table-bordered table-hover">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Apodo</th>
      <th scope="col">Contraseña</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($datos as $item)
    <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->apodo}}</td>
        <td>{{$item->contraseña}}</td>
        <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
            <a href="{{route("crud.delete",$item->id)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </td>

  
  <!-- Modificar datos-->
  <div class="modal fade" id="modalEditar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("crud.update")}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Id de usuario</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid" value="{{$item->id}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apodo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapodo" value="{{$item->apodo}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcontraseña" value="{{$item->contraseña}}">
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                  </div>
              </form>
        </div>
        
      </div>
    </div>
  </div>

      </tr>
    @endforeach
    
  </tbody>
</table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>