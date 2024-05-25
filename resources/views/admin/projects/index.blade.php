@extends('layouts.admin')


@section('content')

    <div class="container my-container">
        <div class="">
            <div class=" ">
                <h1 class="text-center ">I miei proggetti</h1>
            </div>



            @if (session('successo'))
            <div class="alert alert-success h-25" role="alert">
                <p>{{ session('successo') }}</p>
            </div>
        @endif

        @if (session('errore'))
            <div class="alert alert-danger" role="alert">
            <p>{{ session('errore') }}</p>
            </div>
        @endif

            <div class="list-group list-group-flush ">
                <a class="d-flex justify-content-end  " href="{{route('admin.projects.create')}}">

                    <button class="btn btn-primary m-3"><i class="fa-solid fa-plus "></i></button>
                    {{-- Aggiungi Progetto --}}
                </a>
            </div>



            {{-- messaggio di aggiunta del progetto --}}
            @if(session('success'))
            <div class="alert alert-success my-3" role="alert">
               {{session('success')}}
            </div>
            @endif


            <table class="table">

                    <thead>
                    <tr>

                        <th scope="col">Titolo (*)</th>
                        <th scope="col">Tipo (*)</th>
                        <th scope="col">Link (*)</th>
                        <th scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project )
                            <tr>

                                <form
                                    action="{{route('admin.projects.update', $project)}}"
                                    method="POST"
                                    id="form-edit {{$project->id}}"
                                    >
                                    @csrf
                                    @method('PUT')

                                    <th class=" align-content-center ">
                                        <input
                                            type="text"
                                            class="form-control"

                                            name="title"
                                            value="{{$project->title}}">

                                    </th>

                                    <td class=" align-content-center ">
                                        <input
                                            type="text"
                                            class="form-control"

                                            name="type"
                                            value="{{$project->type}}">

                                    </td>


                                    <td class=" align-content-center ">
                                        <input
                                            type="text"
                                            class="form-control w-100"

                                            name="link"
                                            value="{{$project->link}}">
                                            @error('link')
                                                <p class="text-danger text-small">{{$message}}</p>
                                            @enderror
                                    </td>


                                    <td class="d-flex justify-content-center align-items-center my-4 ">


                                             <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary me-2">
                                                <i
                                            class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning my-2"><i
                                            class="fa-solid fa-pen"></i></a>

                                            {{-- <button
                                                type="submit"
                                                class="btn btn-warning"
                                                onclick="submitForm({{$project->id}})">
                                                    <i class="fa-solid fa-pen"></i>
                                            </button> --}}

                                </form>
                                            <form
                                                action="{{route('admin.projects.destroy', $project)}}"
                                                method="post"
                                                onsubmit="return confirm('Sei sicuro di voler eliminare . {{$project->name}} . ?')">
                                                @csrf
                                                @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger mx-2"
                                                        >
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                            </form>

                                    </td>


                            </tr>


                        @endforeach

                    </tbody>


            </table>

            <div class="paginator">
                {{$projects->links()}}
            </div>
        </div>

    </div>






    <script>
        function submitForm(id){
            const form = document.getElementById(`form-edit-${id}`);
            console.log(form);
            form.submit();
        }
    </script>

@endsection
