@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
      @error('title')
        <small class="invalid-feedback">{{$message}}</small>
      @enderror
    </div>
    <select class="form-select" aria-label="Default select example" name="category_id">
        <option value="" selected>Open this select menu</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>

        @endforeach

      </select>
      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        @foreach ($types as $type)
            <input type="checkbox" class="btn-check" id="type-{{ $type->id }}"  autocomplete="off" value="{{ $type->id }}"
             @if (in_array($type->id, old('type', [])))
                checked
            @endif name="type[]">
            <label class="btn btn-outline-primary" for="type-{{ $type->id }}">{{ $type->name }}</label>


        @endforeach
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile" name="path_img">
      </div>


    <div class="mb-3 d-flex flex-column">
      <label for="description" class="form-label">Descrizione</label>
      <textarea name="description" id="description" cols="30" rows="10"></textarea>
      @error('description')
        <small class="invalid-feedback">{{$message}}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
