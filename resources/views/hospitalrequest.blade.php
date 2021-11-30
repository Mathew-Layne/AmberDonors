@extends('dash.recipient')
@section('content')
<div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-lg sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-red-600 rounded-full flex flex-shrink-0 justify-center items-center text-white text-2xl font-mono">
                        <i class="fas fa-heartbeat"></i></div>
                    <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                        <h2 class="leading-relaxed">Blood Request</h2>
                        <p class="text-sm text-gray-500 font-normal leading-relaxed">Please fill out the form below</p>
                    </div>
                </div>

                @if (session('status'))
                <div class="alert alert-success text-red-600">
                    {{ session('status') }}
                </div>
                @endif



                <form method="POST" action="{{route('storeRequest')}}">

                    @csrf
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-2 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <label class="leading-loose">Hospital Name</label>
                                <input type="hidden" name="hospital_id" value={{ $hospital->id }}>
                                <input type="text" readonly value="{{ $hospital->hospital_name }}" name="hospital_name" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                @error('hospital_name')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                            </div>

                             <div class="flex flex-col">
                                 <label class="leading-loose">Blood Bank</label>
                                 <div class="relative focus-within:text-gray-600 text-gray-400">

                                     <select name="camp_id" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                         <option value="">Select Blood Bank</option>
                                         @forelse($bloodBank as $blood)
                                         <option value="{{ $blood->id }}">{{ $blood->branch_name }}</option>
                                         @empty
                                         <option value="">No Records</option>
                                         @endforelse
                                     </select>

                                 </div>
                                 @error('camp_id')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                             </div>


                            <div class="flex flex-col">
                                <label class="leading-loose">Quantity (ml)</label>
                                <input type="number" name="blood_quantity" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                @error('blood_quantity')<span class="text-xs text-red-600">{{ $message }}</span>@enderror

                            </div>


                            <div class="flex flex-col">
                                <label class="leading-loose">Blood Type</label>
                                <div class="relative focus-within:text-gray-600 text-gray-400">

                                    <select name="blood_type_id" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        <option value="">Select Blood Type</option>
                                        @forelse($blood_type as $blood)
                                        <option value="{{ $blood->id }}">{{ $blood->type_name }}</option>
                                        @empty
                                        <option value="">No Records</option>
                                        @endforelse
                                    </select>

                                </div>
                                @error('blood_type_id')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                            </div>

                           


                        </div>

                    </div>


                    <div class="pt-4 flex items-center">
                        <button type="submit" class="bg-red-600 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none font-bold">Request</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
@endsection
