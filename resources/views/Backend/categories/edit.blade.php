@extends('layouts.dashbord')

@section('contant')
@section('titel')
Categories <smal> <a href="{{route('index')}}" class="btn btn-sm btn-outline-primary">index</a></smal>
@endsection

<form action="{{ route('backend.update', [$category->id]) }}" method="post">
    <!-- CSRF Token -->
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $category->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="parent_id">Parent</label>
        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
            <option value="">No Parent</option>
           
        </select>
        @error('parent_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status-published" value="published" @if($category->status == 'published') checked @endif>
            <label class="form-check-label" for="status-published">
                Published
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if($category->status == 'draft') checked @endif>
            <label class="form-check-label" for="status-draft">
                Draft
            </label>
        </div>
        @error('status')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

@endsection