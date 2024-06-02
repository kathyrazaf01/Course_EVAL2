@extends('layouts.index')
@section('content')


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">classement général par équipe</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Equipe</th>
                                        <th scope="col">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classementequipes as $classementequipe)
                                    <tr>
                                        <td scope="row">{{ $classementequipe->nomequipe }}</td>
                                        <td>{{ $classementequipe->total}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (session('idequipe'))
                            <button type="button" class="btn btn-link m-2"><a href="{{ route('indexclient') }}">return</a></button>
                        @elseif (session('idadmin'))
                            <button type="button" class="btn btn-link m-2"><a href="{{ route('indexadmin') }}">return</a></button>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            @endsection