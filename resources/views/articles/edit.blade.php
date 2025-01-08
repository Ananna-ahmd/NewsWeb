<x-app-layout>
    <div class="mt-4 bg-white p-6 rounded-lg shadow-md">
        <div class="bg-gray-100 p-4 border-b border-gray-300">
            <h2 class="text-xl font-semibold text-gray-800">Edit Article</h2>
        </div>
        <div class="card-body mt-4">
            <form action="{{ url('articles/' . $articles->id) }}" method="post">
                @csrf
                @method('PATCH')

                <!-- Title Field -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title', $articles->title) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                        placeholder="Enter article title"
                    >
                    @error('title')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content Field -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea 
                        name="content" 
                        id="content" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" 
                        rows="6"
                        placeholder="Write article content">{{ old('content', $articles->content) }}</textarea>
                    @error('content')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                        <label for="is_highlighted" class="inline-flex items-center">
                            <input type="checkbox" name="is_highlighted" id="is_highlighted" value="1" class="form-checkbox text-green-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" {{ old('is_highlighted') ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700 font-semibold">Highlight this News</span>
                        </label>
                    </div>

                <!-- Buttons -->
                <div class="mt-6 flex items-center space-x-4">
                    <button 
                        type="submit" 
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-green-400"
                    >
                        Update
                    </button>
                    <a 
                        href="{{ url('articles') }}" 
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-gray-400"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
