@extends('layouts.app')

@section('content')
<div class="container">
	 @include('flash::message')
	<div class="form-group">
		<div class="row col-lg-6 col-md-6 col-sm-6">
    	
			<br>		
			<img src="{{asset('images/categories/'. $category->image)}}" class="img-responsive" style="width: 80%;height: 300px; border: 2px solid #FF7F50" alt="Category Photo">

			<a class="btn btn-info btn-info" href="{!! route('categories.index') !!}"><span><<</span> All Categories</a> 

		
	</div>

	</div>
	<div class=" well row col-lg-6 col-md-6 col-sm-6">
		<h2><span class="label label-info"></span>{{$category->name}}</h2>
		<p><strong><h4>SubCategories: </h4></strong></p>
		<ol>
		@foreach($category->subCategories as $subcategory)
			<li><a href="{!! route('subcategories.show', [$subcategory->id]) !!}">{{$subcategory->name}}</a></li>
		@endforeach
		</ol>

		<a class="btn btn-info btn-info" href="{!! route('categories.edit', [$category->id]) !!}"><i class="fa fa-edit"></i> Edit</a> 

								<div class="btn btn-info btn-danger">
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
	   </div>	
</div>
@endsection

			