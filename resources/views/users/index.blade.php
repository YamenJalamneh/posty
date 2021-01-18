@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class="w-6/12 bg-white p-6 rounded-lg">

            <div>
                <h1 class="text-lg font-medium mb-6">{{$user->name}}'s posts {{$posts->count()}}</h1>
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="mb-4">
                            <div>
                                <span class="font-bold">{{$post->user->name}}</span><span class="text-gray-600 text-sm">
                                    {{$post->created_at->diffForHumans()}}</span>
                            </div>

                            <p class="mb-2">
                                {{$post->body}}
                            </p>

                            @can('delete',$post)
                                <form action="{{route('posts.destroy',$post->id)}}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500 p-1 rounded">Delete</button>
                                </form>
                            @endcan
                        </div>
                    @endforeach

                    {{$posts->links()}}
                @else
                    <p>There are no posts</p>
                @endif
            </div>
        </div>
    </div>

@endsection
