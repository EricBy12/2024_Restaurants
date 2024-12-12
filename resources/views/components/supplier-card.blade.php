@props(['name', 'email', 'phone'])
<div class=""> <!-- class contents removed and put into index -->
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <p class="text-grey-600">Email: {{ $email }}</p>
    <p class="text-grey-800 mt-4">Phone Number: {{ $phone }}</p>
</div>