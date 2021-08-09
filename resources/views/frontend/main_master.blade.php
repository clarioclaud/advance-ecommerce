<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}";
  switch(type){
    case 'info':
    toastr.info("{{ Session::get('message') }}");
    break;

    case 'success':
    toastr.success("{{ Session::get('message') }}");
    break;

    case 'warning':
    toastr.warning("{{ Session::get('message') }}");
    break;

    case 'error':
    toastr.error("{{ Session::get('message') }}");
    break;

  }
  @endif  
</script>

<!--Product Add to Cart Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="" id="pimage" class="card-img-top" alt="..." style="height:200px; width:200px">
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">Product Price:<strong >$<span class="text-danger" id="pprice"></span></strong>
              <del id="oldprice">$ </del></li>
              <li class="list-group-item">Product Code:<strong id="pcode"></strong></li>
              <li class="list-group-item">Category:<strong id="pcategory"></strong></li>
              <li class="list-group-item">Brand:<strong id="pbrand"></strong></li>
              <li class="list-group-item">Stock:<strong ><span class="badge badge-pill badge-success" style="background-color:green;color:white" id="available"></span><span class="badge badge-pill badge-danger" style="background-color:red;color:white" id="stockout"></span></strong></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="color">Product Color</label>
              <select class="form-control" id="color" name="color">
                
              </select>
            </div>
            <div class="form-group" id="sizeproduct">
              <label for="size">Product Size</label>
              <select class="form-control" id="size" name="size">
                
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Quantity</label>
              <input type="number" class="form-control" min="1" value="1" id="pqty">
            </div>
            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary" onclick="addToCart()">Add To Cart</button>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Product view ajax setup modal -->
<script type="text/javascript" >
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

  //  Product view modal
  function ProductView(id){
    //alert(id);
    $.ajax({
      type: "GET",
      url: '/product/view/modal/'+id,
      dataType: 'json',
      success:function(data){
        $('#pname').text(data.product.product_name_en);
        $('#pprice').text(data.product.selling_price);
        $('#pcode').text(data.product.product_code);  
        $('#pcategory').text(data.product.category.category_name_en);
        $('#pbrand').text(data.product.brand.brand_name_en);
        $('#pimage').attr('src','/'+data.product.product_thumbnail);
        $('#product_id').val(id);
        $('#pqty').val(1);

        //product color
        $('select[name="color"]').empty();
        $.each(data.color,function(key,value){
          $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
        });

        //product size
        $('select[name="size"]').empty();
        $.each(data.size,function(key,value){
          $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
          if (data.size == "") {
            $('#sizeproduct').hide();
          } else {
            $('#sizeproduct').show();
          }
        });

        //product price
        if (data.product.discount_price == null) {
          $('#pprice').text('');
          $('#oldprice').text('');
          $('#pprice').text(data.product.selling_price);
        } else {
          $('#pprice').text(data.product.discount_price);
          $('#oldprice').text(data.product.selling_price);
        }

        //stock
        if (data.product.product_qty > 0) {
          $('#available').text('');
          $('#stockout').text('');
          $('#available').text('available');
        } else {
          $('#available').text('');
          $('#stockout').text('');
          $('#stockout').text('stockout');
        }
       
      }
    })

  }

  ///product Addto cart function
  function addToCart(){
    var product_id = $('#product_id').val();
    var product_name = $('#pname').text();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var qty = $('#pqty').val();
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {product_id:product_id, product_name:product_name, color:color, size:size,
      qty:qty},
      url:"/product/cart/store/"+product_id,
      success:function(data){
          //console.log(data)
          miniCart()
          $('#closemodal').click();
          const Toast = Swal.mixin({
            toastr: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type:'success',
              title: data.success,
            })
            
          } else {
            Toast.fire({
              type:'error',
              title: data.error,
            })
          }
      }
    })
  }



