<!-- Departure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure', 'Departure:') !!}
    {!! Form::text('departure', null, ['class' => 'form-control']) !!}
</div>

<!-- Arrival Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival', 'Arrival:') !!}
    {!! Form::text('arrival', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trips.index') !!}" class="btn btn-default">Cancel</a>
</div>
