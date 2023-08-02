<x-layout>

    <!-- this is way number 2 -->
    <!-- instead of ?php foreach ($posts as $post) : ?> do -->
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                <!-- ?= $post->title;? -->
                    {{$post->title}}
                </a>
            </h1>

            <div>
                {{$post->excerpt}}
            </div>

        </article>
    @endforeach

</x-layout>