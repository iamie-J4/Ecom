@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trip
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trip, ['route' => ['trips.update', $trip->id], 'method' => 'patch']) !!}

                        @include('trips.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection