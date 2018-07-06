@extends('layouts.app')

@section('content')
<div class="col-lg-9 col-md-9 col-sm-9">
    <section class="content-header">
        <h1 class="pull-left">Users</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    </div>

<br>
 <div class="col-lg-3 col-md-3 col-sm-3 pull-right">
    <ul class="list-group list-group-warning">
        <strong>Top 10 Users Transactions</strong>
        @foreach($users as $user)
      <li class="list-group-item">
        <span class="badge">14</span>
        {{$user->first_name}}
      </li>
      @endforeach
</ul>

 </div>   
@endsection

