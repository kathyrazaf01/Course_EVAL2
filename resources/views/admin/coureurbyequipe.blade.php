@extends('layouts.index')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
            <!-- Typography Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Runners</h6>
                                @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @foreach ($coureurdetails as $coureurdetail)
                                <form action="{{route('insertempscoureur')}}" method="POST">
                                    @csrf
                                    <dl class="row mb-0">
                                    <div class="p-4"></div>
                                    <dt class="col-sm-4">name</dt>
                                    <dd class="col-sm-8">{{ $coureurdetail->nomcoureur }}</dd>

                                    <dt class="col-sm-4">number</dt>
                                    <dd class="col-sm-8">{{ $coureurdetail->numero }}</dd>

                                    <dt class="col-sm-4">from equip</dt>
                                    <dd class="col-sm-8">{{ $coureurdetail->nomequipe }}</dd>
                                    
                                    <dt class="col-sm-4">Beggin run</dt>
                                    <dd class="col-sm-8">
                                        <div class="mb-3">
                                            <input type="time" name="heuredepart" value="00:00:00" class="form-control" id="exampleInputEmail1" 
                                                aria-describedby="emailHelp" step="1">
                                        </div>
                                    </dd>
                                

                                    <dt class="col-sm-4">End run</dt>
                                    <dd class="col-sm-8">
                                        <div class="mb-3">
                                            <input type="time" value="00:00:00" name="heurearrive" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" step="1">
                                        </div>
                                    </dd>
                                    
                                    
                                    {{-- <dt class="col-sm-4">lenght</dt>
                                    <dd class="col-sm-8">{{ $coureurdetail->longueur }} km</dd> --}}

                                    <input type="hidden" name="idcoureur" value="{{ $coureurdetail->idcoureur }}">
                                    <dt class="col-sm-4"></dt>
                                    <dd class="col-sm-8">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                                        </div>
                                    </dd>    
                                </dl>
                                
                            </form>
                            @endforeach
                           
                            <button type="button" class="btn btn-link m-2"><a href="{{ route('indexadmin') }}">return</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Typography End -->

            <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>

            <script>
                new MultiSelectTag('coureurs')  // id
            </script>

@endsection