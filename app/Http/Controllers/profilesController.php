<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Validation\Rule;

class profilesController extends Controller
{
    public function show(User $user)
    {
        
        return view('profiles.show', [
            'user'=> $user,
            'tweets'=> $user->tweets()->withLikes()->paginate(50)
            
        ]);
        
    }
    
    public function edit(User $user)
    {
       // abort_if($user->isNot(current_user()),404);
       //$this->authorize('edit', $user);
        
        return view('profiles.edit', compact('user'));
    }
    
    public function update(User $user)
    {
        $attributes = request()->validate([           
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['image'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);
        
        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        
        $user->update($attributes);
        
        return redirect($user->path());
    }
}
