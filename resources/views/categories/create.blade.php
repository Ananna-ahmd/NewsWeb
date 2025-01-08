<x-app-layout>
    <div class="mt-16 bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 ml-4">
            <div class="text-xl font-semibold text-gray-800 mb-4">Create  Category</div>
            <div class="card-body">

                <form action="{{route('categories.store')}}" method="post" class="h-full flex flex-col justify-between">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Category Name</label>
                        <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold mb-2"> Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    </div>

                    <button type="submit" class="w-full bg-yellow-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 mt-4">Save</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
