<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
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
                        <img class=" w-full" src="{{ url('img/logo.png') }}" alt="">
                    </div>
                </div>
    
                <nav class="mt-10">
                    <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="{{ url('/') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
    
                        <span class="mx-3">Profile</span>
                    </a>
    
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="{{ url('/dashboard/donor/donate/blood') }}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>
    
                        <span class="mx-3">Donate Blood</span>
                    </a>
    
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
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
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="text-white bg-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="submit" style="transition: all 0.15s ease 0s;"> <i class="fas fa-arrow-alt-circle-right"></i> Logout
                            </button>
                        </form>
                        
                    </div>
                </header>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    @if (session()->get('donor') == 'profile')                        
                    
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">Profile</h3>
    
                        <div class="mt-4">
                            <div class="flex flex-wrap -mx-6">
                                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
                                            <div class="text-gray-500">New Users</div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">200,521</h4>
                                            <div class="text-gray-500">Total Orders</div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="2"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                    stroke="currentColor" stroke-width="2"></path>
                                            </svg>
                                        </div>
    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">215,542</h4>
                                            <div class="text-gray-500">Available Products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
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
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Full Name</span>{{ $donor->donor_name }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Blood Type</span>{{ $donor->blood_type }}</td>
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
                                            <h2 class="leading-relaxed">Donor Registration</h2>
                                            <p class="text-sm text-gray-500 font-normal leading-relaxed">Save a life today by becoming a
                                                doner.</p>
                                        </div>
                                    </div>
                    
                    
                                    <form method="POST" action="{{url('donor/register')}}">
                                        @csrf
                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-2 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Enter Name</label>
                                                    <input type="text" value="{{ Auth::user()->name }}" name="donor_name"
                                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                    @error('donor_name')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Enter Email</label>
                                                    <input type="text" value="{{ Auth::user()->email }}" name="donor_email"
                                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                    @error('donor_email')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Enter Street Address</label>
                                                    <input type="text" placeholder="72 Cherry Street" name="donor_address"
                                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                    @error('donor_address')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                </div>
                    
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex flex-col">
                                                        <label class="leading-loose">City</label>
                                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                                            <input type="text" placeholder="Enter City" name="city"
                                                                class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        </div>
                                                        @error('city')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <label class="leading-loose">Parish</label>
                                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                    
                                                            <select name="parish"
                                                                class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                                <option value="">Select Parish</option>
                                                                <option value="Clarendon">Clarendon</option>
                                                                <option value="Hanover">Hanover</option>
                                                                <option value="Kingston & St Andrew">Kingston & St Andrew</option>
                                                                <option value="Manchester">Manchester</option>
                                                                <option value="St. Ann">St. Ann</option>
                                                                <option value="St. Catherine">St. Catherine</option>
                                                                <option value="St. Elizabeth">St. Elizabeth</option>
                                                                <option value="St. James">St. James</option>
                                                                <option value="St. Mary">St. Mary</option>
                                                                <option value="St. Thomas">St. Thomas</option>
                                                                <option value="Trelawny">Trelawny</option>
                                                                <option value="Westmoreland">Westmoreland</option>
                                                            </select>
                    
                                                        </div>
                                                        @error('parish')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                    
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Blood Type</label>
                                                    <select name="blood_type"
                                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        <option value="">Choose Blood Type</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                    @error('blood_type')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                </div>
                    
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex flex-col">
                                                        <label class="leading-loose">Phone Number</label>
                                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                                            <input type="number" placeholder="Enter Phone Number" name="donor_phoneno"
                                                                class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        </div>
                                                        @error('donor_phoneno')<span
                                                            class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <label class="leading-loose">Date of Birth</label>
                                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                                            <input type="date" placeholder="Enter Parish" name="dob"
                                                                class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                    
                                                        </div>
                                                        @error('dob')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-4 flex items-center">
                                                <button type="submit"
                                                    class="bg-red-600 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none font-bold">Register</button>
                                            </div>
                                        </div>
                                    </form>
                    
                    
                                </div>
                            </div>
                        </div>
                    </div>


                    @elseif(session()->get('donor') == "donationhistory")

                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">Profile</h3>
                    
                        <div class="mt-4">
                            <div class="flex flex-wrap -mx-6">
                                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
                                            <div class="text-gray-500">New Users</div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">200,521</h4>
                                            <div class="text-gray-500">Total Orders</div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor"
                                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                                <path
                                                    d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                    stroke="currentColor" stroke-width="2"></path>
                                            </svg>
                                        </div>
                    
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">215,542</h4>
                                            <div class="text-gray-500">Available Products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
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
                                                    Address</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    City</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Parish</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Email</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Mobile</th>
                                                <th
                                                    class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="block md:table-row-group">
                                            @foreach ($donors as $donor)
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Full
                                                        Name</span>{{ $donor->donor_name }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Blood
                                                        Type</span>{{ $donor->blood_type }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">D.O.B</span>{{ $donor->dob }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Address</span>{{ $donor->donor_address }}
                                                </td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">City</span>{{ $donor->city }}</td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Parish</span>{{ $donor->parish }}
                                                </td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Email</span>{{ $donor->donor_email }}
                                                </td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                                        class="inline-block w-1/3 md:hidden font-bold">Mobile</span>{{ $donor->donor_phoneno }}
                                                </td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                    
                                                    <a href="{{ url('dashboard/donor/edit/'. $donor->id) }}">
                                                        <button
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
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

                    @endif
                </main>
            </div>
        </div>
    </div>
    
</body>
</html>

