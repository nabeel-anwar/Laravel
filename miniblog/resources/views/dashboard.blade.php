<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover bordered caption-top align-middle" style="text-align: center; table-layout:fixed;">
                            <caption>All Post</caption>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Post</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($posts[0]))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th>{{ $post->user->name }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->body }}</td>
                                            <td>
                                                <a href="{{ url('/update', $post->id) }}"
                                                    class="btn btn-success">Update</a>
                                                <a href="{{ url('/destroy', $post->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach  
                                @else
                                    <tr>
                                        <td colspan="4">You don't have any Post!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
