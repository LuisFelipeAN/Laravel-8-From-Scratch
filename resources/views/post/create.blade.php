<x-layout>
    <section class="py-8  max-w-xl mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel class="bg-gray-50">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Title</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" required value="{{old('title')}}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">Slug</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" required value="{{old('slug')}}">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Thumbnail</label>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail" required value="{{old('thumbnail')}}">
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="exerpt">Exerpt</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="exerpt" id="exerpt" required value="{{old('exerpt')}}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">Body</label>
                    <textarea id="body" name="body" class="w-full text-sm focus:outiline-none focus:ring" id="" cols="30" rows="10" placeholder="Say Something" value="{{old('body')}}" required></textarea>
                    @error('body')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">Category</label>
                    <select name="category_id" id="category_id">
                        @foreach (App\Models\Category::all() as $category )
                            <option 
                            value="{{$category->id}}" 
                            {{old('category_id')==$category->id?'selected':''}}
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
