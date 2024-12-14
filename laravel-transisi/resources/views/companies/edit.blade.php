@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name) }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email) }}" required>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if ($company->logo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50">
            </div>
            @endif
            @error('logo')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $company->website) }}" required>
            @error('website')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection
