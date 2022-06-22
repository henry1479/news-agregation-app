<?php

namespace App\Services\Contract;

use laravel\Socialite\Contracts\User;

interface Social 
{
	public function loginOrRegisterViaSocialNetwork(User $socialUser): string;

}