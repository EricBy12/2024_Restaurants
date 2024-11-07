@props(['action', 'method', 'restaurant'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm text-grey-700">Name</label>
        <input 
            type="text"
            name="name"
            id="name"
            value="{{old('name', $restaurant->name ?? '')}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('name')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm text-grey-700">Description</label>
        <input 
            type="text"
            name="description"
            id="description"
            value="{{old('description', $restaurant->description ?? '')}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('description')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label for="location" class="block text-sm text-grey-700">Location</label>
        <input 
            type="text"
            name="location"
            id="location"
            value="{{old('location', $restaurant->location ?? '')}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('location')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm fon-medium text-grey-700">Restaurant Image</label>
        <input type="file"
        name="image"
        id="image"
        {{ isset($restaurant) ? '' : 'required' }}
        class="mt-1 block w-full border-grey-300 rounded-md-shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
        <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    @isset($restaurants->image)
    <div class="mb-4">
        <img src="{{asset($restaurants->image) }}" alt="Restaurant Image" class="w-24 h-32 object-cover">
    </div>
    @endisset

    <div>

    <x-primary-button>
        {{isset($restaurants)? 'Update Restaurant':'Add Restaurant'}}
    </x-primary-button>
    </div>
</form>
