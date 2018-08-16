@extends('layouts.app')

@section('content')
<div class="container">
	<div class="form-group">
		<div class="well well-sm col-lg-4 col-md-4 col-sm-4" style="margin-top: 2%; background-color: #8FBC8F">
    	
			<p><h1>{{$productgroup->name}}</h1></p>

			<p>Category: <a href="{!! route('categories.show', [$productgroup->category->id]) !!}" style="color: black"> ({{$productgroup->category->name}})</a></p>

			<p><a class="btn btn-info btn-warning" href="{!! route('productgroups.edit', [$productgroup->id]) !!}"><i class="fa fa-edit"></i> Edit</a> 

								
								<a class="btn btn-info btn-danger
					              href="#"
					                  onclick="
					                  var result = confirm('Are you sure you wish to delete this Group?');
					                      if( result ){
					                              event.preventDefault();
					                              document.getElementById('delete-form').submit();
					                      }
					                          "
					                          style="color: white">
					                  <i class="glyphicon glyphicon-trash"></i> Delete
					              </a>

					              <form id="delete-form" action="{{ route('productgroups.destroy',[$productgroup->id]) }}"
					                method="POST" style="display: none;">
					                <input type="hidden" name="_method" value="delete">
					                        {{ csrf_field() }}
					              </form>
						
			</p>

			<p><a class="btn btn-info btn-info" href="{!! route('productgroups.index') !!}"><span><<</span> All Groups</a> </p>

	   	</div>	

	</div>
</div>
@endsection

			