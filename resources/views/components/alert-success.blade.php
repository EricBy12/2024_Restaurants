<div>
    <!-- Dispalys success message -->
    @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-500 text-green-700 rounded-md">
        {{$slot}}
    </div>
    @endif

    <!-- Displays error message -->
    @if(session('error'))
    <div class="bg-red-500 bg-orange-300 py-2 mb-4 px-4 py-2 border rounded-md">
        {{ session('error') }}
    </div>
    @endif
</div>
