@extends('layouts.index')
@section('content')




    <a class="btn btn-sm btn-primary" href="{{ route('logoutadmin') }}">Deconnect</a>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Equipes</th>
                                    <th scope="col">See Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipedetails as $equipedetail)
                                <tr>
                                    <td>{{ $equipedetail->nomequipe }}</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('coureurbyequipe', ['idequipe' => $equipedetail->idequipe]) }}">see runners</a></td>
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
           