@extends('layouts.app')


@section('content')


@foreach ($categories as $category)

<h3>{{ $category->name }}</h3>
<ul class="list-group">

    @foreach ($category->posts as $post)

    <li class="list-group-item d-flex justify-content-between">
        {{ $post->title }}
        <span class="d-flex gap-1">

            <a href="{{route('admin.posts.show', $post)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square "></i></a>
                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </form>
        </span>
    </li>
    @endforeach

@endforeach
  </ul>
@endsection
