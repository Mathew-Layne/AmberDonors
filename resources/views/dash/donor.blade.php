<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    <title>Donor Dashboard</title>
</head>
<body>
    <div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
    
            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
                class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center w-3/4" >
                        <a href="{{ url('/') }}">
                        <img class=" w-full" src="{{ url('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
    
                <nav class="mt-10">
                    <a class="flex items-center mt-4 py-2 px-6  hover:bg-gray-800 bg-opacity-25 text-gray-200" href="{{ url('/dashboard/donor') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
    
                        <span class="mx-3">Profile</span>
                    </a>
    
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-200 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="{{ url('/dashboard/donor/donate/blood') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>
    
                        <span class="mx-3">Donate Blood</span>
                    </a>
    
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-200 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="{{ url('/dashboard/donor/donation/history') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
    
                        <span class="mx-3">Donation History</span>
                    </a>

                </nav>
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
    
                        <div class="relative mx-4 lg:mx-0">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </svg>
                            </span>
    
                            <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600" type="text"
                                placeholder="Search">
                        </div>
                    </div>
    
                    <div class="flex items-center">
                        <span class="font-bold mx-3">{{ Auth::user()->name }}</span>
                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = ! dropdownOpen"
                                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                                <img class="h-full w-full object-cover"
                                    src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
                                    alt="Your avatar">
                            </button>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                class="fixed inset-0 h-full w-full z-10" style="display: none;"> </div>

                            <div x-show="dropdownOpen"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                style="display: none;">

                                <form action="{{ url('logout') }}" method="post">
                                    @csrf
                                    <button class="text-left w-full block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white" type="submit">
                                        Logout
                                    </button>
                                </form>
                                {{-- <a href="/login"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a> --}}
                            </div>
                        </div>

                    </div>
                </header>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    @if (session()->get('donor') == 'profile')                        
                    
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium"> Profile</h3>
    
                        <div class="mt-4">
                            <div class="flex flex-wrap justify-center -mx-6">
                                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                    <div class="flex items-center px-5 py-7 shadow-sm rounded-md bg-white">
                                        <div class="p-5 rounded-full bg-red-600 ">
                                            <i class="far fa-hand-holding-medical text-white text-2xl"></i>
                                        </div>
    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">1</h4>
                                            <div class="text-gray-500">Totat Donation</div>
                                        </div>
                                    </div>
                                </div>    
                                
                            </div>
                        </div>
    
                        <div class="mt-12">
    
                        </div>
    
                        <div class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                                    <table class="min-w-full border-collapse block md:table">
                                        <thead class="block md:table-header-group">
                                            <tr
                                                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Full Name</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Blood Type</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    D.O.B</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Address</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    City</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Parish</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Email</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Mobile</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="block md:table-row-group">
                                            @foreach ($donors as $donor)
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Full Name</span>{{ $donor->donor_name }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Blood Type</span>{{ $donor->bloodType->type_name }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">D.O.B</span>{{ $donor->dob }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Address</span>{{ $donor->donor_address }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">City</span>{{ $donor->city }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Parish</span>{{ $donor->parish }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Email</span>{{ $donor->donor_email }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Mobile</span>{{ $donor->donor_phoneno }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                                    
                                                    <a href="{{ url('dashboard/donor/edit/'. $donor->id) }}">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                                        Update
                                                    </button></a>
                                                    <a href="{{ url('dashboard/donor/delete/'.$donor->id) }}">
                                                    <button
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mt-1 border border-red-500 rounded">Delete</button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(session()->get('donor') == 'donateblood')

                    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
                        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-lg sm:p-10">
                                <div class="max-w-md mx-auto">
                                    <div class="flex items-center space-x-5">
                                        <div
                                            class="h-14 w-14 bg-red-600 rounded-full flex flex-shrink-0 justify-center items-center text-white text-2xl font-mono">
                                            <i class="fas fa-tint"></i></div>
                                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                            <h2 class="leading-relaxed">Blood Donation</h2>
                                            <p class="text-sm text-gray-500 font-normal leading-relaxed">Save a life today by becoming a
                                                doner.</p>
                                        </div>
                                    </div>
                    
                    
                                    <form method="POST" action="{{url('dashboard/donor/donate/blood')}}">
                                        @csrf
                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-2 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Units (in ml)</label>
                                                    <input type="number" placeholder="Enter Unit of Donated Blood" name="units"
                                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                    @error('units')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                </div>
                                                
                                            </div>
                                            <div class="pt-4 flex items-center">
                                                <button type="submit"
                                                    class="bg-red-600 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none font-bold">
                                                Donate</button>
                                            </div>
                                        </div>
                                    </form>
                    
                    
                                </div>
                            </div>
                        </div>
                    </div>


                    @elseif(session()->get('donor') == "donationhistory")

                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">Donation History</h3>                
                    
                        <div class="mt-8">
                    
                        </div>
                    
                        <div class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    
                                    <table class="min-w-full border-collapse block md:table">
                                        <thead class="block md:table-header-group">
                                            <tr
                                                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Full Name</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Blood Type</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    D.O.B</th>                                                
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Email</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Mobile</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Units (in ml)</th>
                                                <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Donation Date</th>
                                                                                            
                                            </tr>
                                        </thead>
                                        <tbody class="block md:table-row-group">
                                            @foreach ($donations as $donation)
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Full
                                                        Name</span>{{ $donation->donor_name }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Blood
                                                        Type</span>{{ $donation->blood_type }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">D.O.B</span>{{ $donation->dob }}</td>
                                                
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Email</span>{{ $donation->donor_email }}
                                                </td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Mobile</span>{{ $donation->donor_phoneno }}
                                                </td> 
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Address</span>{{ $donation->blood_quantity }}
                                                </td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">City</span>{{ $donation->date_donated }}</td>                                                                                             
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                </main>
            </div>
        </div>
    </div>
    
</body>
</html>

