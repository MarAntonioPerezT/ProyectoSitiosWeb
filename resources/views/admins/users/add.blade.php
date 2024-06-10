<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <div class="container-fluid container" style="margin-top: 5rem">
        <h2>Añadir Usuario</h2>
        <form class="form-floating" action="{{url('/users')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="breadcrumb">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75" style="margin-bottom: 1rem">
                            <input type="text" class="form-control" name="NombreUsuario" id="floatingInput"
                                placeholder="Nombre del usuario" value="" required>
                            <label class="control-label" for="floatingInput">{{'Nombre del Usuario'}}</label>

                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="ApellidoUsuario" id="floatingInput" required
                                placeholder="Apellido del usuario">
                            <label class="control-label" for="floatingInput">{{'Apellido del usuario'}} </label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">

                            <input type="email" class="form-control" name="Email" id="floatingInputGrid"
                                placeholder="Email">
                            <label class="control-label" for="floatingInputGrid">{{'Email'}}</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="password" class="form-control" name="Password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-floating mb-3 w-75">

                            <select class="form-select" name="rol_id" id="floatingSelectGrid">
                                <option selected>Selecciona un rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->NombreRol}}</option>
                                @endforeach
                            </select>

                            <label for="floatingSelectGrid">{{'Rol del Usuario'}}: </label>

                        </div>

                    </div>
                    <div class="col-md-6 align-self-end">
                        <div class="form-group">
                            <input class="btn btn-outline-success" type="submit" value="Agregar">
                            <a class="btn btn-outline-danger" href="{{url('users')}}">Regresar</a>
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