

<h1>Welcome {{ Auth::guard('web')->user()->name }}</h1>

<a href="{{ route('logout') }}">logout</a>