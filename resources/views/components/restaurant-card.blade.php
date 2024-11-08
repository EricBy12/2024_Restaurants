@props(['name', 'description', 'location', 'image'])
<div class=""> <!-- class contents removed and put into index -->
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{asset( 'images/restaurants/' . $image)}}" alt="{{ $name }}">
    <p class="text-grey-600">({{ $description }})</p>
    <p class="text-grey-800 mt-4">{{ $location }}</p>
</div>