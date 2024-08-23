@extends('layouts.admin-layout')
@section('content')
    <div class="flex justify-between">
        <x-admin-header title="Users"/>
        <x-admin-create-btn url="something" title="Create User" />
    </div>
    <!--End of modal-->
        
        <div class="h-auto mt-8 border-gray border rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                            <div class="flex items-center gap-x-3">
                                <input type="checkbox" class="text-blue-500 border-gray-300 rounded">
                                <button class="flex items-center gap-x-2">
                                    <span>ID</span>
                                </button>
                            </div>
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Name
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Email
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Phone Number
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Status
                        </th>

                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <div class="inline-flex items-center gap-x-3">
                                    <input type="checkbox" class="text-blue-500 border-gray-300 rounded">

                                    <span>Something</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap font-medium">Some Name</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                Some Email
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <div class="flex items-center gap-x-2">
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-800 ">Some Phone Number</h2>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap" >
                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                    <h2 class="text-sm font-normal">Active</h2>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center gap-x-6">
                                    <button onclick="console.log('something happens')" class="text-blue-400 transition-colors duration-200 hover:text-indigo-300 focus:outline-none">
                                        Edit
                                    </button>

                                    <button class="text-red-500 transition-colors duration-200 hover:text-red-300 focus:outline-none">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between mt-6">
            <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>

                <span>
                    previous
                </span>
            </a>

            <div class="items-center hidden md:flex gap-x-3">
                <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md bg-blue-100/60">1</a>
                <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">2</a>
                <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">3</a>
                <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">...</a>
                <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">12</a>
                <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">13</a>
                <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">14</a>
            </div>

            <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 ">
                <span>
                    Next
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
</div>
<script>
    function deleteMember(id){
        let url = "/admin/memberaccounts/delete/"+id;
        window.location.href=url;
    }
</script>
@endsection