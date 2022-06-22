<?php
namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Illuminate\Support\Facades\Auth;
use laravel\Socialite\Contracts\User as SocialUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SocialService implements Social
{
	public function loginOrRegisterViaSocialNetwork(socialUser $socialUser, string $driver='gh'): string
	{
		
		$user = User::where('email', $socialUser->getEmail())->first();
		if($user) {
			$user->name = $socialUser->getName();
			$user->avatar = $socialUser->getAvatar();
			if($user->save()){
			
				Auth::loginUsingId($user->id);
				
				return route('account');
			} else {
                session(['soc.token'=>$socialUser->token]);
                $user = User::create([
                    $user->name = $socialUser->getName(),
                    $user->email = $socialUser->getEmail(),
                    $user->id_in_soc = $socialUser->getId(),
                    $user->type_auth = $driver,
                    $user->avatar = $socialUser->getAvatar(),

                ]);
                Auth::login($user);
                return route('account');   
            }

		}

		throw new ModelNotFoundException('Model not found');
	}
}