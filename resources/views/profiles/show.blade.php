<x-app>
<header class="mb-6">
	<img alt="" class="mb-2" src="/images/default-profile-banner.jpg">
	<div class="flex justify-between items-center  mb-4">
		<div>
			<h2 class="font-bold text-2xl">{{$user->name}}</h2>
			<p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
		</div>
		<div >
			<a href="#" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
			<a href="#" class="bg-blue-500 rounded-full shawdow py-2 px-4 text-xs text-white">Follow Me</a>
		</div>
	</div>
	<img alt="" src="{{ $user->avatar }}" class="rounded-full mr-2 absolute" 
	style="width:150px; top:41%; left:calc(50% - 75px);">
	<p class="text-sm">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
</header>		
@include('_timeline', ['tweets'=>$user->tweets])
</x-app>
