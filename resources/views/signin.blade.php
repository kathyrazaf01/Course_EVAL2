
@extends('loginform.login')
@section('loginform')

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>ULTIMATE TEAM RACE</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('logindata') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="login" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">login</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
              
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
@endsection