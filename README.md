# WPUCourse Livewire

WPUCourse Livewire is WPUCourse learning website about study using Livewire 3. Features is including creating users, and explore feature from Livewire.

## Tech Stack

- **Laravel 12**
- **MySQL Database**
- **Livewire 3**

## Features

- Main features available in this application:
  - Create User
  - Searching

## Installation

Follow the steps below to clone and run the project in your local environment:

1. Clone repository:

    ```bash
    git clone https://github.com/Akbarwp/WPUCourse-Livewire.git
    ```

2. Install dependencies use Composer and NPM:

    ```bash
    composer install
    npm install
    ```

3. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Setup database in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=wpucourse_livewire
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run migration database:

    ```bash
    php artisan migrate
    ```

7. Run seeder database:

    ```bash
    php artisan db:seed
    ```

8. Run website:

    ```bash
    npm run dev
    php artisan serve
    ```

## Screenshot

- ### **User Page**

<img src="https://github.com/user-attachments/assets/0faa71c3-423f-4ead-abab-230fbb418e87" alt="User page" width="" />
<br><br>
