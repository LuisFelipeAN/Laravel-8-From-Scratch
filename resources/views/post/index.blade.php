<x-layout>
    <!--
    @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{$post->id}}">{{$post->title}}</a> </h1>
            <p>  By <a href="/authors/{{$post->author->username}}"> {{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
            <div>
                {{$post->exerpt}}
            </div>
        </article>
    @endforeach
    -->
        @include('post._header')
   

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
               <x-posts-grid :posts="$posts"/>
               {{$posts->links()}}
            @else
                <p class="text-center">No posts yet. Please check latter</p>
            @endif
           
        </main>

</x-layout>
