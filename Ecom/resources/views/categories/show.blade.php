@extends('layouts.app')

@section('content')

<div class="container">
	 @include('flash::message')
	<div class="form-group">
		<div class="row col-lg-4 col-md-4 col-sm-4">
    	
			<br>		
			<img src="{{asset('images/categories/'. $category->image)}}" class="img-responsive" style="width: 80%;height: auto; border: 2px solid #FF7F50" alt="Category Photo">

			<a class="btn btn-info btn-sm" href="{!! route('categories.index') !!}"><span><<</span> All Categories</a> 

		
	</div>

	</div>
	<div class=" well row col-lg-8 col-md-8 col-sm-8">
		<h2><span class="label label-info"></span>{{$category->name}}</h2>
		<p><strong><h4>SubCategories: </h4></strong></p>
		<ul style="list-style: none">
		@foreach($category->subCategories as $subcategory)
			<li class="btn btn-default" style="float: left;"><a href="{!! route('subcategories.show', [$subcategory->id]) !!}"> #{{$subcategory->name}}</a> </li>
		@endforeach
		</ul>

		@can('isAdmin')
		<p>
		<div class="clearfix"></div>
		<a class="btn btn-info btn-sm" href="{!! route('categories.edit', [$category->id]) !!}"><i class="fa fa-edit"></i> Edit</a> 

								<div class="btn btn-danger btn-sm">
								<a
					              href="#"
					                  onclick="
					                  var result = confirm('Are you sure you wish to delete this Category?');
					                      if( result ){
					                              event.preventDefault();
					                              document.getElementById('delete-form').submit();
					                      }
					                          "
					                          style="color: white">
					                  <i class="glyphicon glyphicon-trash"></i> Delete
					              </a>

					              <form id="delete-form" action="{{ route('categories.destroy',[$category->id]) }}"
					                method="POST" style="display: none;">
					                <input type="hidden" name="_method" value="delete">
					                        {{ csrf_field() }}
					              </form>
							</div>
							</p>
						@endcan
	   </div>

<div class="clearfix"></div>
<section class="content-header col-sm-11">
        <h1 class="pull-left">{{$category->name}} <i>(Products)</i></h1>
        <h1 class="pull-right">
        	@can('isAdmin')
           <a class="btn btn-primary btn-sm pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Add New</a>
           @endcan
           @can('isSeller')
           <a class="btn btn-primary btn-sm pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Add New</a>
           @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary col-sm-11 col-md-11">
        	
        @foreach($category->products as $product)

		<div class=" col-sm-3 col-md-3">
				<div class="thumbnail"  style="border: 1px solid #FF7F50">
					<h4 class="text-center" style="color: darkgreen">{{$product->name}}</h4>

					<a href="{!! route('products.show', [$product->id]) !!}"> 
					<img src="{{asset('images/products/'. $product->image)}}" class="img-responsive" style="height: 200px; width: 100%;"></a>
					
					<div class="caption">
						<div class="row">
							<div class="text-center">
								<a class="btn btn-info btn-sm" href="{!! route('products.show', [$product->id]) !!}"><i class="glyphicon glyphicon-eye-open"></i> View</a> 
								
								@can('isAdmin')
								
								<div class="btn btn-danger btn-sm">
								<a
					              href="#"
					                  onclick="
					                  var result = confirm('Are you sure you wish to delete this Product?');
					                      if(result){
					                              event.preventDefault();
					                              document.getElementById('delete-form').submit();
					                      }
					                          "
					                          style="color: white">
					                  <i class="glyphicon glyphicon-trash"></i> Delete
					              </a>

					              <form id="delete-form" action="{{ route('products.destroy',[$product->id]) }}"
					                method="POST" style="display: none;">
					                <input type="hidden" name="_method" value="delete">
					                        {{ csrf_field() }}
					              </form>
							</div>
						@endcan
							</div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>

        @endforeach
 
        </div>
        <div class="text-center">
        
        </div>
    </div>

</div>
@endsection

			