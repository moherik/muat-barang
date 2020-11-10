<p>Helo, {{Auth::user()->name ?? Auth::user()->username}}</p>
<a href="{{route('admin.dashboard')}}">Dashboard</a>