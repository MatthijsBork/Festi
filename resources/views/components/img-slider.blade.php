<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div x-data="imageSlider" class="relative mx-auto w-full overflow-hidden rounded-md bg-gray-100">
    <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
        <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
    </div>

    <button @click="previous()"
        class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
        <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
    </button>

    <button @click="forward()"
        class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
        <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
    </button>

    <div class="relative h-80 mx-auto" style="width: 100%">
        <template x-for="(image, index) in images">
            <div class="text-center" x-show="currentIndex == index + 1"
                x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0">
                <img :src="image" alt="image" class="mx-auto rounded-sm block" />
            </div>
        </template>
    </div>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 1,
            images: [
                @foreach ($festival->images as $image)
                    "{{ asset('/images/festivals/' . $festival->id . '/' . $image->img) }}",
                @endforeach
            ],
            previous() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            forward() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                }
            },
        }));
    });
</script>
