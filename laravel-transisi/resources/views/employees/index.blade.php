@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees List</h1>

    <!-- Tombol Import, Export PDF, dan Add Employee -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data" class="d-inline-block">
                @csrf
                <input type="file" name="file" class="form-control-file d-inline-block" style="width: auto;">
                <button type="submit" class="btn btn-info">Import</button>
            </form>
        </div>
        <div>
            <a href="{{ route('employees.exportPdf', $employees->first()->company->id) }}" class="btn btn-success">Export to PDF</a>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>
    </div>

    @if ($employees->count())
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
    @else
    <p>No employees found.</p>
    @endif
</div>
@endsection
