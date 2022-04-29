<x-drop-down>
    <x-drop-down-item href="/" :active="request()->routeIs('home')"> All</x-drop-down-item>
    @foreach ($categories as $category )
        <x-drop-down-item href="/?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}" 
        :active="isset($currentCategory)&&$currentCategory->is($category)">
            {{$category->name}}</x-drop-down-item>
    @endforeach

    <x-slot name="trigger">
        <button  class="bg-transparent py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory)?$currentCategory->name:"Categories"}}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>
</x-drop-down>