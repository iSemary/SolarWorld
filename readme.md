# SolarWorld

SolarWorld is a web application built on the Laravel-JQuery framework, designed to offer a user-friendly platform for file access, watching, and downloads, similar to Netflix and YTS. The project provides advanced search capabilities, efficient file categorization, and user management, making it an ideal choice for anyone looking to create or enhance a file downloading platform.

## Preview

<img src="https://github.com/iSemary/SolarWorld/blob/master/preview/1.webp" height="350px" alt="Image 1">
<img src="https://github.com/iSemary/SolarWorld/blob/master/preview/2.webp" height="350px" alt="Image 2">
<img src="https://github.com/iSemary/SolarWorld/blob/master/preview/3.webp" height="350px" alt="Image 3">
<img src="https://github.com/iSemary/SolarWorld/blob/master/preview/4.webp" height="350px" alt="Image 4">

## Features

- **Watch and Download Media & Files**
- **User-Friendly Interface**
- **Advanced Search** 
- **File Categorization** 
- **User Management** 

## How to Use

To run SolarWorld on your local machine, follow these steps:

1. Clone this repository to your local environment.

```
git clone https://github.com/isemary/SolarWorld.git
```
2. Navigate to the project directory.
```
cd SolarWorld
```
3. Install the required dependencies using Composer.
```
composer install
```
4. Create a `.env` file by copying the `.env.example` file and configuring the necessary environment variables such as database connection details.
```
cp .env.example .env
```
5. Generate an application key.
```
php artisan key:generate
```
6. Run the database migrations and seed the necessary data.
```
php artisan migrate --seed
```
7. Run the application
```
php artisan serve
```

## Contact

For any inquiries or support, please email me at [abdelrahmansamirmostafa@gmail.com](mailto:abdelrahmansamirmostafa@gmail.com) or visit my website at [abdelrahman.online](https://www.abdelrahman.online).
