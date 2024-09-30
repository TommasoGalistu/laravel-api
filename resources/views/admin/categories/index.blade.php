@extends('layouts.app')



@section('content')

@if (session('delete'))
<p class="text-success">{{ session('delete') }}</p>

@endif


@if ($errors->any())
<p class="text-danger">{{ $errors->first() }}</p>

@endif
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="scrivi nome">
    <button class="btn btn-primary" type="submit">Crea</button>
</form>
<ul class="d-flex flex-column">
    @foreach ($categories as $category)
    <li class="d-flex gap-3">


        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <input class="category" type="text" name="name" value="{{ $category->name }}">
                <button class="btn btn-warning">Modifica</button>
            </form>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            </form>
    </li>

    @endforeach
</ul>
@endsection
