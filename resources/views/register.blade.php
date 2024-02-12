@extends('layout')
@section('title', "Register")
@section('body')
<div class="container">
    <form action="{{route('register-user')}}" class="ms-auto me-auto mt-3 needs-validation" style="width: 500px" novalidate method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
            <div class="invalid-feedback">Name must be at least 3 characters long.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
            <div class="invalid-feedback">Username must be at least 3 characters long.</div>
            <span class="text-danger">@error('username') {{$message}} @enderror </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
            <div class="invalid-feedback">Password must be at least 6 characters long.</div>
        </div>
        <button type="submit" class="btn btn-primary text-uppercase">Register</button>
    </form>
</div>

<script>validateINPForPage("register");</script>
@endsection