@extends('frontend.main_master')
@section('content')

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
                    <h4 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }}</strong> Update your profile</h4>
                    <div class="card-body">
                        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">Name <span></span></label>
		                    <input type="text"  name="name" class="form-control" value="{{ $user->name }}" >
		                </div>
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
		                    <input type="email"  name="email" class="form-control" value="{{ $user->email }}" >
		                </div>
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">Phone number <span></span></label>
		                    <input type="text"  name="phone" class="form-control" value="{{ $user->phone }}" >
		                </div>
                        <div class="form-group">
		                     <label class="info-title" for="exampleInputEmail1">Profile Image <span></span></label>
		                    <input type="file"  name="profile_photo_path" class="form-control">
		                </div>
                        <div class="form-group">
		                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
		                </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection