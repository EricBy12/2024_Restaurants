<div>
    <!-- Defines the props -->
@props(['action', 'method', 'supplier'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Checks for the method. POST for creating/PUT for updating-->
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- input field for supplier name -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-grey-700">Name</label>
        <input 
            type="text"
            name="name"
            id="name"
            value="{{old('name', $supplier->name ?? '')}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('name')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <!-- input field for supplier email -->
    <div class="mb-4">
        <label for="email" class="block text-sm text-grey-700">email</label>
        <input 
            type="text"
            name="email"
            id="email"
            value="{{old('email', $supplier->email ?? '')}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('email')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <!-- input field for supplier phone -->
    <div class="mb-4">
        <label for="phone" class="block text-sm text-grey-700">Phone</label>
        <input 
            type="text"
            name="phone"
            id="phone"
            value="{{old('phone', $supplier->phone ?? '')}}"
            required
            class="mt-1 block w-full border grey-300 rounded mid shadow-sm/">
            @error('phone')
            <p class="text-sm 600">{{ $message }}</p>
            @enderror
    </div>

    <div>

    <!-- Button to Add or update supplier record -->
    <x-primary-button>
        {{isset($supplier)? 'Update Supplier':'Add Supplier'}}
    </x-primary-button>
    </div>
</form>
</div>