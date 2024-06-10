<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiquetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <div class="container container-fluid mt-5">
        @if(Session::has('Mensaje'))
            <div id="alertMensaje" class="alert alert-success" role="alert">
                {{Session::get('Mensaje')}}
            </div>
            <script>
                setTimeout(function () {
                    document.getElementById('alertMensaje').style.visibility = 'collapse';
                }, 3000);
            </script>
        @endif 

        <h1 class="shadow p-3 mb-5 rounded bg-primary-subtle">Etiquetas</h1>
        <div class="col-xs12 col-md-6 col-lg-4" style="padding-bottom: 2rem;">
            <a href="{{'labels/create'}}" type="button" class="btn btn-outline-warning">Agregar Etiqueta</a>
            <a href="{{'/'}}" type="button" class="btn btn-outline-secondary">Regresar</a>
        </div>
        <div>
            <table id="labels" class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de la Etiqueta</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Usuario creador</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($labels as $label)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$label->NombreEtiqueta}}</td>
                            <td>{{$label->Descripcion}}</td>
                            <td>{{$label->FechaCreacion}}</td>
                            <td>{{$label->UsuarioCreador}}</td>
                            <td><a type="button" class="btn btn-outline-primary"
                                    href="{{url('/labels/' . $label->id . '/edit')}}">Editar</a>
                                <form action="{{url('/labels/' . $label->id)}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('¿Seguro que desas borrar la etiqueta?')">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


</body>

</html>