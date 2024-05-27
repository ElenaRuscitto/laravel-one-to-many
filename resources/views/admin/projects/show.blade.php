


@extends('layouts.admin')

@section('content')

<section class="h-100 flex-grow-1 sec-index ">
    <div class="container my-container pt-4 w-100 ">

        <div class="row">
            <div class="col"><h1 class="mb-5">Dettagli</h1></div>
        </div>

        <div class="row">
            {{-- <div class="col">
                <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}">
            </div> --}}
            <div class="col">
                      <h5 class="card-title mb-2">Titolo: {{$project->title}}</h5>
                      <p class="card-text">Link: {{$project->link}}</p>
                      <p class="card-text">Tipo: {{$project->type->name}}</p>
                      <p class="card-text">Descrizione: {{$project->description}}</p>

                    <div class="d-flex mb-3">

                        <form
                            action="{{route('admin.projects.destroy', $project)}}"
                            method="post"
                            onsubmit="return confirm('Sei sicuro di voler eliminare . {{$project->name}} . ?')">
                        @csrf
                        @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-danger mx-2">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                    </form>


                        <a href="{{route('admin.projects.index')}}" class="btn btn-success mx-2">Torna ai Progetti</a>

                    </div>


            </div>
        </div>

    </div>
</section>
@endsection
