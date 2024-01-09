<x-show-layout>
    @csrf

    <div class="p-2">

        <div class="flex md:flex-row w-full flex-col-reverse">
            <div class="flex md:flex-row flex-col w-full">
                <div class="md:w-1/2 flex flex-col justify-evenly gap-5">
                    <x-img-slider :house="$house"></x-img-slider>
                    <div class="hidden sm:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($house->images as $index => $image)
                            <div class="relative group cursor-pointer">
                                <img src="{{ asset('images/houses/' . $house->id . '/' . $image->img) }}"
                                    alt="Image {{ $index }}"
                                    class="w-full h-40 object-cover rounded-md transition duration-300 transform hover:scale-105">
                                <div class="hidden group-hover:flex fixed bottom-0">
                                    <img src="{{ asset('images/houses/' . $house->id . '/' . $image->img) }}"
                                        alt="Image {{ $index }}" class="rounded-xl shadow ">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr class="my-3">

                    <div class="pr-10">
                        <h2 class="text-xl font-semibold">Reageren op deze woning</h2>
                        <x-respond-form :house="$house"></x-respond-form>
                    </div>
                </div>
                <div class="flex md:flex-row flex-col md:w-1/2 justify-between">
                    <div class="w-full flex flex-col gap-5 px-4 justify-between">
                        <div>
                            <h2 class="text-3xl font-semibold">
                                {{ $house->address }}
                                <br>
                                {{ $house->postal_code . ', ' . $house->city }}
                            </h2>
                            <hr class="my-3">
                            <h2 class="text-xl font-semibold">€{{ $house->rent }} / maand</h2>
                            <hr class="my-3">
                            <p>{{ $house->rooms }} kamers</p>
                            <hr class="my-3">
                            <p>
                                @if ($house->acceptedResponse() != null)
                                    <p class="text-red-500">Woning is momenteel bezet tot
                                        {{ $house->acceptedResponse()->end_date }}</p>
                                @else
                                    <p class="text-green-500">Woning is beschikbaar</p>
                                @endif
                            </p>
                            <hr class="my-3">
                            <p class="pt-5 text-xl">
                                <x-input-label>Beschrijving</x-input-label>
                                {!! $house->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-show-layout>
