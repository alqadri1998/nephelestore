<h1>Hello {{ $user->name }}</h1>
<p>
	<a href="{{ url('reset/password/'.$user->email.'/'.$user->remember_token) }}">Click Here To Reset Your Password</a>
</p>