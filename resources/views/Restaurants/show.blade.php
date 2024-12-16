<x-app-layout>
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
                    <!-- Displays the restaurant details -->
                    <x-restaurant-details
                        :name="$restaurants->name"
                        :image="$restaurants->image"
                        :description="$restaurants->description"
                        :location="$restaurants->location"
                        />
                        <!-- Restaurant Reviews -->
                    
                        <!-- Checks if there are any revies on the restaurant -->
                        <h4 class="font-semibold text-md mt-8">Reviews</h4>
                        @if($restaurants->reviews->isEmpty())
                        <p class="text-grey-600">No reviews yet.</p>
                        @else
                            <ul class="mt-4 space-y-4">
                                <!-- Displays the reviews -->
                                @foreach($restaurants->reviews as $review)
                                    <li class="bg-grey-100 p-4 rounded-lg">
                                        <p class="font-semibold">{{$review->user->name}} ({{$review->created_at->format('M d, Y')}})</p>
                                        <p>Rating: {{$review->rating}} / 5</p>
                                        <p>{{$review->comment}}</p>

                                        @if($review->user->is(auth()->user()) || auth()->user()->role === 'admin')
                                        <!-- Edit Button -->
                                            <a href="{{route('reviews.edit', $review)}}" class="bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                                {{_('Edit Review')}}
                                            </a>

                                            <!-- Delete Button -->
                                            <form method="POST" action="{{route('reviews.destroy', $review)}}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button :hreff="route('reviews.destroy', $review)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{__('Delete Review')}}
                                                </x-danger-button>
                                            </form>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    <!-- Add a new review -->
                    <h4 class="font-semibold text-md mt-8">Add a Review</h4>
                        <form action="{{route('reviews.store', $restaurants)}}" method="POST" class="nt-4">
                            @csrf
                            <div class="mb-4">
                                <!-- rating field -->
                                <label for="rating" class="block font-medium text-sm text-grey-700">Rating</label>
                                <select name="rating" class="mt-1 block w-full" id="rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <!-- Comment field -->
                            <div class="mb-4">
                            <label for="comment" class="block font-medium text-sm text-grey-700">Comment</label>
                            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full" placeholder="Write your review here..."></textarea>
                            </div>
                            
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Review</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>