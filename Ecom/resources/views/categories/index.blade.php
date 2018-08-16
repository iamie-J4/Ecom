@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	 @include('flash::message')
    	<div class="col-md-11">
    		<div class="col-md-6">
    		<section class="content-header"><h1 class="pull-left">Categories</h1> 

		    	<h1 class="pull-right">
		    		<a class="btn btn-primary" href="{{route('categories.create')}}">Add new</a>
		    	</h1>
		    </section>
            <div class="box box-primary pull-left">
            </div>
        </div>
           <div class="pull-left">
            @foreach($categories as $category)
              <div class=" col-sm-4 col-md-4">
				<div class="thumbnail" >
					<h4 class="text-center" style="color: darkgreen">{{$category->name}}</h4>

					<a href="{!! route('categories.show', [$category->id]) !!}"> 
					<img src="{{asset('images/categories/'. $category->image)}}" class="img-responsive" style="height: 200px; width: 100%"></a>
					
					<div class="caption">
						<div class="row">
							<div class="text-center">
								<a class="btn btn-info btn-info" href="{!! route('categories.show', [$category->id]) !!}"><i class="glyphicon glyphicon-eye-open"></i> View</a> 
								
								@can('isAdmin')
								<div class="btn btn-info btn-danger">
								<a
					              href="#"
					                  onclick="
					                  var result = confirm('Are you sure you wish to delete this Category?');
					                      if(result){
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
						@endcan
							</div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>
			@endforeach
            </div>

        </div> 

	</div>
</div>
@endsection