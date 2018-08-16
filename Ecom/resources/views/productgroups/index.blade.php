@extends('layouts.app')

@section('content')
<div class=" col-md-8">
<section class="content-header">
    <h1 class="pull-left">Product SubCategory groups</h1>
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('productgroups.create') !!}">Add New</a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
                    
			<table class="table table-responsive" id="subCategories-table">
			    <thead>
			        <tr>
			            <th>Id</th>
				        <th>Name</th>
				        <th>Category</th>
			            <th colspan="3" class="pull-right">Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($productgroups as $productgroup)
			        <tr>
			            <td>{!! $productgroup->id !!}</td>
			            <td>{!! $productgroup->name !!}</td>
			            <td> <a href="{!! route('categories.show', [$productgroup->category->id]) !!}">{!! $productgroup->category->name!!}</a></td>
			            <td class=" pull-right">
			                {!! Form::open(['route' => ['productgroups.destroy', $productgroup->id], 'method' => 'delete']) !!}
			                <div class='btn-group'>
			                    <a href="{!! route('productgroups.show', [$productgroup->id]) !!}" class='btn btn-info' title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
			                    <a href="{!! route('productgroups.edit', [$productgroup->id]) !!}" class='btn btn-warning' title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
			                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
			                </div>
			                {!! Form::close() !!}
			            </td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>

        </div>
    </div>
    <div class="text-center">
    
    </div>
</div>
</div>
@endsection

