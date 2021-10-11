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
      <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
        <div class="max-w-md mx-auto">
          <div class="flex items-center space-x-5">
            <div
              class="h-14 w-14 bg-red-500 rounded-full flex flex-shrink-0 justify-center items-center text-white text-2xl font-mono">
              <i class="fas fa-tint"></i></div>
            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
              <h2 class="leading-relaxed">Donor Registration</h2>
              <p class="text-sm text-gray-500 font-normal leading-relaxed">Save a life today by becoming a doner.</p>
            </div>
          </div>
          <form action="">
            @csrf
          <div class="divide-y divide-gray-200">
            <div class="py-8 text-base leading-6 space-y-2 text-gray-700 sm:text-lg sm:leading-7">
              <div class="flex flex-col">
                <label class="leading-loose">Enter Name</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Jane Doe">
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Enter Email</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="name@example.com">
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Enter Stree Address</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="72 Cherry Street">
              </div>
              
              <div class="flex items-center space-x-4">
                <div class="flex flex-col">
                  <label class="leading-loose">City</label>
                  <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text"
                      class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                      placeholder="Enter City">                    
                  </div>
                </div>
                <div class="flex flex-col">
                  <label class="leading-loose">Parish</label>
                  <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text"
                      class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                      placeholder="Enter Parish">                    
                  </div>
                </div>
              </div>



              <div class="flex flex-col">
                <label class="leading-loose">Enter Name</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Event title">
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Event Subtitle</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Optional">
              </div>
              <div class="flex items-center space-x-4">
                <div class="flex flex-col">
                  <label class="leading-loose">Start</label>
                  <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text"
                      class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                      placeholder="25/02/2020">
                    <div class="absolute left-3 top-2">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <label class="leading-loose">End</label>
                  <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text"
                      class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                      placeholder="26/02/2020">
                    <div class="absolute left-3 top-2">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Event Description</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Optional">
              </div>
            </div>
            <div class="pt-4 flex items-center space-x-4">
              <button
                class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg> Cancel
              </button>
              <button
                class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


{{-- <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
      <div class="max-w-md mx-auto">
        <div class="flex items-center space-x-5">
          <div
            class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
            i</div>
          <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
            <h2 class="leading-relaxed">Create an Event</h2>
            <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur
              adipisicing elit.</p>
          </div>
        </div>

        <form action="">

          <div class="divide-y divide-gray-200">
            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
              <div class="flex flex-col">
                <label class="leading-loose">Event Title</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Event title">
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Event Subtitle</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Optional">
              </div>
              <div class="flex items-center space-x-4">
                <div class="flex flex-col">
                  <label class="leading-loose">Start</label>
                  <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text"
                      class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                      placeholder="25/02/2020">
                    <div class="absolute left-3 top-2">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <label class="leading-loose">End</label>
                  <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text"
                      class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                      placeholder="26/02/2020">
                    <div class="absolute left-3 top-2">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Event Description</label>
                <input type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Optional">
              </div>
            </div>
            <div class="pt-4 flex items-center space-x-4">
              <button class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg> Cancel
              </button>
              <button
                class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
            </div>
          </div>

        </form>
        
      </div>
    </div>
  </div>
</div> --}}


    {{-- <div class="main-head">
    </div>
    <div class="container">

        <form id="contact" action="{{url('donor/register')}}" method="post">
            @csrf

          <h3>DONOR REGISTRATION FORM</h3>
          <h4>Donate to save a life today!</h4>

          <div class="container mt-4">
            @if(session('status'))
            <div class="alert ">
            {{ session('status') }}
            </div>
            @endif
          <fieldset>
              <label for="name">Enter Name:</label>
            <input placeholder="Your name" name="donor_name" type="text" tabindex="1"  class="@error('donor_name') is-invalid @enderror form-control" autofocus>
                @error('donor_name')
                <div class="alert">{{ $message }}</div>
                @enderror
          </fieldset>

          <fieldset>
              <label for="email">Email:</label>
            <input placeholder="Your Email Address" name="donor_email" type="email" class="@error('donor_email') is-invalid @enderror form-control" tabindex="2" >
            @error('donor_email')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
              <label for="address">Address:</label>
            <input placeholder="address" name="donor_address" type="text" tabindex="4" class="@error('donor_address') is-invalid @enderror form-control" >
            @error('donor_address')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>
          <fieldset>
              <label for="tel">Telephone</label>
            <input placeholder="Your Phone Number" name="donor_phoneno" type="telephone" class="@error('donor_phoneno') is-invalid @enderror form-control" tabindex="3" >
            @error('donor_phoneno')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
              <label for="address">Date of Birth:</label>
              <input placeholder="number of donation" name="dob" type="text" tabindex="4" class="@error('total_donation') is-invalid @enderror form-control" >
              @error('total_donation')
              <div class="alert">{{ $message }}</div>
              @enderror
          </fieldset>

          <fieldset>
            <label for="address">Sex:</label>
          <input placeholder="Eg. Female" name="sex" type="text" tabindex="4" class="@error('sex') is-invalid @enderror form-control" >
          @error('sex')
          <div class="alert">{{ $message }}</div>
          @enderror
        </fieldset>


        <fieldset>
          <fieldset>
              <label for="b-type">What is Your Blood Type?</label>
            <input placeholder="Eg. O+" name="blood_type" type="text" tabindex="1" class="@error('blood_type') is-invalid @enderror form-control"  autofocus>
            @error('blood_type')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
              <label for="address">When was your last donation date:</label>
            <input placeholder="Eg. Janurary 2019" name="last_donation_date" type="text" tabindex="4" class="@error('last_donation_date') is-invalid @enderror form-control" >
            @error('last_donation_date')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>
        </fieldset>         
          <fieldset>
            <button name="submit" type="submit" >Submit</button>
          </fieldset>
        </form>
    </div> --}}

</body>
</html>


{{-- <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">State</label>
                  <div class="col-md-4 selectContainer">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select name="state" class="form-control selectpicker" >
                    <option value=" " >Please select your parish</option>
                    <option>Kingston</option>
                    <option>St. Andrew</option>
                    <option >Portland </option>
                    <option >St. Thomas</option>
                    <option >St. Catherine</option>
                    <option >St. Mary</option>
                    <option >St. Ann</option>
                    <option >Manchester</option>
                    <option >Clarendon</option>
                    <option> Hanover</option>
                    <option >Westmoreland</option>
                    <option >St. James</option>
                    <option >Trelawny</option>
                    <option >St. Elizabeth</option>
                  </select>
                </div>
              </div>
              </div>
          </fieldset> --}}


{{-- Radio Selection --}}
{{-- <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">Have you done a blood donation before?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="hosting" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="hosting" value="no" /> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Have you had any disease?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="disease" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="disease" value="no" /> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Do you have any allergies?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="allergy" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="allergy" value="no" /> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Have you done a blood donation before?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="donate" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="donate" value="no" /> No
                        </label>
                    </div>
                </div>
            </div> --}}

{{-- </fieldset>
          <fieldset>
            <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
          </fieldset> --}}