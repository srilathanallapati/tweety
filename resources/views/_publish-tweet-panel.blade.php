<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">			
	<form action="{{route('tweets.index')}}" method="post">
		@csrf
		<textarea name="body" placeholder="what's up doc?" class="w-full"></textarea>
		<hr class="my-4">		
		<footer class="flex justify-between">
			<img src="{{auth()->user()->avatar}}" class="rounded-full mr-2" alt="{{auth()->user()->name}}" >
			<button type="submit" class="bg-blue-500 rounded-lg shawdow py-2 px-2 text-white">Tweet-a-roo!</button>
		</footer>
		@error('body')
			<p class="text-red-500 text-sm mt-2">{{$message}}</p>
		@enderror
	</form>
</div>