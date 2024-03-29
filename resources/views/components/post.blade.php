@props(['post'=> $post])
<div class="mb-4">
    <a href="{{route('users.posts',$post->user->username)}}" class="font-bold">{{$post->user->name}}</a> <span class="text-gray-600 text-sm float-end">{{$post->created_at->diffForHumans()}}</span>

    <p class="mb-2">{{$post->body}}</p>
</div>


@can('delete',$post)
    <form action="{{route('posts.destroy',$post)}}" method="post">
        @csrf
        @method('delete')
        <button class="text-blue-500">Delete</button>
    </form>
@endcan


<div class="flex items-center">

    @auth
        @if(!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes',$post->id)}}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>

        @else
            <form action="{{route('posts.likes',$post->id)}}" method="post" class="mr-1">
                @method('delete')
                @csrf
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
        @endif


    @endauth

    <span>{{$post->likes->count()}} {{Str::plural('like',
                            $post->likes->count())}}</span>
</div>