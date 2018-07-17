@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                   
                    <form class="form-horizontal" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include('products.fields')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
