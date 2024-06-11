<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Público</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>


</head>

<body>

    <div class="container pt-5 mb-3">
        <div>
            <h1 class="shadow p-3 mb-5 rounded bg-primary-subtle text-center">Posts</h1>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 pt-3 mb-3">
                    <div class="card border-warning h-100" data-title="{{ $post->TituloEntrada }}"
                        data-image="{{ $post->PostImagen }}" data-content="{{ $post->PostContenido }}"
                        data-date="{{ $post->FecPublicacion }}" data-creacion="{{ $post->Fec_creacion }}"
                        data-category="{{ $post->categories->NombreCategoria }}"
                        data-tags="{{ $post->labels->NombreEtiqueta }}">
                        <div class="card-header border-warning">
                            <h3 class="card-title">
                                <div class="card-header border-warning">{{$post->TituloEntrada}}
                            </h3>
                        </div>
                        <img src="{{ $post->PostImagen }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{$post->PostContenido}}</p>
                        </div>
                        <div class="card-footer bg-transparent border-warning">Fecha de publicación:
                            <strong>{{$post->FecPublicacion}}</strong>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="container container-fluid">
        {!! $posts->links() !!}
    </div>

    @include('public.modal.modalPost')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.card').on('click', function () {
                var title = $(this).data('title');
                var image = $(this).data('image');
                var content = $(this).data('content');
                var date = $(this).data('date');
                var creacion = $(this).data('creacion');
                var category = $(this).data('category');
                var tags = $(this).data('tags');

                $('#postModalLabel').text(title);
                $('#postImage').attr('src', image);
                $('#postContent').text(content);
                $('#postDate').text('Fecha de publicación: ' + date);
                $('#postCreacion').text('Fecha de creación: ' + creacion);
                $('#postCategory').text('Categoría: ' + category);
                $('#postTags').text('Etiquetas: ' + tags);

                $('#postModal').modal('show');
            });
        });
    </script>


</body>

</html>