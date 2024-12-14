@props(['action', 'method', 'restaurant', 'review'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === "PUT" || $method === 'PATCH')
        @method($method)
    @endif
    <div class="mb-4">
        <!-- dropdown with 1-5 -->
        <label for="rating" class="block text-sm font-medium"></label>
        <select type="select" name="rating" id="rating" value="{{old('rating'), $review->rating ?? ''}}" required class="mt-1 block w-full border-grey-300 rounded-md shadow-sm focus:ring-indigo-500 focu:border-indigo-500">>
           
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            
        </select>
        @error('rating')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="comment" class="block text-sm font-medium"></label>
        <input 
            type="text"
            name="comment"
            id="comment"
            value="{{ old('comment'), $review->comment ?? ''}}"
            required
            class="mt-1 block w-full border-grey-300 rounded-md shadow-sm focus:ring-indigo-500 focu:border-indigo-500"
        />
        @error('comment')
            <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>
    <!-- Button -->
    <x-primary-button>
        {{isset($review) ? 'Update Review' : 'Save Review'}}
    </x-primary-button>
</form>