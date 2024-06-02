@extends('layouts.index')
@section('content')


@if(!Session::has('idequipe'))
        <script>
            window.location.href = "{{ route('signin') }}";
        </script>
    @endif


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('error') }}
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
                        <a class="btn btn-sm btn-primary" href="{{ route('logoutequipe') }}">Deconnect</a>

                        </div>
                    </nav>
                    <div class="p-4"></div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        @php
                        $idequipe = session('idequipe');
                        $equipe = DB::table('equipe')->where('idequipe', $idequipe)->first();
                        @endphp
                        <h2 class="mb-0">Welcome {{ $equipe->nomequipe }}</h2>
                        
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
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('equipedetailetape', ['idetape' => $etape->idetape]) }}">Detail</a></td>
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
           