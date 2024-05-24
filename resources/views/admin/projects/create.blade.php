@extends('layouts.admin')

@include('admin.partials.aside')


@section('content')

    <div class="container my-container">
        <h1>Aggiungi un nuovo Progetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif


        {{-- messaggio di cancellazione avvenuta del progetto --}}
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
            {{session('error')}}
            </div>
        @endif

        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    aria-describedby="emailHelp"
                    name="title"
                    value="{{old('title')}}">

                    @error('title')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input
                    type="text"
                    class="form-control @error('type') is-invalid @enderror"
                    id="type"
                    aria-describedby="emailHelp"
                    name="type"
                    value="{{old('type')}}">
                    @error('type')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input
                    type="text"
                    class="form-control @error('link') is-invalid @enderror"
                    id="link"
                    aria-describedby="emailHelp"
                    name="link"
                    value="{{old('link')}}">
                    @error('link')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea
                    type="text"
                    class="form-control @error('description')is-invalid @enderror"
                    id="description"
                    aria-describedby="emailHelp"
                    name="description"
                    value="{{old('description')}}">
                </textarea>

            </div>

            <div>
                <button class="btn btn-primary " type="submit">Aggiungi Progetto</button>
            </div>
        </form>
    </div>



@endsection
