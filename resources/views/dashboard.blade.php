<x-app-layout>

    <div class="py-6" style="background-color: #f5f7f8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden  sm:rounded-lg">

            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-circle-check me-2 text-success"></i>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-circle-check me-2 text-danger"></i>
                    <div>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="d-flex">
                @if (auth()->user()->can('create_post'))
                    <button type="button" class="btn btn-primary ml-auto " data-bs-toggle="modal" id="createPostButton"
                        data-bs-target="#postModal">
                        <i class="fa-solid fa-plus"></i> Post
                    </button>
                @endif
            </div>
            <x-welcome :posts="$posts" />
        </div>
    </div>
</x-app-layout>
