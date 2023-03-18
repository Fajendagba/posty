@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
                <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('mirrorlogo.jpg') }}" alt="" width="384" height="512">
                <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                    <blockquote>
                        <p class="text-lg font-semibold">
                            “Join MirrorLog. Sign up Log in. Hear what people are talking about. 
                            <br>Join the discussion. Enjoy blogs, photos and videos you love, 
                            and share it all with friends, family, and the world.”
                        </p>
                    </blockquote>
                    <figcaption class="font-medium">
                        <div class="text-cyan-600">
                            @mirrorvlogger
                        </div>
                        <div class="text-gray-500">
                            BackEnd (Software Engineer),
                        </div>
                    </figcaption>
                </div>
            </figure>
        </div>
    </div>
@endsection
