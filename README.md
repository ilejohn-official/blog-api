# 📘 Blog API (Laravel 10)

A simple Blog API built with Laravel 10 and PHP 8.1+, featuring CRUD operations for Blogs and Posts, with user interactions (Likes & Comments).

🚀 Features

✅ Blog CRUD (Create, Read, Update, Delete)

✅ Post CRUD (under a specific blog)

✅ Like & Comment on posts

✅ Token Authentication middleware (Authorization: vg@123)

✅ Database seeding with a test user

✅ RESTful JSON APIs

✅ Input validations

🛠️ Tech Stack

PHP 8.1+

Laravel 10

MySQL

Composer

⚙️ Installation

Clone repository

```bash
git clone https://github.com/ilejohn-official/blog-api
cd blog-api
```

Install dependencies

```bash
composer install
```

Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

Update your .env file with DB credentials.

Run migrations & seed

```bash
php artisan migrate:fresh --seed
```

Start server

```bash
php artisan serve
```

App will run at: <http://127.0.0.1:8000>

🔑 Authentication

All API routes are protected with a token.
You must include this header in every request:

```curl
Authorization: vg@123
```

📂 API Endpoints

## Blogs

| Method | Endpoint                | Description                  |
|--------|-------------------------|------------------------------|
| GET    | /api/blogs              | Get all blogs                |
| POST   | /api/blogs              | Create new blog              |
| GET    | /api/blogs/{id}         | Get single blog w/ posts     |
| PUT    | /api/blogs/{id}         | Update blog                  |
| DELETE | /api/blogs/{id}         | Delete blog                  |

## Posts

| Method | Endpoint                          | Description                  |
|--------|-----------------------------------|------------------------------|
| GET    | /api/blogs/{id}/posts             | Get all posts in blog        |
| POST   | /api/blogs/{id}/posts             | Create post in blog          |
| GET    | /api/blogs/{id}/posts/{postId}    | Get single post w/ likes & comments |
| PUT    | /api/blogs/{id}/posts/{postId}    | Update post                  |
| DELETE | /api/blogs/{id}/posts/{postId}    | Delete post                  |

## Comments

| Method | Endpoint                | Description                  |
|--------|-------------------------|------------------------------|
| POST   | /api/posts/{id}/comment | Comment on post              |

## Likes

| Method | Endpoint                | Description                  |
|--------|-------------------------|------------------------------|
| POST   | /api/posts/{id}/like    | Like a post                  |

🧑‍💻 Database Seeder

A test viewer user is automatically seeded:

```json
{
  "name": "Viewer",
  "email": "viewer@example.com",
  "password": "password"
}
```

👨‍💻 Author

Developed by [Opeyemi Ilesanmi](ojilesanmi7@gmail.com) ✨
