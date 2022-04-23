

## Robusta Bus
Application for booking bus trips between the governorates.

## Installation

- Configure database username and password in .env file.
- Create Virtual Host and add it in hosts file. Ex. projectnam.local
- Run  php artisan migrate
- Run  php artisan db:seed
- php artisan module:seed Language
- Run  php artisan module:seed Roles
- Run  php artisan module:seed City
- Super User login data ( Username: superadmin@admin.com , Password: admin123)
- Create New role as User 
- Give User role permission for book trip 
- Create new user with User role 
- As Super User Create line
- Go to trips and generate new trip and select Bus Line 
- From Actions of trip can select Book to go to the screen that contain the trip's data and allow you to book seat for this trip.

