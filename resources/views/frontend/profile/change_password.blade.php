@extends('frontend.main_master')
@section('content')
<!--@php
    $data = DB::table('users')->where('id',Auth::id())->first();

@endphp-->

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- user sidebar-->
            @include('frontend.common.user_sidebar')
            <!--user sidebar end -->

            <div class="col-md-2">


            </div>

            <div class="col-md-6">
                <div class="card">
                    <h4 class="text-center"><span class="text-danger">Change Password</span><strong></strong> </h4>
                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">Current Password <span></span></label>
		                    <input type="password"  id="current_password" name="old_password" class="form-control" >
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">New Password <span></span></label>
		                    <input type="password" id="password"  name="password" class="form-control" >
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">Confirm Password <span></span></label>
		                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
		                    <button type="submit" class="btn btn-danger" name="submit">Change</button>
		                </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection