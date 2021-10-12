<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
  <title>Donor Form</title>


</head>

<body>

  <!--
    UI Design Prototype
    Link : https://dribbble.com/shots/10452538-React-UI-Components
  -->
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
              <p class="text-sm text-gray-500 font-normal leading-relaxed">Save a life today by becoming a doner.</p>
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
                  <label class="leading-loose">Enter Stree Address</label>
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
                    disabled class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
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
                    @error('donor_phoneno')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
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
                  class="bg-red-600 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none font-bold">Update</button>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>

</body>

</html>
