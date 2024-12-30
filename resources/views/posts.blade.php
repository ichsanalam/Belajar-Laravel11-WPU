<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    @foreach ($posts as $post)
    <article class="max-w-screen-md py-8 border-b border-gray-300">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl font-bold tracking-tight text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div class="text-base text-gray-500">
            <a href="/author/{{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a> | <a href="/category/{{ $post->category->slug }}" class="hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->toDayDateTimeString() }}
        </div>
        <p class="my-4 font-light">
            {{ Str::limit($post['body'], 100) }}
        </p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline" >Read More &raquo;</a>
    </article>
    @endforeach
</x-layout>