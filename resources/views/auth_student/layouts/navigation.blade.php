{{ Auth::guard('student')->user()->name }}
{{ Auth::guard('student')->user()->email }}

<form method="POST" action="{{ route('student.logout') }}">
    @csrf

    <button>fff</button>
</form>

