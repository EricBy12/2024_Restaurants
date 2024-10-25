<x-app-laout>
    <x-slot name="header">
        <h2 class="font-semibold text-1 text-grey-800 leading-tight">
            {{ __('All Restaurants') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hiddent shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4">Restaurant Details</h3>
                    <x-restaurant-details
                        :name="$restaurant->name"
                        :image="$restaurant->image"
                        :description="$restaurant->description"/>
                </div>
            </div>
        </div>
    </div>
</x-app-laout>