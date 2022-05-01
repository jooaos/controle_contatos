@extends('template.template')

@section('title', 'Adicionar Contato')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="mt-5">
                <h3 class="mt-4">Adicionar Contato</h3>
                <p class="lead">
                    - Adicione os contatos aqui
                </p>
            </div>
            <div>
                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-info text-white">
                    Home
                </a>
            </div>
        </div>
        <form action="{{ route('contacts.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="nameContact" class="form-label">Nome <span>*</span></label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id=" nameContact" value="{{ old('name') }}" required>
                <div id="nameHelp" class="form-text">Min: 5 caracteres</div>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="emailContact" class="form-label">E-mail <span>*</span></label>
                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    id="emailContact" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contato <span>*</span></label>
                <input type="text" name="contact"
                    class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" id="contact"
                    value="{{ old('contact') }}" required>
                <div id="contactHelp" class="form-text">Min: 5 caracteres</div>
                @if ($errors->has('contact'))
                    <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </section>
@endsection