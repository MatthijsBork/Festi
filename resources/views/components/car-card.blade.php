<div class="rounded-lg">
    <div class="justify-between p-3 mb-6 bg-white rounded-lg shadow sm:flex sm:justify-start">
        <img src="{{ asset('images/cars/' . $car->id . '/' . $car->images->first()->img) }}"
            class="object-cover overflow-hidden rounded-lg sm:w-72 sm:h-32" />
        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between my-auto overflow-hidden">
            <div class="mt-5 sm:mt-0 truncate">
                <h2 class="text-lg font-bold text-gray-900"><a
                        href="{{ route('cars.show', compact('car')) }}">{{ $car->title }}</a>
                </h2>
                {!! $car->description !!}
                <p class="text-gray-500 pr-1"><i>{{ $car->year }} | {{ $car->mileage }} km</i></p>
            </div>
            <div class="flex mt-4 sm:mt-0 sm:block">
                <div class="flex items-center">
                    <p class="font-bold">€{{ $car->price }}
                </div>
                <div class="flex items-center border-gray-100">
                    <x-primary-link href="{{ route('cars.show', compact('car')) }}">Bekijken</x-primary-link>
                </div>
            </div>
        </div>
    </div>
</div>
