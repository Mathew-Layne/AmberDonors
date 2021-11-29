<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Search</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="shortcut icon" href="{{ url('img/fav.png') }}" type="image/x-icon">
    @livewireStyles()
</head>
<body>
    <nav
        class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-gray-800">
        <div class="container px-4 mx-auto flex flex-wrap items-center ">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"> <a
                    class="text-sm font-bold leading-relaxed inline-block mr-4 py-1 whitespace-nowrap uppercase text-white"
                    href="/"><img class=' w-5/12' src="img/logo.png" alt=""> </a><button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button" onclick="toggleNavbar('example-collapse-navbar')"> <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
    
                    <li class="flex items-center"> <a
                            class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{ url('donor/register') }}">
                            Become a Donors</a> </li>
                    <li class="flex items-center"> <a
                            class=" lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{ url('register/recipient') }}"><span class="inline-block ml-2">Request
                                Blood</span></a> </li>
                    <li class="flex items-center"> <a
                            class=" lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{ route('bloodsearch') }}"><span class="inline-block ml-2">Blood Search</span></a>
                    </li>
                    <li class="flex items-center"> <a
                            class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#aboutUs"><span class="inline-block ml-2">About</span></a> </li>
                    <li class="flex items-center"> <a
                            class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#contactUs"><span class="inline-block ml-2">Contact Us</span></a> </li>
                    @if(Auth::check())
    
                    <li class="flex items-center"> <a
                            class=" lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{ url('dashboard') }}"><span class="inline-block ml-2">Dashboard</span></a> </li>
    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li class="flex items-center"><button
                                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="submit" style="transition: all 0.15s ease 0s;"> <i
                                    class="fas fa-arrow-alt-circle-right"></i> Logout </button> </li>
                    </form>
                    @else
                    <li class="flex items-center"> <a
                            class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{ url('/register') }}"><span class="inline-block ml-2">Register</span></a> </li>
    
                    <li class="flex items-center"><a href="{{ url('/login') }}"> <button
                                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="button" style="transition: all 0.15s ease 0s;"> <i
                                    class="fas fa-arrow-alt-circle-right"></i>Login
                            </button></a> </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @livewire('blood-search')
    
    @livewireScripts()
    <script>
        function toggleNavbar(e){document.getElementById(e).classList.toggle("hidden"),document.getElementById(e).classList.toggle("block")}
    </script>
</body>
</html>