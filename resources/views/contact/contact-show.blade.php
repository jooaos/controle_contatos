@extends('template.template')

@section('title', 'Visualizar Contato')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="mt-5">
                <h3 class="mt-4">Visualizar Contato</h3>
                <p class="lead">
                    - Visualize aqui os dados do contato selecionado
                </p>
            </div>
            <div>
                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-info text-white">
                    Home
                </a>
            </div>
        </div>
        <div class="mb-3">
            <label for="nameContact" class="form-label">Nome <span>*</span></label>
            <input type="text" name="name" class="form-control"
                id=" nameContact" value="{{ $contact->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="emailContact" class="form-label">E-mail <span>*</span></label>
            <input type="text" name="email" class="form-control"
                id="emailContact" value="{{ $contact->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contato <span>*</span></label>
            <input type="text" name="contact" class="form-control"
                id="contact" value="{{ $contact->contact }}" readonly>
        </div>
    </section>
@endsection
