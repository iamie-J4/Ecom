@extends('layouts.app')

@section('content')
<div class="container">
	<div class="form-group">
		<div class="well well-sm col-lg-4 col-md-4 col-sm-4" style="margin-top: 2%; background-color: #8FBC8F">
    	
			<p><h1>{{$subcategory->name}}</h1></p>

			<p>Category: <a href="{!! route('categories.show', [$subcategory->category->id]) !!}" style="color: black"> ({{$subcategory->category->name}})</a></p>

			<p><a class="btn btn-info btn-warning" href="{!! route('subcategories.edit', [$subcategory->id]) !!}"><i class="fa fa-edit"></i> Edit</a> 

								
								<a class="btn btn-info btn-danger
					              href="#"
					                  onclick="
					                  var result = confirm('Are you sure you wish to delete this SubCategory?');
					                      if( result ){
					                              event.preventDefault();
					                              document.getElementById('delete-form').submit();
					                      }
					                          "
					                          style="color: white">
					                  <i class="glyphicon glyphicon-trash"></i> Delete
					              </a>

					              <form id="delete-form" action="{{ route('subcategories.destroy',[$subcategory->id]) }}"
					                method="POST" style="display: none;">
					                <input type="hidden" name="_method" value="delete">
					                        {{ csrf_field() }}
					              </form>
						
			</p>

			<p><a class="btn btn-info btn-info" href="{!! route('subcategories.index') !!}"><span><<</span> All SubCategories</a> </p>

	   	</div>	

	</div>
</div>
@endsection

			