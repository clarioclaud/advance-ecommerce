//delete msg
$(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = link
       Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
     }
    });

    });    
  });

  //confirm order script
  $(function(){
    $(document).on('click','#confirm',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure to confirm?',
      text: "Once confirm, You can't able to make order Pending!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, confirm it!'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = link
       Swal.fire(
          'Confirmed!',
          'Order Confirmed Successfully.',
          'success'
      )
     }
    });

    });    
  });

  //processing
  $(function(){
    $(document).on('click','#process',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure to Processing?',
      text: "Once Processing, You can't able to make order Pending!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Processing it!'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = link
       Swal.fire(
          'Processing!',
          'Order Processing Successfully.',
          'success'
      )
     }
    });

    });    
  });

  //picked
  $(function(){
    $(document).on('click','#picked',function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure to Picked?',
      text: "Once Picked, You can't able to make order Pending!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Picked it!'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = link
       Swal.fire(
          'Picked!',
          'Order Picked Successfully.',
          'success'
      )
     }
    });

    });    
  });

//shipped
$(function(){
  $(document).on('click','#shipped',function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    Swal.fire({
    title: 'Are you sure to Shipped?',
    text: "Once Shipped, You can't able to make order Pending!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Shipped it!'
  }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link
     Swal.fire(
        'Shipped!',
        'Order Shipped Successfully.',
        'success'
    )
   }
  });

  });    
});

//delivered
$(function(){
  $(document).on('click','#delivered',function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    Swal.fire({
    title: 'Are you sure to Delivered?',
    text: "Once Delivered, You can't able to make order Pending!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delivered it!'
  }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link
     Swal.fire(
        'Delivered!',
        'Order Delivered Successfully.',
        'success'
    )
   }
  });

  });    
});

//cancel
$(function(){
  $(document).on('click','#cancel',function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    Swal.fire({
    title: 'Are you sure to Cancel?',
    text: "Once Cancel, You can't able to make order Pending!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Cancel it!'
  }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link
     Swal.fire(
        'Cancel!',
        'Order Cancel Successfully.',
        'success'
    )
   }
  });

  });    
});