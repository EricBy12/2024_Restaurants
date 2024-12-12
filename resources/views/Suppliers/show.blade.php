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
                        :name="$suppliers->name"
                        :email="$suppliers->email"        
                        :phone="$suppliers->phone"
                        />
                        
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>