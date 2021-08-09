@php
    $data = App\Models\User::find(Auth::user()->id);
@endphp

<div class="col-md-2">
    <br>
    <img class="card-img-top" style="border-radius:50%;" src="{{ !empty($data->profile_photo_path) ? url('uploads/user_images/'.$data->profile_photo_path) : url('uploads/no_image.jpg')  }}" width="100%" height="100%"> <br><br>
    
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="{{ route('return.orders') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        <a href="{{ route('cancel.order') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>