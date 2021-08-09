@php
    $product_tag_hin = App\Models\Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
    $product_tag_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list"> 
            @if(session()->get('language') == 'hindi')
                @foreach($product_tag_hin as $product)
                <a class="item active" title="Vest" href="{{ url('/product/tags/'.$product->product_tags_hin) }}">{{ str_replace(',',' ', $product->product_tags_hin)  }}</a>
                @endforeach
            @else
                @foreach($product_tag_en as $product)
                <a class="item active" title="Vest" href="{{ url('/product/tags/'.$product->product_tags_en) }}">{{ str_replace(',',' ', $product->product_tags_en) }}</a>
                @endforeach 
            @endif
            </div>
        <!-- /.tag-list --> 
        </div>
        <!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget --> 