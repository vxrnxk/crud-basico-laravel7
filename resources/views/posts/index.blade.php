@extends('layouts.app')

@section('title', 'Listagem de posts')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-primary">CADASTRAR NOVO</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}  
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Identificação</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->price }}</td>
                    <td class="table-buttons">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-success" title="Mais Informações">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary" title="Atualizar Informações">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($post->title) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Apagar">
                                <i class="fa fa-close"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection