<h3>About</h3>

Image gallery returns image name, description and link in JSON or XML format. Used Laravel framework as an API (no web routes). Use "POSTMAN" or similar to see how app works!

<h3>Install</h3>

Clone the git repository on your computer

<b>$ git clone https://github.com/lupikas/Image-Gallery.git</b>

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git
After cloning the application, you need to install it's dependencies.

<b>$ cd Image-Gallery
$ composer install</b>

<h3>Setup</h3>

When you are done with installation, copy the .env.example file to .env

<b>$ cp .env.example .env</b>

Connect app with database (edit .env file).

Generate the application key

<b>$ php artisan key:generate</b>

Generate JWT secret

<b>$ php artisan jwt:secret</b>

Migrate the application

<b>$ php artisan migrate</b>
    
Run: 
<b>$ php artisan db:seed --class=ImageSeeder</b>
to generate random data

Run the application

<b>$ php artisan serve</b>

<h3>Url</h3>

127.0.0.1:8000/api/photo?<b>paginate=10</b>&<b>format=xml</b>
<b>Paginate</b> -> how many records to show
<b>Format</b> -> XML or JSON
