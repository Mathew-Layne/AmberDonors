@extends('dash.recipient')
@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Pending Request</h3>

    <div class="mt-8">
        <button class="bg-red-500 p-4 rounded-md text-white font-semibold"><a href=" {{ route('hospitalRequest') }}">Request Blood</a></button>


    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Date Requested</th>
                            <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Blood Type</th>
                            <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Units (ml)</th>
                            <th class="bg-red-500 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Status</th>


                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @forelse($request as $requests)
                        <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Full
                                    Date Requested</span>{{ $requests->date_requested }}</td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Blood Type</span>{{ $requests->bloodType->type_name }}</td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Units (ml)</span>{{ $requests->quantity }}</td>


                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Status</span>
                                {{ $requests->status }}
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No Records</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection
