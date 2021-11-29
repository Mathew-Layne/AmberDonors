<div>
    <div class="mt-40 w-9/12 mx-auto">

        <div class="text-gray-700 text-3xl font-medium">
            <h3>Blood Search</h3>
        </div>

        

        <div class="md:px-2 py-8">
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Donation Camp</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Address</th>

                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Phone Number</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Blood Type</th>

                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Available Units (ml)</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @forelse($bloodsearch as $blood)

                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Hospital Name</span>{{
                                $blood->camp->branch_name }}</td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Date of Request</span>{{
                                $blood->camp->branch_address }}</td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Status</span>{{ $blood->camp->branch_phoneNo }}
                            </td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Blood Type</span>{{
                                $blood->donor->bloodType->type_name }}</td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Units (ml)</span>{{
                                $blood->blood_quantity
                                }}
                            </td>



                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No records</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>