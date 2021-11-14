@extends('frontend.main_master')
@section('main')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ !empty($adminData->profile_photo_path)?url('uplaod/admin_images/'.$adminData->profile_photo_path):'https://cdn.pixabay.com/photo/2020/04/19/11/52/drink-5063295__480.jpg' }}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="" class="btn btn-primary btn-sm btn-block"> Home</a>
                    <a href="" class="btn btn-primary btn-sm btn-block"> Profile update</a>
                    <a href="" class="btn btn-primary btn-sm btn-block"> Change Password</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block"> Logout</a>

                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            SALUT ....
                        </span>
                        <strong>
                            {{ Auth::user()->name }}
                        </strong>
                        Bienvenue sur adjemin 
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
