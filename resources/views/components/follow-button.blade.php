@unless(auth()->user()->is($user))
<form method="post" action="{{route('follows', $user)}}">
	@csrf
	<button type="submit" class="bg-blue-500 rounded-full shawdow py-2 px-4 text-xs text-white">
		{{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
	</button>
</form>	
@endunless