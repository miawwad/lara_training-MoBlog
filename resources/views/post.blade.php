<!-- we don't necesseraly need to put blade in the name, but we should as it is a laravel template
 -->
<x-layout>

<article>
       <h1>
        <!-- ?= $post->title;?> this is the short hand of echo-ing the title 
    it can aslo be written as {{$post->title}} which is a blade extension only-->
    {!! $post->title !!}
    </h1>

            <p>
               By <a href="#">{{$post->user->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>

       <div>
        <!-- {{$post->body}} like this it is being escaped we want it treated like html so we do -->
        {!! $post->body !!}
    </div>
    </article>
    
    <a href="/">Go Back</a>

</x-layout>
<!-- always work with layout files like dis, more effeciant and stuff -->
<!-- a second way would be by using the blade components -->
