<!-- <ul>
    @foreach($products as $item)
    <li><img src="{{ asset($item->product_thumbnail) }}" width="40px" height="40px"> {{ $item->product_name_en }}</li>
    @endforeach
</ul> -->

@if($products->isEmpty())
    <h3 class="text-danger text-center">No Product Found</h3>
@else
<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">                
                @foreach($products as $item)
                <a href="{{ url('product/detail/'.$item->id.'/'.$item->product_slug_en) }}">
                <div class="list border-bottom"> <img src="{{ asset($item->product_thumbnail) }}" width="40px" height="40px"> 
                    <div class="d-flex flex-column ml-3" style="margin-left:30px"> <span> {{ $item->product_name_en }}</span> <small>$ {{ $item->selling_price }}</small> </div>
                </div>
                </a>
                @endforeach                 
            </div>
        </div>
    </div>
</div>
@endif

<style>
    body {
        background-color: #eee
    }

    .card {
        background-color: #fff;
        padding: 15px;
        border: none
    }

    .input-box {
        position: relative
    }

    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }

    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }

    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }

    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center
    }

    .border-bottom {
        border-bottom: 2px solid #eee
    }

    .list i {
        font-size: 19px;
        color: red
    }

    .list small {
        color: #dedddd
    }
</style>
