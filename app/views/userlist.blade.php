<h1>User List</h1>
<ul>
  @foreach($users as $user)
    <li>{{ $user->email }}</li>
  @endforeach
</ul>