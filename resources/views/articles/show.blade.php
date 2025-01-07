<x-app-layout>
    <div class="mt-4 bg-white p-6 rounded-lg shadow-md">
        <div class="border-b pb-4">
            <div class="text-2xl font-semibold">
                <h2>Article Details</h2>
            </div>
            <div class="card-body">
                <h5 class="text-xl font-semibold">Title: {{ $articles->title }}</h5>
                <p class="text-base text-gray-700"><strong>Content:</strong> {{ $articles->content }}</p>
                <p class="card-text"><strong>Author:</strong> {{ $articles->author->name ?? 'Unknown' }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $articles->category->name ?? 'Uncategorized' }}</p>
                <p class="card-text"><strong>Status:</strong> {{ ucfirst($articles->status) }}</p>
                <p class="card-text"><strong>Published At:</strong> {{ $articles->published_at ? $articles->published_at->format('F d, Y') : 'Not Published' }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-b-lg">
                <a href="{{ url('articles') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Back to Articles</a>
                <a href="{{ url('articles/' . $articles->id . '/edit') }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">Edit</a>
                <form action="{{ url('articles/' . $articles->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400" onclick="return confirm('Are you sure you want to delete this article?');">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
