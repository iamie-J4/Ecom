<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $trip->id !!}</p>
</div>

<!-- Departure Field -->
<div class="form-group">
    {!! Form::label('departure', 'Departure:') !!}
    <p>{!! $trip->departure !!}</p>
</div>

<!-- Arrival Field -->
<div class="form-group">
    {!! Form::label('arrival', 'Arrival:') !!}
    <p>{!! $trip->arrival !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $trip->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $trip->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $trip->updated_at !!}</p>
</div>

