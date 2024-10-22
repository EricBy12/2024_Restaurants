@props(['name', 'description', 'location', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{asset( 'images/restaurants/' . $image)}}" alt="{{ $name }}">
    <p class="text-grey-600">({{ $description }})</p>
    <p class="text-grey-800 mt-4">{{ $location }}</p>
</div>