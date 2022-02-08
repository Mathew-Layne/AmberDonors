@extends('dash.recipient')
@section('content')

<div class="mt-4">
    <div class="flex flex-wrap justify-center -mx-6">
        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
            <div class="flex items-center px-5 py-7 shadow-sm rounded-md bg-white">
                <div class="p-5 rounded-full bg-red-600 ">
                    <i class="far fa-hand-holding-medical text-white text-2xl"></i>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700"></h4>
                    <div class="text-gray-500">Total Requests</div>
                     <strong>{{ $requestAll }}</strong>

                </div>
            </div>
        </div>

        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
            <div class="flex items-center px-5 py-7 shadow-sm rounded-md bg-white">
                <div class="p-5 rounded-full bg-red-600 ">
                    <i class="far fa-hand-holding-medical text-white text-2xl"></i>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700"></h4>
                    <div class="text-gray-500">Approved Requests </div>
                   <strong>{{ $approved }}</strong>


                </div>
            </div>
        </div>

        

        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
            <div class="flex items-center px-5 py-7 shadow-sm rounded-md bg-white">
                <div class="p-5 rounded-full bg-red-600 ">
                    <i class="far fa-hand-holding-medical text-white text-2xl"></i>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700"></h4>
                    <div class="text-gray-500">Rejected Requests</div>
                    <strong>{{ $rejected }}</strong>


                </div>
            </div>
        </div>



    </div>
</div>

@endsection