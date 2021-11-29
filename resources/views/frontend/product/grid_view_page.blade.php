@forelse($products as $product)
<div class="col-sm-6 col-md-4 wow fadeInUp">
<div class="products">
    <div class="product">
    <div class="product-image">
        <div class="image"> <a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
        <!-- /.image -->
        
        @php
        $amout = $product->selling_price - $product->discount_price;
        $discount = ($amout/$product->selling_price)*100;
        @endphp
        @if($product->discount_price == NULL)
        <div class="tag new"><span>new</span></div>
        @else
        <div class="tag hot"><span>{{ round($discount) }}% </span></div>
        @endif
    </div>
    <!-- /.product-image -->
    
    <div class="product-info text-left">
        <h3 class="name"><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en) }}"> 
        @if(session()->get('language')=='hindi')   {{ $product->product_name_hin }} @else   {{ $product->product_name_en }} @endif
        </a></h3>
        <div class="rating rateit-small"></div>
        <div class="description"></div>
        @if($product->discount_price == NULL)
        <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
        @else
        <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
        @endif
        <!-- /.product-price --> 
        
    </div>
    <!-- /.product-info -->
    <div class="cart clearfix animate-effect">
        <div class="action">
        <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="ProductView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <button  class="btn btn-primary icon" type="button" title="Add Wishlist" id="{{ $product->id }}" onclick="addToWishlist(this.id)"><i class="icon fa fa-heart"></i> </button> 
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
        </ul>
        </div>
        <!-- /.action --> 
    </div>
    <!-- /.cart --> 
    </div>
    <!-- /.product --> 
    
</div>
<!-- /.products --> 
</div>
@empty
<h5 class="text-danger text-center">No Products Found</h5>
@endforelse
<!-- /.item -->