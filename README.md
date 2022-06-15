<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Условие
Тестовое задание «Клик Страхование»
Нужно написать простой сайт с телефонным справочником.  Карточки содержат ID, имя, краткое описание, одно изображение, номер телефона. Сайт использует REST api для сохранения и возвращения данных.

Бэк:
Laravel + MySQL
GET запрос по адресу /api/cards возвращает все карточки с данными (ID, имя, краткое описание, изображение, телефон).
POST запрос по адресу /api/cards передаёт данные из формы создания карточки (имя, краткое описание, изображение, номер телефона), после чего данные сохраняются в БД.

Требования к полям:
ID – уникальное, создаётся при создании записи карточки.
Имя – не уникальное, от 2 до 255 символов, обязательное.
Краткое описание – не уникальное, от 0 до 300 символов, необязательное.
Изображение – jpg, png.
Телефон – см. ниже.

Пользователь может вводить номер телефона в трёх форматах: +79991235678, +7(999)123-56-78, 89991235678. При сохранении телефон должен приводиться к общему формату 89991235678 и возвращаться в таком формате из базы.

Фронт не принципиален, достаточно, чтобы он просто выводил данные и имел форму добавления данных.
Бонусное задание: обернуть всё приложение в докер

## Решение
1 - Создаем таблицу через миграцию phone_books<br>
2 - Проверка входных данных выносим в App\Http\Requests\Cards\AddCardsRequest . 
Для проверки номеров телефона (+79991235678, +7(999)123-56-78, 89991235678)  пишем регулярное выражение: 
<pre>
public function rules() {
		return [
            'name'=>'required|string',
            /*
             * Пользователь может вводить номер телефона в трёх форматах: +79991235678, +7(999)123-56-78, 89991235678
             */
            'phone' =>  ['required', 'regex:/(\+7[0-9]{10}$)|(8[0-9]{10}$)|(\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$)/'],
            'description' => 'nullable|string|max:400',
            'image' => 'nullable|image',

		];
	}
</pre>
<br>
3 - Форматирование перед сохранением возлагаем на модель App/Models/PhoneBook
4 - Фрон написал на bootstrap + jquery

## Устновка
Установка стандартная, клонировать, запустить миграцию php artisan migrate && php artisan db:seed 
