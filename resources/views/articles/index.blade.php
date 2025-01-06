<x-app-layout>
    <div class="mt-16 bg-white shadow-lg rounded-lg p-6">
        <div class="text-xl font-semibold text-gray-800 mb-4">
            <h2>Articles Table</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/articles/create') }}" class="bg-green-500 text-white text-sm font-semibold py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400" title="Add New Article">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br/>
            <br/>
            <div class="overflow-x-auto w-full flex justify-center">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Published At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ Str::limit($article->content, 50) }}</td>
                                <td>{{ optional($article->author)->name ?? 'N/A' }}</td>
                                <td>{{ optional($article->category)->name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($article->status) }}</td>
                                <td>{{ $article->published_at ? $article->published_at->format('d-m-Y H:i') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ url('/articles/' . $article->id) }}" title="View Article">
                                        <button class="bg-blue-500 text-black text-sm py-1 px-3 rounded-md hover:bg-violet-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </button>
                                    </a>
                                    <a href="{{ url('/articles/' . $article->id . '/edit') }}" title="Edit Article">
                                        <button class="bg-yellow-500 text-black text-sm py-1 px-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mr-1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ url('/articles/' . $article->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="bg-red-500 text-black text-sm py-1 px-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mr-1" title="Delete Article" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
