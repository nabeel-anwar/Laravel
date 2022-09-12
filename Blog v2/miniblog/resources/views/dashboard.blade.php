<x-app-layout>

    @push('script')
        <script>
            $('#create-post').click(function(){
                $('.modal-title').html('Create New Post');
                $('#postId').val('');
                $('#post_form').trigger('reset');
                $('.modal').modal('show');
            });

            $(".submit-button").click(function(event) {
                event.preventDefault();                

                $.ajax({
                    url: '{{ url('/post') }}',
                    type: "POST",
                    data: {
                        postId: $('#postId').val(),
                        postTitle: $('#postTitle').val(),
                        postBody: $('#postBody').val(),
                        _token: window._token
                    },
                    success: function(response, textStatus, xhr) {

                        if (xhr.status === 200) {
                            showTable();

                            $(post_form).trigger('reset');
                            $('.modal').modal('hide');
                        } else if (xhr.status === 422) {
                            alert(response.error);
                        } else {
                            alert('Unknown error :(');
                        }
                    },
                });
            });

            // Updating post
            $('#table-body').on('click', '#edit-post', function () {
                
                let id = $(this).data('id');
                $row = $(this).closest('tr');
                let title = $row.find("td:nth-child(2)").text();
                let body = $row.find("td:nth-child(3)").text();
                
                $('.modal-title').html('Edit Post');
                $('#postId').val(id);
                $('#postTitle').val(title);
                $('#postBody').val(body);
                $('.modal').modal('show');
            });

            // Deleting post
            $('#table-body').on('click', '#delete-post', function () {
                var id = $(this).attr('data-id');
                let mythis = this;

                $.ajax({
                    url : `{{ url('/destroy/${id}') }}`,
                    type : "GET",
                    data : {
                        pid : id
                    },
                    success : function(response, textStatus, xhr) {
                        if(xhr.status === 200) {
                            $(mythis).closest('tr').fadeOut();
                        }
                    },
                });

            });

            function showTable() {
                $.ajax({
                    url: '{{ url('/showtable') }}',
                    type: "GET",

                    success: function(response, textStatus, xhr) {

                        if (xhr.status === 200) {
                            posts = response.post.data;
                            let table = "";
                            posts.forEach(post => {
                                    table += `<tr>
                                        <th>{{ Auth::user()->name }}</th>
                                        <td>${post.title}</td>
                                        <td>${post.body}</td>
                                        <td>
                                            <button id="edit-post" class="btn btn-info"
                                                data-id="${post.id}">Edit</button>
                                            <button id="delete-post" class="btn btn-danger"
                                                data-id="${post.id}">Delete</button>
                                        </td>
                                    </tr>`;
                                });
                            $('#table-body').html(table);
                        }
                    },
                });
            }
        </script>
    @endpush

    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <button type="button" id="create-post" class="btn btn-primary">
                            Create New Post
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="table-post" class="table table-hover bordered caption-top align-middle"
                            style="text-align: center; table-layout:fixed;">
                            <caption>All Post</caption>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Post</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @if (isset($posts[0]))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th>{{ $post->user->name }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->body }}</td>
                                            <td>
                                                <button id="edit-post" class="btn btn-info"
                                                    data-id="{{ $post->id }}">Edit</button>
                                                <button id="delete-post" class="btn btn-danger"
                                                    data-id="{{ $post->id }}">Delete</button>
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
