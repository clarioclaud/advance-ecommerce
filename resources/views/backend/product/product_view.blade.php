@extends('admin.admin_master')
@section('admin')


<div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
	<section class="content">
        <div class="box box-solid bg-info">
            <div class="box-header">
                <h4 class="box-title"><strong>{{ $product->product_name_en }}</strong> <span>{{ $product->product_name_hin }}</span></h4>
            </div>

            <div class="box-body">
                <div class="card">  
                    <div class="row">
                        <div class="col-md-4">             
                            <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="width:300px; height:300px">   
                        </div>
                        <div class="col-md-3"> 
                            <div class="card-text">
                                <h5><strong>Price :</strong> 
                            </div>

                            <div class="card-text">
                                <h5><strong>Discount :</strong> 
                            </div>

                            <div class="card-text">
                                <h5><strong>Brand Name :</strong> 
                            </div>
                            
                            <div class="card-text">
                                <h5><strong>Category Name :</strong></h5>
                            </div>
                           
                            <div class="card-text">
                                <h5><strong>Subcategory Name :</strong> </h5>
                            </div>
                           
                            <div class="card-text">
                                <h5><strong>SubsubCategory Name :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Product Code :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Product Quantity :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Product Sizes :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Product Color :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Hot Deals :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Featured :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Special Deals :</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>Special Offer :</strong> </h5>
                            </div>
    
                        </div>
                        <div class="col-md-5"> 
                            <div class="card-text">
                                <h4><strong>{{ $product->selling_price }}$</strong></h4> 
                            </div>

                            <div class="card-text">
                                <h5>
                                    @if($product->discount_price ==NULL)
                                        <h5><span class="text-danger">No Discount Price</span></h5>
                                    @else
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
											$discount_amount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                        <h5><span class="badge badge-pill badge-danger">{{ round($discount_amount) }}%</span></h5>
                                    @endif
                                
                                </h5> 
                            </div>

                            <div class="card-text">
                                <h5>{{ $product['brand']['brand_name_en'] }} {{ $product['Brand']['brand_name_hin'] }}</h5> 
                            </div>
                            
                            <div class="card-text">
                                <h5> {{ $product['category']['category_name_en'] }} {{ $product['Category']['category_name_hin'] }}</h5>
                            </div>
                            
                            <div class="card-text">
                                <h5> {{ $product['subcategory']['subcategory_name_en'] }} {{ $product['Subcategory']['subcategory_name_hin'] }}</h5>
                            </div>
                            
                            <div class="card-text">
                                <h5> {{ $product['subsubcategory']['subsubcategory_name_en'] }} {{ $product['Subsubcategory']['subsubcategory_name_hin'] }}</h5>
                            </div>

                            <div class="card-text">
                                <h5><strong>{{ $product->product_code }}</strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5><strong><span class="badge badge-success badge-sm">{{ $product->product_qty }}</span></strong> </h5>
                            </div>

                            <div class="card-text">
                                <h5> {{ $product->product_size_en }}</h5>
                            </div>

                            <div class="card-text">
                                <h5> {{ $product->product_color_en }}</h5>
                            </div>

                            <div class="card-text">
                                @if($product->hot_deals == 1)
                                <h5> <span class="text-success"><i class="fa fa-check"></i></span></h5>
                                @else
                                <h5> <span class="text-danger"><i class="fa fa-times-circle"></i></span></h5>
                                @endif
                            </div>

                            <div class="card-text">
                                @if($product->featured == 1)
                                <h5> <span class="text-success"><i class="fa fa-check"></i></span></h5>
                                @else
                                <h5> <span class="text-danger"><i class="fa fa-times-circle"></i></span></h5>
                                @endif
                            </div>

                            <div class="card-text">
                                @if($product->special_deals == 1)
                                <h5> <span class="text-success"><i class="fa fa-check"></i></span></h5>
                                @else
                                <h5> <span class="text-danger"><i class="fa fa-times-circle"></i></span></h5>
                                @endif
                            </div>

                            <div class="card-text">
                                @if($product->special_offer == 1)
                                <h5> <span class="text-success"><i class="fa fa-check"></i></span></h5>
                                @else
                                <h5> <span class="text-danger"><i class="fa fa-times-circle"></i></span></h5>
                                @endif
                            </div>
                            
                           
                        </div>
                    </div>
                    <hr>
                        <div class="card-body">
                                <h4><strong>Product Multiple Images</strong></h5>
                                <div class="row">
                                @foreach($multimg as $img)
                                    <div col-md-4>
                                        <div class="card">
                                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="width:150px;height=150px;">
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            
                        </div>        
                </div>
            </div>
        </div>
    </section>

</div>

@endsection