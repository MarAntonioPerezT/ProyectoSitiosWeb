<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <div class="container-fluid container" style="margin-top: 5rem">
        <h2 class="shadow p-3 mb-5 rounded bg-primary-subtle">Editar Autor</h2>
        <form class="form-floating" action="{{route('authors.update', $authors->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="breadcrumb">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75" style="margin-bottom: 1rem">
                            <input type="text" class="form-control" name="NombreAutor" id="floatingInput"
                                placeholder="Nombre del Autor" value="{{isset($authors->NombreAutor)?$authors->NombreAutor:''}}" required>
                            <label class="control-label" for="floatingInput">{{'Nombre del Autor'}}</label>

                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="ApellidoAutor" id="floatingInput" required
                                value="{{isset($authors->ApellidoAutor)?$authors->ApellidoAutor:''}}" placeholder="Apellido del Autor">
                            <label class="control-label" for="floatingInput">{{'Apellido del Autor'}} </label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="Email" id="floatingInput" required
                                value="{{isset($authors->Email)?$authors->Email:''}}" placeholder="Email">
                            <label class="control-label" for="floatingInput">{{'Email'}}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="Phone" id="floatingInput" required
                                value="{{isset($authors->Phone)?$authors->Phone:''}}" placeholder="Phone">
                            <label class="control-label" for="floatingInput">{{'Teléfono'}}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="btn btn-outline-success" type="submit" value="Actualizar">
                    </div>
                </div>
                <div class="col-md-6 justify-content-end">
                    <div class="form-group">
                        <a class="btn btn-outline-danger" href="{{url('/authors/')}}">Regresar</a>
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