<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($cards as $card)
        <div class="p-4 bg-white rounded-lg shadow-md {{ $card['color'] }}">
            <div class="flex items-center">
                <div class="mr-4">
                    <i class="{{ $card['icon'] }} text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">{{ $card['title'] }}</h3>
                    <p class="text-xl">{{ $card['count'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>