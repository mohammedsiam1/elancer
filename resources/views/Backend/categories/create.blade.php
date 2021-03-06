@extends('layouts.dashbord')

@section('titel')
Categories<a class="btn btn-outline-primary btn-sm mr-1" href="{{ route('index') }}">home</a>
@endsection

@section('contant')
<form action="{{ route('backend.store') }}" method="post">
    <!-- CSRF Token -->
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
        @error('slug')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="parent_id">Parent</label>
        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
            <option value="">No Parent</option>
           {{--  @foreach (App\Category::all() as $category)

            <option @if($category->id == old('parent_id')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach --}}
        </select>
        @error('parent_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Status</label>
        <div class="form-check @error('status') is-invalid @enderror">
            <input class="form-check-input" type="radio" name="status" id="status-published" value="published" @if(old('status', 'published') == 'published') checked @endif>
            <label class="form-check-label" for="status-published">
                Published
            </label>
        </div>
        <div class="form-check @error('status') is-invalid @enderror">
            <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status') == 'draft') checked @endif>
            <label class="form-check-label" for="status-draft">
                Draft
            </label>
        </div>
        @error('status')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>

@endsection