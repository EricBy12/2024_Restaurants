@props(['name', 'email', 'phone'])

<!-- styles the view page -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <!-- Displays supplier name -->
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{$name}}</h1>

    <!-- Dispalys Supplier email -->
    <h2 class="text-grey-500 text-sm italic mb-4" style="font-size: 1rem;">Email: {{ $email }}</h2>

    <!-- Displays Supplier phone number -->
    <h2 class="text-grey-500 text-sm italic mb-4" style="font-size: 1rem;">Phone Number: {{ $phone }}</h2>

</div>
