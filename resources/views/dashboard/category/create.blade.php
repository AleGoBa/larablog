
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

@include('dashboard.partials.nav-header-main')
<div class="container">

@include('dashboard.partials.validation-error')
@include('dashboard.partials.sesion-flash-status')
    


    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Titulo</label>
            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
            <!-- @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror-->
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean"  value="{{old('url_clean')}}">
        </div>
       
        <input type="submit" value="Enviar" class="btn btn-primary">




    </form>


</div>
