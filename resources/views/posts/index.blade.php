@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf                
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Post Something about attendance!"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded 
                    font-medium">Post</button>
                </div>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                    
                        <a href="{{ route('user.posts', $post->user->username) }}" class="font-bold">{{ $post->user->name }}</a> 
                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <p class="mb-2">{{ $post->body }}</p>

                        <div class="flex items-center">
                            {{-- The second parameter here is referencing to the value in the 'id' in 'web.php' file --}}
                            
                            
                            @auth {{-- auth here means only a logged in user can like and unlike a post --}}
                            
                                @if (! $post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post->id) }}" 
                                        method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Unlike</button>
                                    </form>
                                @endif

                            @endauth

                            @if ($post->likes->count())
                                <span>{{ $post->likes->count() }} {{ Str::plural('like', 
                                $post->likes->count()) }}</span>
                            @endif
                            
                        </div>
                        
                        {{--    
                            @can here is possible bcos we have a post policy
                            @can also works like authorize function, but only in the controller
                        --}}
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        @endcan
                        
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                No post available
            @endif
        </div>
    </div>
@endsection