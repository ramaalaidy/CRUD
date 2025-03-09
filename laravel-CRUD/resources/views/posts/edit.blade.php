@extends('layout')

@section('content')
<h2>Edit Data</h2>
<form action="{{ route('post.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $post->name }}" required>
    <input type="email" name="email" value="{{ $post->email }}" required>
    <textarea name="message" required>{{ $post->message }}</textarea>
    <button type="submit">Update</button>
</form>
@endsection
