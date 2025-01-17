# Blockpox Assessment

1. **PHP & Laravel – API Development**  
   **ans**:  
   - `app/Http/Controllers/UserController.php`
   - `routes/api.php`
   - `app/Models/User.php`

2. **Laravel & Vue.js – CRUD Interaction**  
   **ans**:  
   - `app/Http/Controllers/TaskController.php`
   - `routes/api.php`
   - `app/Models/Task.php`
   - `resources/js/components/task.vue`
   - `resources/js/components/App.vue`

3. **PHP & WordPress – Custom Shortcode**  
   **ans**: *(dont have an answer)*

4. **Component Logic**  
   **ans**:  
   - `resources/js/components/notificationBanner.vue`
   - `resources/js/components/App.vue`

5. **Laravel – Database Optimization**  
   **ans**:  

   ```php
   // Use eager loading to load the 'posts' relationship
   $users = User::with('posts')->get();

   foreach ($users as $user) {
       echo $user->posts->count();
   }

<br>

```
# Running the Application

1. Clone the repository to your local machine.
2. Run `composer install` to install the required dependencies.
3. Run `npm install` to install the required frontend dependencies.
4. Run `php artisan key:generate` to generate a new application key.
5. Run `php artisan migrate` to create the database tables.
5. Run `php artisan db:seed` to insert users and task data .
6. Run `php artisan serve` to start the development server.
