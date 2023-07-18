@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form  method="POST" action="{{route('categories.store')}}">
            @csrf

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="mb-3 col">
                <label for="name" class="form-label">Nombre de la categoria</label>
                <input type="text" class="form-control mb-2" name="name" >
            </div>
            <div class="mb-3 col">
                <label for="color" class="form-label">color de la categoria</label>
                <input type="color" class="form-control mb-2" name="color" >
            </div>
            <button type="submit" class="btn btn-primary">Crear una nueva categoria</button>
        </form>
        <div>
            @foreach($categories as $category)
                <div class="row py-1">
                    <div CLASS="col-md9 d-flex align-items-center">
                        <a class="d-flex align-item-center gap-2" href="{{oute('$categories.show', ['$category'=>$category->id])}}">
                            <span class="color-container" style="background-color: {{$category->color}}"></span>{{$category->name}}
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal{{$category->id}}">Eliminar</button>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>

@endsection
