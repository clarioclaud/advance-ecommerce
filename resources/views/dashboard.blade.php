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
                    <h4 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }}</strong> Welcome to Flip shop</h4>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection