@extends('layouts.app')

@section('title', 'Página cadastrar novo post')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                

                <div class="form-group">
                    <label for="post-title">Título</label>
                <input type="text" class="form-control" id="post-title" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="post-description">Descrição</label>
                    <textarea class="form-control" id="post-description" name="description" rows="3">{{ old('title') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="post-price">Identificação</label>
                    <input type="text" class="form-control" id="post-price" name="price" value="{{ old('title') }}">
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block">CADASTRAR</button>
            </form>
        </div>
    </div>
@endsection