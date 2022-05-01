@extends('template.template')

@section('title', 'Login')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="mt-5">
                <h3 class="mt-4">Login</h3>
            </div>
            <div>
                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-info text-white">
                    Home
                </a>
            </div>
        </div>
        <form action="{{ route('login') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail<span>*</span></label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">E-mail<span>*</span></label>
                <input type="password" name="password" class="form-control" id=" password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        @if ($errors->has('login-error'))
            <div class="mt-3 text-danger"> <h6 class="p-0">{{ $errors->first('login-error') }}</h6></div>
        @endif
    </section>
@endsection
