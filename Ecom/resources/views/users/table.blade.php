
    
<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
       {{-- <th>Password</th>--}}
        <th>Role Id</th>
        <th>Hp Number</th>
       {{-- <th>Remember Token</th>--}}
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->first_name !!}</td>
            <td>{!! $user->last_name !!}</td>
            <td>{!! $user->email !!}</td>
           {{-- <td>{!! $user->password !!}</td>--}}
            <td>{!! $user->role_id !!}</td>
            <td>{!! $user->Hp_number !!}</td>
            {{--<td>{!! $user->remember_token !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs' title="view"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'title="edit"><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'title'=>'delete','onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
