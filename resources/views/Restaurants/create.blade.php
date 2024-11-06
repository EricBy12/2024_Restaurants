@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($mwthod === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="title" class="block text-sm text-grey-700">Title</label>
        <input 
            type="text"
            name="title"
            id="title"
            value="{{old('title', $restaurant-title ??)}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('title')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm fon-medium text-grey-700">Restarant Image</label>
        <input type="file"
        name="image"
        id="image"
        {{ isset($restaurants)? ": 'required' }}
        class="mt-1 block w-full border-grey-300 rounded-md-shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
        <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    @isset($restaurants->image)
    <div class="mb-4">
        <img scr="{{asset($restaurants->image) }}" alt="Restaurant Image" class="w-24 h-32 object-cover">
    </div>
    @endisset

    <div>

    <x-primary-button>
        {{isset($restaurants)? 'Update Restaurant':'Add Restaurant'}}
    </x-primary-button>
    </div>
</form>

<!-- is this all in the wrong place? ^^^ -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-grey-800 leading-tight">
            {{ __('Create New Restaurant')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4">Add New Restaurant:</h3>
                    <x-restaurant-form
                    :action="route('restaurants.store')"
                    :method="''POST"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>