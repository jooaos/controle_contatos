@extends('template.template')

@section('title', 'Contatos')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="mt-5">
                <h3 class="mt-4">Contatos</h3>
                <p class="lead">
                    - Aqui você encontra todos os contatos que estão cadastrados em seu sistema
                </p>
            </div>
            <div>
                <a href="{{ route('contacts.create') }}" class="btn btn-info text-white ml-5">
                    Adicionar Contato
                </a>
            </div>
        </div>
        @if (session('positive-status'))
            <div class="alert alert-success">
                {{ session('positive-status') }}
            </div>
        @endif
        @if (session('negative-status'))
            <div class="alert alert-danger">
                {{ session('negative-status') }}
            </div>
        @endif
        <table class="table table-striped mt-5">
            <thead>
                <tr class="d-flex">
                    <th class="col-2">ID</th>
                    <th class="col-2">Nome</th>
                    <th class="col-3">Email</th>
                    <th class="col-2">Contato</th>
                    <th class="col-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="d-flex">
                        <td class="col-2">{{ $contact->id }}</td>
                        <td class="col-2">{{ $contact->name }}</td>
                        <td class="col-3">{{ $contact->email }}</td>
                        <td class="col-2">{{ $contact->contact }}</td>
                        <td class="col-3">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary text-white ml-5">
                                Editar
                            </a>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-secondary text-white ml-5">
                                Visualizar
                            </a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white mr-5">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="d-flex">
                        <td class="col-2">X</td>
                        <td class="col-2">X</td>
                        <td class="col-2">X</td>
                        <td class="col-2">X</td>
                        <td class="col-4">
                            X
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

@endsection