</script>

 <!-- product mini cart script -->
 <script type="text/javascript">
    function miniCart(){
      $.ajax({
        type: 'GET',
        url: '/product/mini/cart',
        dataType: 'json',
        success:function(response){
          //console.log(response)
          var minicart = "";
          $('span[id="cartqty"]').text(response.cartqty);
          $('#cartprice').text(response.carttotal);
          $('#carttotal').text(response.carttotal);
          $.each(response.cartcontent,function(key,value){
              minicart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">$${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                `
                  
          });
          $('#minicart').html(minicart);
        }
      })
    }
 
    miniCart();


    //mini cart remove script
    function minicartRemove(rowId){
      $.ajax({
        type: 'GET',
        url: '/product/minicart/remove/'+rowId,
        dataType: 'json',
        success:function(data){
             //console.log(data)
          miniCart()
          const Toast = Swal.mixin({
            toastr: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type:'success',
              title: data.success,
            })
            
          } else {
            Toast.fire({
              type:'error',
              title: data.error,
            })
          }
        }
      })
    }

 </script>

 <!-- Product add to wishlist script -->
 <script type="text/javascript">
    function addToWishlist(product_id){
      $.ajax({
        type: "POST",
        url: "/product/add-to-wishlist/"+product_id,
        dataType: "json",
        success:function(data){
          const Toast = Swal.mixin({
            toastr: true,
            position: 'top-end',           
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type:'success',
              icon: 'success',
              title: data.success,
            })
            
          } else {
            Toast.fire({
              type:'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }
 
 
 </script>

 <!-- product wishlist page script -->
 <script type="text/javascript">
      function wishList(){
        $.ajax({
          type: "GET",
          url: "/user/get/wishlist",
          dataType: "json",
          success:function(response){
            var rows = "";
            
            $.each(response,function(key,value){
              rows += `<tr>
              <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
              <td class="col-md-7">
                <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                
                 <div class="price">
                   ${value.product.discount_price == null ? `$${value.product.selling_price}`:`$${value.product.discount_price} <span>$${value.product.selling_price}</span>`}
                
                 </div>
              </td>
              <td class="col-md-2">
                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="${value.product_id}" onclick="ProductView(this.id)"> Add To Cart </button>        
              </td>
              <td class="col-md-1 close-btn">
                <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
              </td>
            </tr>`
            });
            $('#wishlists').html(rows);
          }
        })
      }
      
      wishList();

//remove wishlist script
    function wishlistRemove(id){
      $.ajax({
        type: "GET",
        url: "/user/wishlist-remove/"+id,
        dataType: "json",
        success:function(data){
          wishList()
          const Toast = Swal.mixin({
            toastr: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type:'success',
              icon: 'success',
              title: data.success,
            })
            
          } else {
            Toast.fire({
              type:'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }
 </script>

 <!-- Cart page script -->
 <script type="text/javascript">
      function cart(){
        $.ajax({
          type: "GET",
          url: "/user/get/mycart",
          dataType: "json",
          success:function(response){
            var rows = "";
            
            $.each(response.cartcontent,function(key,value){
              rows += `<tr>"
              <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="width:60px;height="60px"></td>
              <td class="col-md-2">
                <div class="product-name"><a href="#">${value.name}</a></div>
              </td>
              <td class="col-md-2'>
                 <div class="price">
                  $${value.price}
                 </div>
              </td>
              <td class="col-md-1"> 
                  <strong>${value.options.color}</strong>
              </td>
              <td class="col-md-1">
                  ${value.options.size == null ?`<span>...</span>`:`<strong>${value.options.size}<strong>`}
              </td>
              <td class="col-md-2">
                ${value.qty > 1 ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button>`
                : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`}
                <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px" >
                <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
              </td>
              <td class="col-md-1">
                  <strong>$${value.subtotal}</strong>
              </td>
             
              <td class="col-md-1 close-btn">
                <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
              </td>
            </tr>`
            });
            $('#mycart').html(rows);
          }
        })
      }
      
      cart();

//remove cart product script
    function cartRemove(id){
      $.ajax({
        type: "GET",
        url: "/user/cart-remove/"+id,
        dataType: "json",
        success:function(data){
          couponCalculate();
          cart();
          miniCart();
          $('#couponField').show();
              $('#coupon_name').val('');
          const Toast = Swal.mixin({
            toastr: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type:'success',
              icon: 'success',
              title: data.success,
            })
            
          } else {
            Toast.fire({
              type:'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }

    //Cart increment script
    function cartIncrement(rowId){
      $.ajax({
        type: 'GET',
        url: '/cart-increment/'+rowId,
        dataType: 'json',
        success:function(data){
          couponCalculate()
          cart();
          miniCart();
        }
      })
    }

     //Cart decrement script
     function cartDecrement(rowId){
      $.ajax({
        type: 'GET',
        url: '/cart-decrement/'+rowId,
        dataType: 'json',
        success:function(data){
          couponCalculate()
          cart();
          miniCart();
        }
      })
    }
 </script>

 <!-- Apply coupon script -->
 <script type="text/javascript">
      function applyCoupon(){
        var coupon_name = $('#coupon_name').val();
        $.ajax({
          type: 'POST',
          dataType: "json",
          data: {coupon_name:coupon_name},
          url: "{{ url('/apply-coupon') }}",
          success: function(data){
            couponCalculate();
            if (data.validity == true) {
              $('#couponField').hide();
            }
              const Toast = Swal.mixin({
              toastr: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
              Toast.fire({
                type:'success',
                icon: 'success',
                title: data.success,
              })
              
            } else {
              Toast.fire({
                type:'error',
                icon: 'error',
                title: data.error,
              })
            }
          }
        })
      }

  // coupon calculate total
      function couponCalculate(){
        $.ajax({
          'type': 'GET',
          'url': "{{ url('/coupon-calulate') }}",
          'dataType': 'json',
          success:function(data){
            if(data.total){
              $('#cart_total').html(
              `<tr>
                  <th>
                    <div class="cart-sub-total">
                      Subtotal<span class="inner-left-md">$${data.total}</span>
                    </div>
                    <div class="cart-grand-total">
                      Grand Total<span class="inner-left-md">$${data.total}</span>
                    </div>
                  </th>
                </tr>`
            )
            }else{
              $('#cart_total').html(
              `<tr>
                  <th>
                    <div class="cart-sub-total">
                      Subtotal<span class="inner-left-md">$${data.coupon_subtotal}</span>
                    </div>
                    <div class="cart-sub-total">
                      Coupon Name:<span class="inner-left-md">${data.coupon_name}
                      <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button></span>
                    </div>
                    <div class="cart-sub-total">
                      Discount amount<span class="inner-left-md">$${data.discount_amount}</span>
                    </div>
                    <div class="cart-grand-total">
                      Grand Total<span class="inner-left-md">$${data.grand_total}</span>
                    </div>
                  </th>
                </tr>`
            )
            }
            
          }
        })
      }
 couponCalculate();

 </script>

  <!-- coupon remove -->
  <script type="text/javascript">
      function couponRemove(){
          $.ajax({
            type: 'GET',
            url: "{{ url('/coupon-remove') }}",
            dataType: 'json',
            success:function(data){
              couponCalculate();
              $('#couponField').show();
              $('#coupon_name').val('');
                const Toast = Swal.mixin({
                toastr: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              })
              if ($.isEmptyObject(data.error)) {
                Toast.fire({
                  type:'success',
                  icon: 'success',
                  title: data.success,
                })
                
              } else {
                Toast.fire({
                  type:'error',
                  icon: 'error',
                  title: data.error,
                })
              }
            }
            
          })
      }
  </script>


</body>
</html>