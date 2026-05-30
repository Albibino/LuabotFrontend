# Luabot Frontend

Luabot Frontend is a web-based administration panel for the Luabot Discord bot. It provides a user-friendly interface to manage users, servers, levels, and messages by interacting with the Luabot's backend API. This application is built with the Laravel framework and styled with Tailwind CSS.

## Features

*   **User Management:** Create, read, update, and delete bot users, including assigning admin roles.
*   **Server Management:** Manage registered Discord servers (guilds) linked to the bot.
*   **Level & XP Management:** View and edit user levels and experience points.
*   **Message Management:** Browse and delete user messages logged by the bot.
*   **Authentication:** Secure user registration, login, profile management, and password reset functionalities.

## Technology Stack

*   **Framework:** Laravel 12
*   **Frontend:** Tailwind CSS, Alpine.js
*   **Build Tool:** Vite
*   **API Service:** Communicates with a Quart-based backend API.

## Installation and Setup

To get the project running on your local machine, follow these steps.

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/albibino/luabotfrontend.git
    cd luabotfrontend
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node.js dependencies:**
    ```bash
    npm install
    ```

4.  **Setup environment file:**
    Copy the example environment file and generate an application key.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Configure Environment:**
    Open the `.env` file and configure your database credentials (`DB_*` variables). Most importantly, set the URL for the Luabot backend API:
    ```dotenv
    # Example .env configuration
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=luabot
    DB_USERNAME=root
    DB_PASSWORD=

    # URL of the Luabot Quart backend
    API_BASE_URL=http://127.0.0.1:5000
    ```

6.  **Run database migrations:**
    This will create the necessary tables for users, sessions, and jobs.
    ```bash
    php artisan migrate
    ```

7.  **Compile frontend assets:**
    ```bash
    npm run build
    ```

## Usage

### Development

For a complete development environment, you can use the provided concurrent script which starts the PHP server, queue listener, log viewer, and Vite asset server.

```bash
composer run dev
```
After running this, you can access the application at `http://127.0.0.1:8000` or the URL provided in the terminal.
