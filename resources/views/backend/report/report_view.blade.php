@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			<!--search content------>

			<div class="col-md-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Search By Date</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('search.date') }}" method="post">
                    @csrf  
                                <div class="form-group">
								<h5>Select Date <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="date" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('date')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
						</div>
					</form>


	   </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 <!-- /.box -->          
</div>
<!-- /.col -->

			<!--search content------>

			<div class="col-md-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Search By Month</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('search.month.year') }}" method="post" >
                    @csrf  
                            <div class="form-group">
								<h5>Select Month <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <select name="month" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
							    	@error('month')
										<span class="text-danger">{{ $message }}</span>
									@enderror
							</div>

                            <div class="form-group">
								<h5>Select Year<span class="text-danger">*</span></h5>
								<div class="controls">
                                    <select name="monthyear" class="form-control">
                                        <option label="Choose One"></option>
                                        @php
                                            $year = Carbon\Carbon::now()->format('Y');
                                            $endyear = Carbon\Carbon::now()->format('Y')+5;
                                        @endphp
                                        @for($i=$year;$i<=$endyear;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
							    	@error('monthyear')
										<span class="text-danger">{{ $message }}</span>
									@enderror
							</div>
								

                         
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
						</div>
					</form>


	   </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 <!-- /.box -->          
</div>
<!-- /.col -->

			<!--search content------>

			<div class="col-md-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Search By Year</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('search.year') }}" method="post" >
                    @csrf  
                            <div class="form-group">
								<h5>Select Year <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <select name="year" class="form-control">
                                        <option label="Choose One"></option>
                                        @php
                                            $year = Carbon\Carbon::now()->format('Y');
                                            $endyear = Carbon\Carbon::now()->format('Y')+5;
                                        @endphp
                                        @for($i=$year;$i<=$endyear;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
							    	@error('year')
										<span class="text-danger">{{ $message }}</span>
									@enderror
							</div>
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
						</div>
					</form>


	   </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 <!-- /.box -->          
</div>
<!-- /.col -->

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>  


@endsection