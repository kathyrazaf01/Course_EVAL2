@extends('layouts.index')
@section('content')


@if(!Session::has('idadmin'))
        <script>
            window.location.href = "{{ route('signin') }}";
        </script>
    @endif

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                   
                    @if(session('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('succes') }}
                    </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab"
                                aria-controls="nav-profile" aria-selected="false"><a href="{{ route('classementbyetape') }}">classement par etape</a></button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false"><a href="{{ route('classementbyequipe') }}">classement par equipe</a></button> 
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false"><a href="{{ route('importcsvetaperesult') }}">Importation donnée</a></button> 
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false">
                            <a class="btn btn-success m-2" href="{{ route('categorygenerate') }}">Category generator</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('logoutadmin') }}">Deconnect</a>
                        </div>
                    </nav>
                    <div class="p-4"></div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        @php
                        $idadmin = session('idadmin');
                        $admin = DB::table('admin')->where('idadmin', $idadmin)->first();
                        @endphp
                        <h2 class="mb-0">Welcome {{ $admin->nomadmin }}</h2>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Etapes</th>
                                    <th scope="col">See Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etapes as $etape)
                                <tr>
                                    <td>{{ $etape->nometape }}</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('coureurbyequipe', ['idetape' => $etape->idetape]) }}">See runners</a></td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
        
            <!-- Widgets End -->

@endsection
           