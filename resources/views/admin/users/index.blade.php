@extends ('layouts.admin')


@section('content')

    <h1>Users</h1>

    <table class="table table-striped">
    <thead>
      <tr>

          <th></th>
        <th>Id</th>
        <th>Name</th>
          <th>Photo</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
          <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    
    @if($users)

        @foreach($users as $user)

      <tr>

          <td><a href = {{  url ('admin/users/edit',array($user->id))}}>
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> |
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </td>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td><img height ="50" width ="50" src="{{$user->photo ? $user->photo->file : '/images/boss .png'}}" alt=""></td>
          <td>{{$user->email}}</td>
          <td>{{$user->role ? $user->role->name : 'New User'}}</td>
          <td>{{$user->is_active==1 ? 'Active' : 'Inactive'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
     
        @endforeach 

    @endif

    </tbody>
  </table>


@endsection



