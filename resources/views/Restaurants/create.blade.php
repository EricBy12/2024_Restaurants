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