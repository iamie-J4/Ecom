@extends('layouts.app')

@section('content')
<div class="container">
    <div class="well col-lg-6 col-md-6 col-sm-6">
    	<h1>Create a SubCategory Group</h1>
    	<div class="box box-info"></div>
		{!! Form::open(['route' => 'productgroups.store']) !!}
				 {{ csrf_field() }}
			<div class="form-group col-lg-12 col-md-12 col-sm-12">

			<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
			    {!! Form::label('category_id', 'Choose category:') !!}
			    {!! Form::select('category_id', $categories, ['class'=> 'form-control'])!!}
			</div>
			<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
			    {!! Form::label('name', 'Name:') !!}
			    {!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-lg-12 col-md-12 col-sm-12">
			    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			    <a href="{!! route('productgroups.index') !!}" class="btn btn-default">Cancel</a>
			</div>

        {!! Form::close() !!}

	</div>
</div>
</div>
@endsection