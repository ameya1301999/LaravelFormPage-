
Basic Laravel Form Page:
Contains a form with 3 fields (Name, E-mail, Pincode)
Validations added:
E-mail is checked for unique and format [a-z@a-z.a-z]
Pincode for 6 digits
Any field cannot be submitted empty
Currently configured to work with Xampp+Mysql
DB_NAME=formpagewebsite
Add your database details in .env file for username,password,port etc.
Migration file create_form_data_table creates the required table
Run Commands-
php artisan migrate
php artisan serve
