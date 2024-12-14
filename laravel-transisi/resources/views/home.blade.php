@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <div class="d-flex justify-content-around mt-4">
                        <!-- Link ke halaman Companies -->
                        <a href="{{ route('companies.index') }}" class="btn btn-primary">
                            <i class="fas fa-building"></i> {{ __('Companies') }}
                        </a>

                        <!-- Link ke halaman Employees -->
                        <a href="{{ route('employees.index') }}" class="btn btn-success">
                            <i class="fas fa-users"></i> {{ __('Employees') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Font Awesome CDN -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
