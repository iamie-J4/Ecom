
@auth
@if(auth::user()->role_id == 'WksbTsjfbkYYSjsn')
@include('layouts.appp')

@else

@include('notAdmin.appUser')
@endif
@endauth

@if(auth::guest())
@include('notAdmin.appUser')
@endif