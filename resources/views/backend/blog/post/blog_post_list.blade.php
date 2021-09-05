@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Blog Post List <span class="badge badge-pill badge-danger">{{ count($blogpost) }}</span></h3>
				  <a href="{{ route('blog.post.add') }}" class="btn btn-success" style="float:right">Add Post</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th scope="col" width="15%">Blog Category</th>
								<th scope="col" width="15%">Blog Image</th>
								<th scope="col" width="15%">Blog Title En</th>
                                <th scope="col" width="15%">Blog Title Hin</th>
								<th scope="col" width="15%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($blogpost as $item)
							<tr>
								<td>{{ $item->category->blog_category_name_en }}</td>
								<td><img src="{{ asset($item->blog_image) }}" alt="image" style="width:80px; height:70px;"></td>
                                <td>{{ $item->blog_title_en }}</td>
                                <td>{{ $item->blog_title_hin }}</td>
								<td>
                                    <a href="{{ route('blog.edit',$item->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('blog.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
                                </td>
								
							</tr>
						@endforeach	
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  <!-- /.box -->          
			</div>
			<!-- /.col -->

			<!--add  blog category------>

			
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>  


@endsection