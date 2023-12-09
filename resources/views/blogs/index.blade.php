
<x-layout>
    <x-hero></x-hero>
    <!-- blogs section -->
    <x-blog-section
    :blogs="$blogs"
    :currentCategory="$currentCategory ?? null">
    </x-blog-section>
    <!-- subscribe new blogs -->
    <x-subscribe></x-subscribe>
</x-layout>
