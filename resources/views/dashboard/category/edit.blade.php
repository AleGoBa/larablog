<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
@include('dashboard.partials.nav-header-main')
<div class="container">
    @include('dashboard.partials.validation-error')
    @include('dashboard.partials.sesion-flash-status')

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean"
                value="{{ old('url_clean', $category->url_clean) }}">
        </div>
    
        <input type="submit" value="Actualizar" class="btn btn-primary">
    </form>
</div>
