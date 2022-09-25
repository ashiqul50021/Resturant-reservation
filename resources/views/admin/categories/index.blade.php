<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p2">
                <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Category</a>
            </div>

            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Image
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6">
                                edit
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($categories as $category)
                       <tr class="bg-white border-b">
                        <td scope="row" class="py-4 px-6 font-medium  whitespace-nowrap">
                            {{ $category->name }}
                        </td>
                        <td scope="row" class="py-4 px-6 font-medium  whitespace-nowrap">
                            <img src="{{ Storage::url($category->image) }}" alt="image" class="w-16 h-16 rounded">
                        </td>
                        <td scope="row" class="py-4 px-6 font-medium  whitespace-nowrap">
                            {{ $category->description }}
                        </td>
                        <td scope="row" class="py-4 px-6 font-medium  whitespace-nowrap">
                         <div class="flex space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class=" ml-2 px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="POST" onsubmit="return confirm('Are you sure?');">
                         @csrf
                         @method('DELETE')
                         <button type="submit">Delete</button>
                         </form>
                         </div>
                        </td>
                       
                    </tr>
                       @endforeach
                       
                    </tbody>
                </table>
            </div>
            

        </div>
    </div>
</x-app-layout>
