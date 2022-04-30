@auth
<x-panel>
    <form action="/posts/{{$post->slug}}/comments" method="POST">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
            Whant to participate?
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outiline-none focus:ring" id="" cols="30" rows="10" placeholder="Say Something" required></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
        </div>
        <x-submit-button>Post</x-submit-button>
    </form>
</x-panel> 
@else
<p class="font-semibold">
    <a class="hover:underline" href="/register"> Register </a> or <a class="hover:underline"  href="/login"> Log in</a> to leave a comment Comment! 
</p>

@endauth