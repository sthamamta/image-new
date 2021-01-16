<html>
<head></head>
<body>
<h3>Index page</h3>
<p1>You are logged in </p1>

<li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
@foreach ($images as $img)
<!-- <img src = "{{ asset('/images/'. $img->img) }}" /> -->
<img src="{{ asset('/storage/app/public/Imagefolder/'. $img->img) }}"/>
@endforeach


</body>
</html>