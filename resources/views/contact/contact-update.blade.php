@extends('template.template')

@section('title', 'Editar Contato')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="mt-5">
                <h3 class="mt-4">Editar Contato</h3>
                <p class="lead">
                    - Edite aqui o contato selecionado
                </p>
            </div>
            <div>
                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-info text-white">
                    Home
                </a>
            </div>
        </div>
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nameContact" class="form-label">Nome <span>*</span></label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id=" nameContact" value="{{ $contact->name }}" required>
                <div id="nameHelp" class="form-text">Min: 5 caracteres</div>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="emailContact" class="form-label">E-mail <span>*</span></label>
                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    id="emailContact" value="{{ $contact->email }}" required>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contato <span>*</span></label>
                <input type="text" name="contact" class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}"
                    id="contact" value="{{ $contact->contact }}" required>
                <div id="contactHelp" class="form-text">Min: 5 caracteres</div>
                @if ($errors->has('contact'))
                    <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
@endsection
