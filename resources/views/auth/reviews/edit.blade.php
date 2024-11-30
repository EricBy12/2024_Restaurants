<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-1 text-grey-800 leeding-tight">
            {{__('Edit Review')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold ext-lg mb-4">Edit Review:</h3>

                    <x-review-form
                        :action="route('reviews.update'), $review"
                        :method="'PUT'"
                        :review="$review"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>