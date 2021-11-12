<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@include('dashboard.partials.nav-header-main')

<div class="container">
    @include('dashboard.partials.sesion-flash-status')
    <a class="btn btn-success mt-3 mb-3" href="{{ route('post.create') }}">Crear</a>
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Título</td>
                <td>Posteado</td>
                <td>Categoria</td>
                <td>Creación</td>
                <td>Actualización</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->posted }}</td>
                    <td>{{ $post->category->name}}</td>
                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                    <td>{{ $post->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('post.show', $post) }}" class="btn btn-primary   btn-sm">Ver</a>

                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary  btn-sm">Editar</a>


                        <button class="btn btn-danger btn-sm" type="submit" data-toggle="modal"
                            data-target="#borrarModal" data-id="{{ $post->id }}">Eliminar</button>



                    </td>

                </tr>

            @endforeach
        </tbody>

    </table>
    {{ $posts->links() }}



    <div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Borrar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que deseas borrar este Post?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form id="formDelete"
                      method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary">Si</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#borrarModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var route = 'http://larablog.test/dashboard/post/' + id         
        var formDel = document.getElementById('formDelete')
        formDel.action=route

   var modal = $(this)

        modal.find('.modal-title').text('Vas a borrar el post: ' + id)

    })
</script>
