<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- <article class="max-w-screen-md py-8">
            <h2 class="mb-1 text-3xl font-bold tracking-tight text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/author/{{ $post->author->id }}" class="hover:underline">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            {{ $post['body'], 100 }}
        </p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline" >Back &laquo;</a>
    </article> --}}

    <main class="pt-8 pb-16 antialiased bg-white lg:pt-16 lg:pb-24 dark:bg-gray-900">
        <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
            <article
                class="w-full max-w-4xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="w-16 h-16 mr-4 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                            <div>
                                <a href="/author/{{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white hover:underline">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400"> {{ $post->created_at->diffForHumans() }} </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post['title'] }}</h1>
                </header>
                <p>{{ $post['body']}}</p>
            </article>
        </div>
    </main>
</x-layout>
