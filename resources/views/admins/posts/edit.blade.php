<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

    <div class="container-fluid container" style="margin-top: 5rem">
        <h2>Editar Post</h2>
        <form class="form-floating" action="{{route('posts.update', $posts->id)}}" method="POST"
            enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="breadcrumb">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75" style="margin-bottom: 1rem">
                            <input type="text" class="form-control" name="TituloEntrada" id="floatingInput"
                                placeholder="Titulo Entrada"
                                value="{{isset($posts->TituloEntrada) ? $posts->TituloEntrada : ''}}" required>
                            <label class="control-label" for="floatingInput">{{'Titulo Entrada'}}</label>

                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" class="form-control" name="PostContenido" id="floatingInput" required
                                placeholder="Contenido"
                                value="{{isset($posts->PostContenido) ? $posts->PostContenido : ''}}">
                            <label class="control-label" for="floatingInput">{{'Contenido'}} </label>
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="col-5 mb-3 w-75">
                            <label class="form-label" for="PostImagen">{{'Imagen'}}</label>
                            <input type="file" class="form-control" name="PostImagen"
                                value="{{isset($posts->PostImagen) ? $posts->PostImagen : ''}}" required
                                placeholder="Imagen">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="datetime" class="form-control" name="FecPublicacion" id="floatingInputGrid"
                                placeholder="{{date('Y-m-d')}}"
                                value="{{isset($posts->FecPublicacion) ? $posts->FecPublicacion : ''}}" disabled>
                            <label for="floatingInputGrid">{{'Fecha de publicación'}}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <input type="datetime" class="form-control" name="Fec_creacion" id="floatingInputGrid"
                                placeholder="{{date('Y-m-d')}}"
                                value="{{isset($posts->Fec_creacion) ? $posts->Fec_creacion : ''}}" disabled>
                            <label for="floatingInputGrid">{{'Fecha de creación'}}</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <select class="form-select" name="label_id" id="floatingSelectGrid">
                                <option selected>Selecciona una etiqueta</option>
                                @foreach ($labels as $label)
                                    <option value="{{ $label->id }}" {{ $label->id === $posts->label_id ? 'selected' : '' }}>
                                        {{ $label->NombreEtiqueta }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">{{ 'Etiqueta' }}: </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 w-75">
                            <select class="form-select" name="categories_id" id="floatingSelectGrid">
                                <option selected>Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === $posts->categories_id ? 'selected' : '' }}>
                                        {{ $category->NombreCategoria }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">{{ 'Categoría' }}: </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="btn btn-outline-success" type="submit" value="Actualizar">
                            <a class="btn btn-outline-danger" href="{{url('posts')}}">Regresar</a>
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