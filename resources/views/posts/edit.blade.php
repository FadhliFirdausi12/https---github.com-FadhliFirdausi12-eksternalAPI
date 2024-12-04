@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Post</h1>

        {{-- Tampilkan Pesan Error Jika Ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit --}}
        <form action="{{ route('posts.update', $post['id'] ?? '') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Input Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                    type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $post['title'] ?? '') }}"
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Body --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea 
                    class="form-control @error('body') is-invalid @enderror" 
                    id="body" 
                    name="body" 
                    rows="5" 
                    required
                >{{ old('body', $post['body'] ?? '') }}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
