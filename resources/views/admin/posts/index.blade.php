<x-layout>
    <x-setting heading="Publish New Post">
    <div class="bg-gray-50 min-h-screen">
        <div>
            <div class="p-4">
            <div class="bg-white p-4 rounded-md">
                <div>
                <div>
                    <div>
                        <div>
                                <table>
                                    <tbody >
                                         @foreach ($posts as $post )
                                            <tr>
                                                <td>
                                                <a href="/posts/{{$post->slug}}" class="text-bg-500 hover:text-bg-600">{{$post->title}}</a>
                                                </td>
                                                <td>
                                                    <a href="/admin/posts/{{$post->id}}/edit" class="text-bg-500 hover:text-bg-600">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="/admin/posts/{{$post->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </x-setting>
</x-layout>
