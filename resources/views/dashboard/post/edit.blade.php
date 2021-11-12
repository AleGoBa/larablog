<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@include('dashboard.partials.nav-header-main')
<div class="container">
    @include('dashboard.partials.validation-error')
    @include('dashboard.partials.sesion-flash-status')
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean"
                value="{{ old('url_clean', $post->url_clean) }}">
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select name="category_id" class="form-control text-center" aria-label="Default select example">
                @foreach ($categories as $name => $id)
                    @if ($id == $post->category_id)
                        <option selected value="{{ $id }}">{{ $name }}</option>
                    @else
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="posted">¿Publicar?</label>
            <select name="posted" class="form-control text-center" aria-label="Default select example">
                @include('dashboard.partials.yes-no-option')
            </select>
        </div>
        <div class="form-group">
            <label for="description">Contenido</label>
            <textarea class="form-control" type="text" name="description"
                id="description"> {{ old('description', $post->description) }}</textarea>
        </div>
        <input type="submit" value="Actualizar" class="btn btn-primary">
    </form>

    <form action="{{route('post.image',$post)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" value="Subir">
            </div>
        </div>






    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
