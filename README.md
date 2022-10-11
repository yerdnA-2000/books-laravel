<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100" alt="Laravel Logo"></a></p>

## Тестовый проект (Андреев А.В.)

### Установка

Порядок действий для корректной установки проекта:

- Запустить команду `composer install`;
- Запустить команду "npm install";
- Запустить команду "npm run build" или "vite build";
- Создать базу данных для проекта;
- Создать файл ".env" по примеру ".env.example" и указать в нём настройки подключения к базе данных;
- Запустить команду "php artisan migrate --seed" для заполнения БД таблицами и тестовыми данными;
- Запустить ваш сервер, например, запустить команду "php artisan serve";
- Перейти по адресу запущенного сервера;
- При корректной установке откроется страница авторизации;

### Администраторская часть

Порядок работы в административной части:

- Страница авторизации доступна по адресам "/login" ("/" если пользователь не авторизован);
- Данные email и пароль для входа в панель администратора cо всеми правами указаны вверху над формой авторизации:
  - Email - admin@test.com;
  - Пароль - admin);
- Данные второго администратора (неполные права): 
  - Email - admin2@test.com;
  - Пароль - admin2;
- При входе в администраторскую часть откротся страница "Панель управления", на которой указан список прав текущего администратора;
- Навигация по сайту находится в шапке.

### Пользовательская часть API

Аутентицикация пользователя происходит с помощью API token (поле "api_token" в таблице "users").

#### Тестирование в Postman

В качестве примера будет использоваться корневой адрес - http://localhost:8000/api/

В Headers необходимо добавить:
- KEY: Accept;
- VALUE: application/json.

##### Запрос на авторизацию пользователя:
- POST - http://localhost:8000/api/login
- Тестовые данные авторов:
  - Email / Пароль - vasya@test.com / vasya;
  - Email / Пароль - maxim@test.com / maxim;
- При успешной авторизации вернется пользователь с api_token;
- Для дальнейшей аутентификации необходимо добавить значения поля "api_token" в Authorization (например, в Bearer token) или в GET-параметр запроса.

##### Получение списка книг с именем автора:
- GET - http://localhost:8000/api/books
- Авторизация не обязательна.

##### Получение данных книги по id:
- GET - http://localhost:8000/api/books/<id>
- Authorization - Авторизация не обязательна;
- Uri <id> - идентификатор книги, по умолчанию добавлено 5 книг - id = {1, 2, 3, 4, 5}.

##### Получение списка авторов с указанием количества книг:
- GET - http://localhost:8000/api/authors
- Authorization - Авторизация не обязательна.

##### Получение данных автора со списком книг:
- GET - http://localhost:8000/api/authors/<id>
- Authorization - Авторизация не обязательна;
- Uri <id> - идентификатор автора, по умолчанию добавлено 2 автора - id = {1, 2}.

##### Выход из системы:
- GET - http://localhost:8000/api/logout
- Authorization - api_token.

##### Обновление данных автора (можно обновлять только свои данные):
- PATCH - http://localhost:8000/api/authors/<id>
- Authorization - api_token;
- Поля:
  - full_name.

##### Обновление данных книги, (можно обновлять только свою книгу)
- PATCH - http://localhost:8000/api/books/<id>
- Authorization - api_token;
- Поля:
    - "title";
    - "genres[]" = {1, 2, ..., 10, 11}.

##### Удаление книги (можно удалять только свою книгу)
- DELETE - http://localhost:8000/api/books/<id>
- Authorization - api_token.

### Структура БД

#### Таблицы: 
- Миграции;
- Роли;
- Разрешения;
- Роли_Разрешения;
- Пользователи;
- Пользователи_Роли;
- Пользователи_Разрешения;
- Авторы;
- Книги;
- Жанры;
- Книги_Жанры.

Структура представлена ниже на рисунке.

<a href="https://drive.google.com/uc?export=view&id=1Z5ZhTzAJTAIttnZR6lmAD5YzcFk6zms4"><img src="https://drive.google.com/uc?export=view&id=1Z5ZhTzAJTAIttnZR6lmAD5YzcFk6zms4" style="width: 650px; max-width: 100%; height: auto" title="Click to enlarge picture" />

