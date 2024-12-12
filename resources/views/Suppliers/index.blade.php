<div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ __('All suppliers') }}
        </h2>
    </x-slot>
    <!-- Component for displaying success message -->
    <x-alert-success>
        {{session('success')}}
    </x-alert-success>
    
    <div class="py-12">
        <!-- Defines the layout and adds background and shadow effects -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4"> List of suppliers:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Loops through each of the supplier records and displays them in a list -->
                        @foreach($suppliers as $supplier)
                        <div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300"> <!-- class taken from supplier-card -->
                            <a href="{{ route('suppliers.show', $supplier )}}">
                                <!-- supplier Card -->
                                <x-supplier-card
                                    :name="$supplier->name"
                                    :email="$supplier->email"
                                    :phone="$supplier->phone"
                                />
                            </a>
                                <!-- Buttons for edit and delete -->
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit button -->
                                <a href="{{route('suppliers.edit', $supplier)}}" class="text-grey-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{route('suppliers.destroy', $supplier)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-grey-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
