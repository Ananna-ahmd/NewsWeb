<x-app-layout>
    <div class="mt-16 bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 ml-4">
            <div class="text-xl font-semibold text-gray-800 mb-4"> Post News</div>
            <div class="card-body">

                <form enctype="multipart/form-data" action="{{route('articles.store')}}" method="post" class="h-full flex flex-col justify-between">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">News Title</label>
                        <input type="text" name="title" id="name" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold mb-2"> Description</label>
                        <textarea name="content" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
                        <select name="category_id" id="category_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>News category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="is_highlighted" class="inline-flex items-center">
                            <input type="checkbox" name="is_highlighted" id="is_highlighted" value="1" class="form-checkbox text-green-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" {{ old('is_highlighted') ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700 font-semibold">Highlight this News</span>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="featured_news" class="inline-flex items-center">
                            <input type="checkbox" name="featured_news" id="featured_news" value="1" class="form-checkbox text-green-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" {{ old('featured_news') ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700 font-semibold">Featured News</span>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-semibold mb-2">Upload Image</label>
                        <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        @error('image')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                  

                    <button type="submit" class="w-full bg-yellow-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 mt-4">Save</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
