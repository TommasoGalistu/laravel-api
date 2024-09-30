@extends('layouts.app')

@section('content')
@if(session('status'))
    <p class="alert alert-success">{{ session('status') }}</p>
@endif


<h3>Titolo: {{ $post->title }}</h3>
<p>Descrizione: {{ $post->description }}</p>
<p>Categoria:
@if ($post->category?->name)
<span class="badge bg-success">{{ $post->category->name }}</p>

@else
<span class="badge bg-success">Nessuna</span>
@endif
<p>Categoria:
    @forelse ($post->types as $type)

    <span class="badge bg-success">{{ $type->name }}</span>

    @empty
        <span>Nessun tipo</span>
    @endforelse
</p>
<div class="contImg">
    <img src="{{ asset('storage/' . $post->path_img) }}" alt="{{ $post->original_name_img }}">
</div>
<div class="cont d-flex gap-3 ">
    <div class="d-flex flex-column">
        <span>All Project</span>
        <a href="{{route('admin.posts.index')}}" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i></a>
        <span>All Categories</span>
        <a href="{{route('admin.showAllCategories')}}" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i></a>

    </div>
    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning align-self-baseline"><i class="fa-solid fa-pen-to-square "></i></a>
    <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
    </form>

</div>

@endsection
