<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ __('All Restaurants') }}
        </h2>
    </x-slot>
    <x-alert-success>
        {{session('success')}}
    </x-alert-success>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4"> List of Restaurants:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($restaurants as $restaurant)
                        <div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300"> <!-- class taken from restaurant-card -->
                            <a href="{{ route('restaurants.show', $restaurant )}}">
                                <!-- Restaurant Card -->
                                <x-restaurant-card
                                    :name="$restaurant->name"
                                    :image="$restaurant->image"
                                    :description="$restaurant->description"
                                    :location="$restaurant->location"
                                />
                            </a>
                                <!-- Buttons -->
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit button -->
                                <a href="{{route('restaurants.edit', $restaurant)}}" class="text-grey-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{route('restaurants.destroy', $restaurant)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this restaurant?');">
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