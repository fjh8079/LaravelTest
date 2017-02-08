@foreach ($users as $user)
	<li>{{ $user->name }}</li>
@endforeach
<input type="button" name="" value="create" onclick="location.href='user/create'">