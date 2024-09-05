<x-app-layout>
    {{--  <x-slot name="header" class="h-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
            {{ auth()->user()->name }}
        </h2>


    </x-slot>  --}}

    <div class="py-6" style="background-color: #DCDCDC">



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden  sm:rounded-lg">

            <div class="d-flex">

                @if(auth()->user()->can('create_post') )
                <button type="button" class="btn btn-primary ml-auto " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i> Post
                  </button>
              @endif



            </div>

            {{--  <div class="bg-white ">  --}}
                <x-welcome :posts="$posts"  />
            {{--  </div>  --}}
        </div>
    </div>


</x-app-layout>


