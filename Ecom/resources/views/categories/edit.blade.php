@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-lg-6 col-md-6 col-sm-6">
    	<h1>Create a Category</h1>
    	<div class="box box-info"></div>

			{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'files'=>true]) !!}

			    {{ csrf_field() }}
		           
	           <div class="form-group col-lg-12 col-md-12 col-sm-12">
				    {!! Form::label('name', 'Name:') !!}
				    {!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group col-lg-6 col-md-6 col-sm-6 pull-left">
				    {!! Form::label('image', 'Upload Image:') !!}
				    {!! Form::file('image') !!}
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12">
			    {!! Form::submit('Save', ['class' => 'btn btn-primary btn btn-flat']) !!}

			    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
			</div>

		  {!! Form::close() !!}
	</div>
</div>
@endsection