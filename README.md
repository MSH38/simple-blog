<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1>Simple Blog - Laravel Project</h1>
        <h2>Introduction</h2>
        <p>This project is a basic blog management system built using Laravel, with user authentication (JWT) to manage user posts. Users can register, login, create, update, and delete blog posts. The project uses JSON Web Tokens (JWT) to manage authentication securely.</p>
        <h2>Project Features</h2>
        <ul>
            <li>User Registration and Authentication using JWT</li>
            <li>Create, Read, Update, and Delete (CRUD) operations for blog posts</li>
            <li>Pagination for listing all posts</li>
            <li>Postman collection included for easy testing of API endpoints</li>
        </ul>
        <h2>Database Structure and Relationships</h2>
        <p>The project consists of two main tables:</p>
        <h3>1. Users Table</h3>
        <p>This table stores user information such as:</p>
        <ul>
            <li><strong>id:</strong> Primary key, auto-increment</li>
            <li><strong>name:</strong> User's name</li>
            <li><strong>email:</strong> User's email (unique)</li>
            <li><strong>password:</strong> Hashed password</li>
            <li><strong>token:</strong> JWT token for authentication</li>
        </ul>
        <h3>2. Posts Table</h3>
        <p>This table stores blog post information:</p>
        <ul>
            <li><strong>id:</strong> Primary key, auto-increment</li>
            <li><strong>title:</strong> The title of the post</li>
            <li><strong>content:</strong> The content of the post</li>
            <li><strong>user_id:</strong> Foreign key linking to the <code>users</code> table</li>
            <li><strong>created_at, updated_at:</strong> Timestamps</li>
        </ul>
        <p><strong>Relationship:</strong> Each post belongs to one user, and a user can have multiple posts (One-to-Many relationship).</p>
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
            <li><strong>Posts:</strong> 
                <ul>
                    <li>All posts for all users (with pagination)</li>
                    <li>User posts</li>
                    <li>Create post</li>
                    <li>Update post</li>
                    <li>Delete post</li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>
