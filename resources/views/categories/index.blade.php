<x-app-layout>
    <div class="mt-16 bg-white shadow-lg rounded-lg p-6">
        <div class="text-xl font-semibold text-gray-800 mb-4">
            <h2>All Categories</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/categories/create') }}" class="bg-green-500 text-white text-sm font-semibold py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400" title="Add Category">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br/>
            <br/>
            <div class="overflow-x-auto w-full flex justify-center">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 50) }}</td>
                                <td>
                                    <a href="{{ url('/categories/' . $category->id) }}" title="View Category">
                                        <button class="bg-blue-500 text-black text-sm py-1 px-3 rounded-md hover:bg-violet-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </button>
                                    </a>
                                    <a href="{{ url('/categories/' . $category->id . '/edit') }}" title="Edit Category">
                                        <button class="bg-yellow-500 text-black text-sm py-1 px-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mr-1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ url('/categories/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="bg-red-500 text-black text-sm py-1 px-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mr-1" title="Delete Category" onclick="return confirm('Confirm delete?')">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
