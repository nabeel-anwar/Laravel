<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card border-dark">
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <div class="card-header bg-light">Mini Blog in Laravel</div>
                        <!-- Card Header -->
                        <div class="card-body">
                            <h4 class="card-title">Create Your Post</h4>
                            <div class="row">
                                <div class="col">
                                    <label for="postTitle" class="form-label">Title</label>
                                    <input type="text" name="postTitle" id="postTitle" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="postBody" class="form-label">Content</label>
                                    <textarea class="form-control" id="postBody" rows="3" name="postBody"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->

                        <div class="card-footer bg-light">
                            <input type="submit" value="Submit" class="btn btn-primary">
                            <span style="color: red">
                                @error('postTitle')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Card Footer -->
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }};
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
