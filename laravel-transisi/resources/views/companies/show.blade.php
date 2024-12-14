@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Details</h1>
    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $company->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $company->email }}</td>
        </tr>
        <tr>
            <th>Logo</th>
            <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="100"></td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{ $company->website }}</td>
        </tr>
    </table>
    <a href="{{ route('companies.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
