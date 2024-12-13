<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-1 text-grey-800 leading-tight">
            {{ __('All Suppliers') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hiddent shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4">Supplier Details</h3>
                    <!-- Displays the supplier details -->
                    <x-supplier-details
                        :name="$supplier->name"
                        :email="$supplier->email"        
                        :phone="$supplier->phone"
                        />

                        <h3 class="font-semibold text-lg mb-4">Restaurants Supplied</h3>
                        
                        @foreach($supplier->restaurants as $restaurant)
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

                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>