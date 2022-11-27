
@extends('layouts.deshboard')

@section('contain')

<div class="container-flud">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"> Edit profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_profile') }}" method="POST">
                        @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"></br>
                    <label for="name">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"></br>
                    <label for="name">Old Password</label>
                    <input type="password" name="old_password" value=""> @if(session('old_pass'))
                    <strong class="text-danger">{{ session('old_pass') }}</strong>

                    @endif</br>

                    <label for="name">Current password</label>
                    <input type="password" name="current_password" value=""></br>

                    <input class="btn btn-primary" type="submit" >
                </form>
                </div>
            </div>
        </div>




        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"> Edit profile picture</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_picture') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <label for="name">Name</label>
                    <input type="file" name="picture"></br>





                    <input class="btn btn-primary" type="submit" >
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection()
