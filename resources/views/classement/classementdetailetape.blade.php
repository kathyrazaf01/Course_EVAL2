@extends('layouts.index')
@section('content')


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">classement de l'{{ $etape->nometape }}</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Rang</th>
                                        <th scope="col">Coureur</th>
                                        <th scope="col">Numero</th>
                                        <th scope="col">Durée</th>
                                        <th scope="col">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classementdetails as $classementdetail)
                                    <tr>
                                        <th scope="row">{{ $classementdetail->rang }}</th>
                                        <td>{{ $classementdetail->nomcoureur }}</td>
                                        <td>{{ $classementdetail->numero }}</td>
                                        <td>{{ $classementdetail->duree }}</td>
                                        <td>{{ $classementdetail->point }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                                <button type="button" class="btn btn-link m-2"><a href="{{ route('classementbyetape') }}">return</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

@endsection