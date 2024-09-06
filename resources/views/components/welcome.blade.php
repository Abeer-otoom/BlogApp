<div class="p-2 lg:p-8 ">
    {{--  <x-application-logo class="block h-12 w-auto" />  --}}


    {{--  Hello {{ auth()->user()->name }}  --}}




    <section>
        <div class="container ">
            <div class="row d-flex justify-content-center">

                @foreach ( $posts as $post)
                    <div class="col-md-12 col-lg-10 col-xl-8 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-start align-items-center">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="/images/profileImage.png" alt="avatar" width="60"
                                                height="60" />
                                            <div>
                                                <h6 class="fw-bold text-primary mb-1">{{ $post->user->name }}</h6>
                                                <p class="text-muted small mb-0">
                                                    {{ $post->created_at->format('d/m/Y H:i') }}
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class=" text-end">
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical text-primary"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a href="#" class="dropdown-item editPostButton"
                                                            data-id="{{ $post->id }}"
                                                            data-title="{{ $post->title }}"
                                                            data-content="{{ $post->content }}">Edit</a>
                                                    </li>
                                                    <form action="{{ route('posts.destroy', $post->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this?');"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"
                                                            style="border: none; background: none; color: inherit; ">
                                                            Delete
                                                        </button>
                                                    </form>


                                                </ul>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="mt-3 mb-2 pb-2">
                                        <h5>
                                            {{ $post->title }}
                                        </h5>
                                        <p class="mt-1">
                                            {{ $post->content }}
                                        </p>
                                    </div>


                                    <div class="small d-flex justify-content-start">
                                        <a href="#!" class="d-flex align-items-center me-3">
                                            <i class="far fa-thumbs-up me-2"></i>
                                            <p class="mb-0">Like</p>
                                        </a>
                                        <a href="#!" class="d-flex align-items-center me-3">
                                            <i class="far fa-comment-dots me-2"></i>
                                            <p class="mb-0">Comment</p>
                                        </a>
                                        <a href="#!" class="d-flex align-items-center me-3">
                                            <i class="fas fa-share me-2"></i>
                                            <p class="mb-0">Share</p>
                                        </a>
                                    </div>
                                </div>

                                @if (auth()->user()->can('create_comment'))
                                    <div class="card-footer py-2 border-0" style="background-color: #f8f9fa;">
                                        <form method="POST" action="{{ route('comments.store', $post->id) }}"
                                            id="createCommentForm">
                                            @csrf
                                            <div class="d-flex flex-start w-100">
                                                <img class="rounded-circle shadow-1-strong me-3 h-100"
                                                    src="/images/profileImage.png" alt="avatar" width="20"
                                                    height="20" />


                                                <div data-mdb-input-init class="form-outline w-100">
                                                    <textarea name="comment_content" class="form-control" id="commentContent" rows="2" placeholder="Message"
                                                        style="background: #fff;"></textarea>
                                                </div>
                                            </div>
                                            <div class="float-end mt-2 pt-1">
                                                <button type="submit" class="btn btn-primary btn-sm">Post
                                                    comment</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif





                            </div>
                        </div>
                @endforeach

            </div>
        </div>





    </section>




    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="p-2" method="POST" action="{{ route('posts.store') }}" id="createPostForm">
                    @csrf
                    <input type="hidden" id="postId" name="post_id">

                    <div class="modal-body">


                        <div class="form-group">
                            <label for="titleInput">Title:</label>
                            <input name="title" type="text" class="form-control" id="titleInput"
                                placeholder="Enter title">
                        </div>


                        <div class="form-group mt-2">
                            <label for="contentInput">Content:</label>
                            <textarea name='content' class="form-control" id="contentInput" rows="3" placeholder="Enter Content"></textarea>
                        </div>


                    </div>
                    <div>

                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createPostForm').submit(function(event) {
            let isValid = true;

            // Clear previous errors
            $('.error').remove();

            // Validate Title
            if ($('#titleInput').val().trim() === '') {
                $('#titleInput').after(
                    '<div class="error text-danger"> * Title is required.</div>');
                isValid = false;
            }

            // Validate Content
            if ($('#contentInput').val().trim() === '') {
                $('#contentInput').after(
                    '<div class="error text-danger">* Content is required.</div>');
                isValid = false;
            }

            // Prevent form submission if invalid
            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            }
        });


        $('#createCommentForm').submit(function(event) {
            let isValid = true;

            // Clear previous errors
            $('.error').remove();

            // Validate Content
            if ($('#commentContent').val().trim() === '') {
                $('#commentContent').after(
                    '<div class="error text-danger"> * Content is required.</div>');
                isValid = false;
            }



            // Prevent form submission if invalid
            if (!isValid) {
                event.preventDefault();
            }
        });


    });

    document.addEventListener('DOMContentLoaded', function() {
        // Handle create post button click
        const createPostButton = document.getElementById('createPostButton');
        if (createPostButton) {
            createPostButton.addEventListener('click', function() {
                const postForm = document.getElementById('createPostForm');
                if (postForm) {
                    // Reset the form and modal title
                    postForm.reset();
                    document.getElementById('postModalLabel').textContent = 'Create Post';
                    postForm.action = "{{ route('posts.store') }}"; // Route for creating a post
                    document.getElementById('postId').value = ''; // Clear post ID for new posts

                    // Show the modal
                    var postModal = new bootstrap.Modal(document.getElementById('postModal'));
                    postModal.show();
                } else {
                    console.error('Form with id "postForm" not found.');
                }
            });
        }

        // Handle edit post button click
        document.querySelectorAll('.editPostButton').forEach(function(button) {
            button.addEventListener('click', function() {
                const postId = this.dataset.id;
                const postTitle = this.dataset.title;
                const postContent = this.dataset.content;

                const postForm = document.getElementById('createPostForm');
                if (postForm) {
                    // Update the form with the post data
                    document.getElementById('postModalLabel').textContent = 'Edit Post';
                    postForm.action = `{{ url('posts')}}/${postId}`; // Use relative URL for updating
                    //postForm.method = `PUT`;
                    document.getElementById('postId').value = postId;
                    document.getElementById('titleInput').value = postTitle;
                    document.getElementById('contentInput').value = postContent;

                    let methodInput = postForm.querySelector('input[name="_method"]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        postForm.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';


                    // Show the modal
                    var postModal = new bootstrap.Modal(document.getElementById('postModal'));
                    postModal.show();
                } else {
                    console.error('Form with id "postForm" not found.');
                }
            });
        });
    });

</script>
