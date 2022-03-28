# IHS
Feedback, complaints and grievances handling system for Sri Lankan public.

## Instalation
### Install PHP 8 or Latest
```
sudo apt install php
```
### Install following PHP packahes
```
sudo apt install openssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip php-gd
```
### Checkout the code
```
git clone https://github.com/DuminduP/IHS.git
```
### Configuration
Create a .env file with configuration parameters such as database connection. 
Use .enc.example as template.
## Database creation
Connect to the MySQl database and create database call IHS.
Run following command to populate the database structurre.
```
php artisan migrate
```
## Populate default data
Run following command to populate default data such as Provinces, Distircts & Cities.
```
php artisan seed
```
## Start the server
Run following command to run the application using local server.
```
php artisan serve
```
You should be able to access the app on http://localhost:8000
