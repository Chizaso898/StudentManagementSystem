blade

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Set Your Password</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('set.password') }}">
        @csrf
        <input type="hidden" name="email" value="{{ request('email') }}">
        
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Set Password</button>
    </form>
</div>
@endsection
