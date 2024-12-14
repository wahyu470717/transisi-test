@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $employee->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Company:</strong> {{ $employee->company->name }}</p>
            <p><strong>Created At:</strong> {{ $employee->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $employee->updated_at->format('d-m-Y H:i') }}</p>

            <a href="{{ route('employees.index') }}" class="btn btn-primary">Back to List</a>
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
