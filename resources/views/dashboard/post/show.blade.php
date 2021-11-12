<link rel="stylesheet" href="{{ asset('css/app.css') }}">


@include('dashboard.partials.nav-header-main')
<div class="container">

    <form > 
        <div class=" form-group">
        <label for="title">Titulo</label>
        <input readonly class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input  readonly class="form-control" type="text" name="url_clean" id="url_clean"  value="{{$post->url_clean}}">
</div>
<div class="form-group">
    <label for="category_id">Categoria</label>
    <select readonly name="category_id" class="form-control text-center" aria-label="Default select example">
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
    <select readonly name="posted" class="form-control text-center" aria-label="Default select example">
        @include('dashboard.partials.yes-no-option')
    </select>
</div>
<div class="form-group">
    <label for="description">Contenido</label>
    <textarea  readonly class="form-control" type="text" name="description" id="description">{{$post->description}} </textarea>
</div>

</form>


</div>
<script src="{{ asset('js/app.js') }}"></script>