<x-layout>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-featured-card :post="$posts[0]" />

            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($posts->skip(1) as $post)
                            <div class="{{$loop->iteration < 3? 'col-span-3': 'col-span-2'}}">
                            @include('components.post-card')
                            </div>
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif

    </main>

    {{-- this is way number 2
     instead of ?php foreach ($posts as $post) : ?> do 
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                 ?= $post->title;? 
                    {!! $post->title !!}
                </a>
            </h1>

                <p>
               By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                </p>

            <div>
                {!! $post->excerpt !!}
            </div>

        </article>
    @endforeach --}}

</x-layout>
