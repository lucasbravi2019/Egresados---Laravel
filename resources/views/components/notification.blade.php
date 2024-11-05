@if (session('success'))
    <div id="notification" class="fixed top-5 right-5 z-50 bg-green-500 text-white p-4 py-2 rounded shadow-lg transition-opacity duration-500 opacity-100 bg-green-500">
        {{ session('success') }}
    </div>
@elseif (session('error'))
    <div id="notification" class="fixed top-5 right-5 z-50 bg-green-500 text-white p-4 py-2 rounded shadow-lg transition-opacity duration-500 opacity-100 bg-red-500">
        {{ session('error') }}
    </div>
@endif
