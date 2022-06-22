<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contract\Social;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //в новом контроллере SocialController добавляем новые методы
    // формирует редирект на разрешение-ссылку на сервер OAuth
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();


    }
    
    // ответ сервера OAuth
    // принимает также сервис
    // возвращает редирект на соответствующий роут
    public function callback(string $driver, Social $social)
    {	
        
        return redirect(
            $social->loginOrRegisterViaSocialNetwork(
                Socialite::driver($driver)->stateless()->user()
            )
        ); 
    }
}
