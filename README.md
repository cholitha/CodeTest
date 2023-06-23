# Please follow the steps to run and configure the application

- Clone the repository
- Install Dependancy -> composer install
- Change .env.example to .env
- Create Database and add database details to .env file
- Set app key using - php artisan key:generate
- Run the migration -> php artisan migrate
- Run the seeders -> For insert the user roles and sample items (php artisan db:seed)
- Run the application -> php artisan serve
    
### Highlevel Summary
- This is a highlevel online support system sellers and service providers can view the messages and customers can create inquiries and view the status

- Super user will be admin@gmail.com and password will be 123 (You have to run seeer).
- Sample seller user will be seller_1@gmail.com and password will be 123 (You have to run seeer).

- In the user registration are can create accounts for the sellers (hope to configure login activate through admin account but had not enough time to complete)

### Challenging Tasks
- Mail sending task (due to google account issue)
- Activate and deactivate sellers using admin portal
- Ticket Resolving task from seller