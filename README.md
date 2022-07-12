<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


Приложение "Агрегатор новостей" реализует возможность отображения новостей и их категорий. Есть возможность получать новости из сторонних источников и парсить их в базу данных через XML-parser Orchestra . Реализованы: регистрация и авторизация возможностями Laravel Sanctum и Socialite. Для работы  с базой данных используется ORM Laravel Eloquent и конструктор запросов. На всех формах имеется  встроенная валидация с локализацией на русском языке.
Реализованы:
 отображение новостей по категориям и отдельно каждую новость;
 авторизация и регистрация пользователей;
 оформление заказа на вывод новостей по темам, имеющимся на ресурсе;
 возможность оставить отзыв на работу приложения;
 создание, редактирование и удаление новости, редактирование пользователей в режиме администратора;
 возможность использование очередей при загрузке новостей со сторонних ресурсов в базу данных.




The News Aggregator application implements the ability to display news and their categories. It is possible to receive news from third-party sources and parse them into a database via XML-parser Orchestra. Implemented: registration and authorization by Laravel Sanctum and Socialite capabilities. To work with the database, the Laravel Eloquent ORM and the query constructor are used. All forms have built-in validation with localization in Russian.
Implemented:
 displaying news by category and separately each news;
 authorization and registration of users;
 placing an order for the output of news on topics available on the resource;
 the ability to leave feedback on the operation of the application;
 creating, editing and deleting news, editing users in administrator mode;
 the ability to use queues when uploading news from third-party resources to the database.
