@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">

        <p>Ciao {{ Auth::user()->name }}</p>
    </h2>
    <div class="row">
        <div class="col">
            <p>Sono presenti <a href="{{ route('admin.posts.index') }}" class="badge bg-success">{{ $last_element->id }}</a> post </p>

        </div>
    </div>

</div>
@endsection
