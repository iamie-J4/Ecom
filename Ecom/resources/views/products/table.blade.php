<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Qty</th>
        <th>O Qty</th>
        <th>Source</th>
        <th>Image</th>
        <th>Category</th>
        <th>Postage</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->user_id !!}</td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->description !!}</td>
            <td>{!! $product->price !!}</td>
            <td>{!! $product->qty !!}</td>
            <td>{!! $product->o_qty !!}</td>
            <td>{!! $product->source !!}</td>
            <td>{!! $product->image !!}</td>
            <td>{!! $product->category !!}</td>
            <td>{!! $product->postage !!}</td>
            <td>{!! $product->status !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>