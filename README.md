##README Update 12-2017

- Make sure Composer is installed and up to the latest version (https://getcomposer.org/)

- Make sure Valet is installed and up to date (https://laravel.com/docs/5.5/valet)

- Make sure there is a .env file in the root directory of the project.

- After .env file is created, run the terminal command: php artisan key:generate. That will generate the app key within the .env file.
	-The .env file is very important. It stores all information regarding keys and username/passwords. All of the Facebook, Amazon AWS S3, database, and mail server credentials are stored in this file. 

- In the gulpfile, make sure the url is what you are using for testing purposes. Usually the project folder name. (Ex: earlyman-ecard.test). Use .test as the TLD for testing purposes.

- Spin up a new Laravel Forge server, usually AWS for the ecard generators. 

- When creating a new site within Forge, connect your domain and Bitbucket prodution branch in order to launch and deploy changes. (the original site created is default, and you can connect master branch to see changes that are not connected to the live domain.)
	-As far as the domain goes, point the A-record and CNAME to your server IP address. This is done in your DNS Manager within your domain provider account. 
# Early-Man-Ecard
# Early-Man-Ecard
