<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

@include('dashboard.partials.nav-header-main')
<div class="container">

    <form >
 
        <div class=" form-group">
        <label for="name">Nombre</label>
        <input readonly class="form-control" type="text" name="name" id="name" value="{{$category->name}}">
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input  readonly class="form-control" type="text" name="url_clean" id="url_clean"  value="{{$category->url_clean}}">
</div>


</form>


</div>
