<table class="table table-responsive" id="trips-table">
    <thead>
        <tr>
            <th>Departure</th>
        <th>Arrival</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($trips as $trip)
        <tr>
            <td>{!! $trip->departure !!}</td>
            <td>{!! $trip->arrival !!}</td>
            <td>
                {!! Form::open(['route' => ['trips.destroy', $trip->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trips.show', [$trip->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trips.edit', [$trip->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>