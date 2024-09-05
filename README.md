<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog - Installation Guide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            line-height: 1.6;
        }
        h1, h2, h3 {
            color: #333;
        }
        h1 {
            font-size: 36px;
            text-align: center;
        }
        h2 {
            font-size: 28px;
            margin-top: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        h3 {
            font-size: 22px;
            margin-top: 20px;
        }
        p {
            margin: 10px 0;
        }
        code, pre {
            background-color: #333;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            font-size: 16px;
            white-space: pre-wrap;
        }
        pre {
            padding: 10px;
            overflow-x: auto;
        }
        ul {
            margin: 20px 0;
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .note {
            color: #d9534f;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Blog</h1>
        
        <h2>Introduction</h2>
        <p>This is a Laravel project that allows users to manage blog posts with authentication using JWT (JSON Web Tokens). The project includes functionality for creating, updating, and deleting posts, as well as user authentication (register, login, and logout).</p>
        
        <h2>Requirements</h2>
        <ul>
            <li>PHP 8.2</li>
            <li>Composer</li>
            <li>MySQL</li>
            <li>Git</li>
            <li>phpMyAdmin</li>
        </ul>
        
        <h2>Installation Guide</h2>
        
        <h3>1. Clone the Repository</h3>
        <p>First, clone the repository to your local machine:</p>
        <pre><code>git clone "https://github.com/MSH38/simple-blog.git"</code></pre>
        <p>Go into the project directory:</p>
        <pre><code>cd simple-blog</code></pre>
        
        <h3>2. Install Dependencies</h3>
        <p>Run the following command to install all the required dependencies:</p>
        <pre><code>composer install</code></pre>
        
        <h3>3. Set Up Environment File</h3>
        <p>Copy the <code>.env.example</code> file to <code>.env</code>:</p>
        <pre><code>cp .env.example .env</code></pre>
        
        <h3>4. Update Database Configuration</h3>
        <p>Edit the <code>.env</code> file to update the database details:</p>
        <pre><code>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
        </code></pre>
        <p class="note">Note: Create a database in phpMyAdmin with the same name as in the <code>.env</code> file.</p>
        
        <h3>5. Generate Application Key</h3>
        <p>Run this command to generate the application key:</p>
        <pre><code>php artisan key:generate</code></pre>
        
        <h3>6. Run Migrations</h3>
        <p>Run the migrations to create the necessary database tables:</p>
        <pre><code>php artisan migrate</code></pre>
        
        <h3>7. Set Up JWT</h3>
        <p>Generate a secret key for JWT by running:</p>
        <pre><code>php artisan jwt:secret</code></pre>
        
        <h3>8. Serve the Application</h3>
        <p>To start the application, run:</p>
        <pre><code>php artisan serve</code></pre>
        
        <h2>Postman Collection</h2>
        <p>Use the Postman collection located in the project folder named <strong><code>simple-blog.postman_collection.json</code></strong> to test the API endpoints.</p>
        
        <h3>Available Endpoints</h3>
        <ul>
            <li><strong>Auth:</strong> Login, Register, Logout</li>
            <li><strong>Posts:</strong> All posts for all users (with pagination), User posts, Create post, Update post, Delete post</li>
        </ul>
    </div>
</body>
</html>
