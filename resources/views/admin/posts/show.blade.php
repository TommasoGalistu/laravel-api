@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('status'))
        <p class="alert alert-success">{{ session('status') }}</p>
    @endif

    <div class="d-flex gap-3 p-3">

        <h3>Titolo: {{ $post->title }} </h3>
        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning align-self-baseline"><i class="fa-solid fa-pen-to-square "></i></a>
                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </form>
    </div>

    <p>Descrizione: {{ $post->description }}</p>
    <p>Categoria:
    @if ($post->category?->name)
    <span class="badge bg-success">{{ $post->category->name }}</p>

    @else
    <span class="badge bg-success">-</span>
    @endif
    <p>Categoria:
        @forelse ($post->types as $type)

        <span class="badge bg-success">{{ $type->name }}</span>

        @empty
            <span class="badge bg-success">-</span>
        @endforelse
    </p>
    <div class="contImg">
        <img src="{{ asset('storage/' . $post->path_img) }}" alt="">
    </div>



    <div class="d-flex flex-column gap-3">
        <div>
            <a href="{{route('admin.posts.index')}}" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i></a>
            <span>All Project</span>

        </div>
        <div>

            <a href="{{route('admin.showAllCategories')}}" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i></a>
            <span>All Categories</span>
        </div>

    </div>



</div>


@endsection
