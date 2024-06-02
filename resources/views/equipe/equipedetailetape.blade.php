@extends('layouts.index')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
            <!-- Typography Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <form action="{{route('insertetapecoureur')}}" method="POST">
                                @csrf
                                @foreach ($etapedetails as $etapedetail)
                                <h6 class="mb-4">Etape details</h6>
                                <dl class="row mb-0">
                                <dt class="col-sm-4">name</dt>
                                <dd class="col-sm-8">{{ $etapedetail->nometape }}</dd>

                                <dt class="col-sm-4">lenght</dt>
                                <dd class="col-sm-8">{{ $etapedetail->longueur }} km</dd>

                                <input type="hidden" name="idetape" value="{{ $etapedetail->idetape }}">
                                
                                
                                <dt class="col-sm-4">Inserer {{ $etapedetail->nbcoureur }} de vos coureurs</dt>
                                        <dd class="col-sm-8">
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="coureurs[]" id="coureurs" multiple>
                                                @foreach ($coureurs as $coureur)
                                                    <option value="{{ $coureur->idcoureur}}">{{ $coureur->nomcoureur}}</option>
                                                @endforeach
                                            </select>
                                        </dd>
                            </dl>
                            @endforeach
                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                            </form>
                            <button type="button" class="btn btn-link m-2"><a href="{{ route('indexclient') }}">return</a></button>
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