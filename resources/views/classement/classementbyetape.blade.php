@extends('layouts.index')
@section('content')


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    {{-- @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        {{-- @php
                        $idequipe = session('idequipe');
                        $equipe = DB::table('equipe')->where('idequipe', $idequipe)->first();
                        @endphp
                        <h6 class="mb-0">Welcome {{ $equipe->nomequipe }}</h6> --}}
                        
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
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('classementdetailetape', ['idetape' => $etape->idetape]) }}">Detail</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if (session('idequipe'))
                    <button type="button" class="btn btn-link m-2"><a href="{{ route('indexclient') }}">return</a></button>
                @elseif (session('idadmin'))
                    <button type="button" class="btn btn-link m-2"><a href="{{ route('indexadmin') }}">return</a></button>
                @endif
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
        
            <!-- Widgets End -->

@endsection
           