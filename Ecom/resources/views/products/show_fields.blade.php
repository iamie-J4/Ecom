



<div class="form-group">
        <div class="row col-lg-6 col-md-6 col-sm-6">
        
            <br>        
            <img src="{{asset('images/'. $product->image)}}" class="img-responsive" style="width: 80%; border: 2px solid #FF7F50" alt="Product Photo"> <hr>

            <a class="btn btn-info btn-info" href="{!! route('products.index') !!}"><span><<</span> All Products</a> 

        
    </div>

    </div>
    <div class=" well row col-lg-6 col-md-6 col-sm-6">
        <p>
            <h3><span class="label label-info"></span><strong>{{$product->name}}</strong></h3>
            <h6><i> ({{$product->category->name}})</i></h6>
        </p><hr>

        <p>Price: <i><del>RM 999</del></i><strong style="color: darkred"> <h1><ins>RM {!! $product->price !!}</ins> </h1></strong></p><hr>

        {!! Form::label('description', 'About:') !!}
        <p class="form-spacing-top">{!! $product->description !!}</p><hr>

        <p>Available Quantity: <span style="color: darkgreen">{!! $product->qty !!} units</span></p><hr>

        <p>Ordered Quantity: {!! $product->o_qty !!}</p><hr>

        <p>Posted on: {!! $product->created_at !!}</p><hr>

        <p>Updated on: {!! $product->updated_at !!}</p><hr>

        <a class="btn btn-info btn-info" href="{!! route('products.edit', [$product->id]) !!}"><i class="fa fa-edit"></i> Edit</a> 

                                <div class="btn btn-info btn-danger">
                                <a
                                  href="#"
                                      onclick="
                                      var result = confirm('Are you sure you wish to delete this Product?');
                                          if( result ){
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
       </div>   
</div>






{{--
<!-- Image Field -->
<div class="form-group">
    <img src="{{asset('images/'. $product->image)}}" alt="Product Photo" style="width: 20%; height: 30%; border: 2px solid #FF7F50">
</div>

<img src="$product->image" alt="">

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $product->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $product->user_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $product->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $product->description !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $product->price !!}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{!! $product->qty !!}</p>
</div>

<!-- O Qty Field -->
<div class="form-group">
    {!! Form::label('o_qty', 'O Qty:') !!}
    <p>{!! $product->o_qty !!}</p>
</div>

<!-- Source Field -->
<div class="form-group">
    {!! Form::label('source', 'Source:') !!}
    <p>{!! $product->source !!}</p>
</div>

<!-- Category Field 
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $product->category !!}</p>
</div>-->

<!-- Postage Field -->
<div class="form-group">
    {!! Form::label('postage', 'Postage:') !!}
    <p>{!! $product->postage !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $product->status !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $product->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $product->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $product->updated_at !!}</p>
</div>
--}}
