<!-- User Id Field -->
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

<!-- Image Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('image', 'Upload Image:') !!}
    {!! Form::file('image') !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('category_id', 'Choose category:') !!}
   <p>Add to: {!! Form::select('category_id', $categories, ['class'=> 'form-control'])!!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- O Qty Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('o_qty', 'O Qty:') !!}
    {!! Form::number('o_qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Source Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('source', 'Source:') !!}
    {!! Form::text('source', null, ['class' => 'form-control']) !!}
</div>

<!-- Postage Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('postage', 'Postage:') !!}
    {!! Form::text('postage', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-5" style="margin-right: 3%; margin-left: 2%">
    {!! Form::label('status', 'Status:') !!}
    <select class="form-control">
              <option value="volvo">Available</option>
              <option value="saab">Pending</option>
              <option value="saab">Processing</option>
              <option value="saab">Sold Out</option>
            </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12" style="margin-left: 2%">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
