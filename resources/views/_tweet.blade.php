<div class="flex p-4 border-b border-b-gray-40">
	<div class="mr-2 flex-shrink-0">
		<a href="{{route('profile', $tweet->user)}}">
			<img src="{{$tweet->user->avatar}}" class="rounded-full mr-2" alt="" width="50" height="50" >
		</a>
	</div>
	<div>
		<h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
		<p class="text-sm">{{$tweet->body}}</p>
		@auth
            <x-like-buttons :tweet="$tweet" />
        @endauth
	</div>
</div>