@extends('layouts.admin')


@section('content')

    <div class="container my-container">

                <h1 class="text-center ">Elenco Type</h1>


                <table class="table">

                        <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Titolo</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type )
                                <tr>

                                        <td class=" align-content-center "> {{$type->name}} </td>

                                        <th class=" align-content-center ">
                                            <ul>
                                                @foreach ($type->projects as $project)
                                                    <li> {{$project->title}} {{$project->id}}</li>
                                                @endforeach
                                            </ul>

                                        </th>


                                </tr>


                            @endforeach

                        </tbody>


                </table>

            {{-- <div class="paginator">
                {{$projects->links()}}
            </div> --}}


    </div>






    <script>
        function submitForm(id){
            const form = document.getElementById(`form-edit-${id}`);
            console.log(form);
            form.submit();
        }
    </script>

@endsection
