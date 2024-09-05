<div class="p-2 lg:p-8 ">
    {{--  <x-application-logo class="block h-12 w-auto" />  --}}


    {{--  Hello {{ auth()->user()->name }}  --}}





    <section>
        <div class="container ">
            <div class="row d-flex justify-content-center">

                @foreach ($posts as $post)
                    <div class="col-md-12 col-lg-10 col-xl-8 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">
                                    <img class="rounded-circle shadow-1-strong me-3" src="/images/profileImage.png"
                                        alt="avatar" width="60" height="60" />
                                    <div>
                                        <h6 class="fw-bold text-primary mb-1">{{ $post->user->name }}</h6>
                                        <p class="text-muted small mb-0">
                                           {{ $post->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-3 mb-2 pb-2">
                                    <h5 >
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
                            <div class="card-footer py-2 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3 h-100"
                                        src="/images/profileImage.png" alt="avatar" width="20" height="20" />
                                    <div data-mdb-input-init class="form-outline w-100">
                                        <textarea class="form-control" id="textAreaExample" rows="2" placeholder="Message" style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample"></label>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-sm">Post comment</button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-outline-primary btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>





    </section>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="p-2" method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title:</label>
                            <input name="title" type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter title">
                        </div>


                        <div class="form-group mt-2">
                            <label for="exampleFormControlTextarea1">Content:</label>
                            <textarea name='content' class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Enter Content"></textarea>
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
        $('form').submit(function(event) {
            let isValid = true;

            // Clear previous errors
            $('.error').remove();

            // Validate Title
            if ($('#exampleFormControlInput1').val().trim() === '') {
                $('#exampleFormControlInput1').after(
                    '<div class="error text-danger"> * Title is required.</div>');
                isValid = false;
            }

            // Validate Content
            if ($('#exampleFormControlTextarea1').val().trim() === '') {
                $('#exampleFormControlTextarea1').after(
                    '<div class="error text-danger">* Content is required.</div>');
                isValid = false;
            }

            // Prevent form submission if invalid
            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            }
        });
    });
</script>
