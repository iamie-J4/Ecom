@extends('layouts.app')

@section('content')
    @if(auth::user()->role_id == 1)
    <section class="content-header">
        <h1 class="pull-left">Products</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('products.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endif


@if(auth::user()->role_id == 2 || auth::user()->role_id == 3)
 <section class="content-header">
    <h1 class="pull-left">Products</h1>
</section>
    
<div class="box box-primary" style="margin-top: 30px">     
    <div class="content">
        <div class="col-md-12">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" >
                    <h4 class="text-center"><span class="label label-info">Nokia</span></h4>
                    <img src="http://placehold.it/650x450&text=Lumia 1520" class="img-responsive">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <h3>Lumia 1520</h3>
                            </div>
                            <div class="col-md-6 col-xs-6 price">
                                <h3>
                                <label>$749.00</label></h3>
                            </div>
                        </div>
                        <p>32GB, 4GB Ram, 1080HD, 6.3 inches, WP 8</p>
                        <div class="row">
                            @if(auth::user()->role_id==3)
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a> 
                            </div>
                            @endif
                            @if(auth::user()->role_id==2)
                            <div class="col-md-6">
                                <a class="btn btn-danger btn-product"><span class="glyphicon glyphicon-trash"></span> delete</a> 
                            </div>
                            @endif
                            <div class="col-md-6">
                                <a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a></div>
                        </div>

                        <p> </p>
                    </div>
                </div>
            </div>
            
        </div>
    
</div> 
@endif
@endsection

