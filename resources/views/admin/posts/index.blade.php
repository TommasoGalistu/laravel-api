@extends('layouts.app')

@section('content')
@if (session('status'))
<p class="alert alert-success">{{ session('status') }}</p>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Categoria</th>
        <th scope="col">Tipo</th>
        <th scope="col">Caricamento</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)

        <tr>
          <td scope="row">{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          @if($post->category)
          <td class="badge text-bg-success d-inline">{{ $post->category->name }}</td>
          @else
          <td class="badge text-bg-success d-inline">-</td>
          @endif
          <td class=" text-success d-flex flex-wrap gap-2">

            @forelse ($post->types as $tag)
                <span class="badge bg-success">
                    {{ $tag->name }}
                </span>

            @empty
                <span>-</span>
            @endforelse
          </td>
          <td>{{ $post->added_at }}</td>
          <td
            class="d-flex ">
            <a href="{{route('admin.posts.show', $post)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square "></i></a>
            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            </form>
          </td>

        </tr>
        @endforeach

    </tbody>
  </table>
  {{ $posts->links() }}
@endsection
