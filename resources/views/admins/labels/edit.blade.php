<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Etiqueta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <div class="container-fluid container" style="margin-top: 5rem">
        <h2 class="shadow p-3 mb-5 rounded bg-primary-subtle">Editar Etiqueta</h2>
        <form class="form-floating" action="{{route('labels.update', $labels->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="breadcrumb">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75" style="margin-bottom: 1rem">
                            <input type="text" class="form-control" name="NombreEtiqueta" id="floatingInput"
                                placeholder="Nombre de la Etiqueta" value="{{isset($labels->NombreEtiqueta)?$labels->NombreEtiqueta:''}}" required>
                            <label class="control-label" for="floatingInput">{{'Nombre de la Etiqueta'}}</label>

                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="Descripcion" id="floatingInput" required
                                placeholder="Descripción"
                                value="{{isset($labels->Descripcion) ? $labels->Descripcion : ''}}">
                            <label class="control-label" for="floatingInput">{{'Descripción'}} </label>
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
                                value="{{isset($labels->UsuarioCreador)?$labels->UsuarioCreador:''}}" placeholder="Usuario Creador">
                            <label class="control-label" for="floatingInput">{{'Usuario Creador'}}</label>
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
                        <a class="btn btn-outline-danger" href="{{url('/labels/')}}">Regresar</a>
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