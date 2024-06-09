<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <div class="container-fluid container" style="margin-top: 5rem">
        <h2>Editar Categoría</h2>
        <form class="form-floating" action="{{route('categories.update', $categories->id)}}" method="POST"
            enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="breadcrumb">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75" style="margin-bottom: 1rem">
                            <input type="text" class="form-control" name="NombreCategoria" id="floatingInput"
                                placeholder="Nombre categoria"
                                value="{{isset($categories->NombreCategoria) ? $categories->NombreCategoria : ''}}"
                                required>
                            <label class="control-label" for="floatingInput">{{'Nombre Categoria'}}</label>

                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="Descripcion" id="floatingInput" required
                                placeholder="Descripción"
                                value="{{isset($categories->Descripcion) ? $categories->Descripcion : ''}}">
                            <label class="control-label" for="floatingInput">{{'Descripcion'}} </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            @php
                                date_default_timezone_set('America/Mexico_City');
                            @endphp
                            <input type="datetime" class="form-control" name="FechaCreacion" id="floatingInputGrid"
                                placeholder="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" disabled>
                            <label for="floatingInputGrid">{{'Fecha de creación'}}</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="UsuarioCreador" id="floatingInput" required
                                placeholder="UsuarioCreador"
                                value="{{isset($user->NombreUsuario, $user->ApellidoUsuario) ? $user->NombreUsuario.' '. $user->ApellidoUsuario: ''}}"
                                disabled>
                            <label class="control-label" for="floatingInput">{{'Usuario Creador'}} </label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="btn btn-outline-primary" type="submit" value="Actualizar">
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-end">
                        <div class="form-group">
                            <a class="btn btn-outline-danger" href="{{url('categories')}}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>