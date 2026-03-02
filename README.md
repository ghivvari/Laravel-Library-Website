This project are made with Laravel so to succesfully try this project you need a laravel installed.

Setup tuts: (extract this file on xampp/htdocs or if you use laragon robably need a little adjustment)
1. Make a database on MySQL called; perpus. (Or if you want to change the database name. You need to change the .env file DB_DATABASE=[Your DB name])
2. On terminal type. php artisan key:generate
3. On terminal type. php artisan migrate
4. On terminal type. php artisan db:seed
5. Run xampp mysql and apache
6. On terminal type. php artisan serve. Then click the port it should be running right

NOTE: 
Username: endministrator@gmail.com
Password: endmin
Role: administrator

for making another user, for member you can just register with the register feature.
For adding another role especially the administrator you can use the seeding.
 
 User::updateOrCreate( <=== to add user
            ['email' => 'xxxxxxxxxxx'], <==== change the xxxx to email you want
            [
                'name' => 'xxxxxxxxxxxxxxx', <==== change the xxxx to user name
                'password' => Hash::make('xxxxxxxx'), <==== change the xxxx to your desire password. (Note: the password is being hased so its hard to see the password even from the database)
                'role' => 'xxxxxxx', <=== change the xxxx to admin/member
            ]
        );

Book::updateOrCreate( <==== to add book
            ['title' => 'xxxxx'], <==== change the x to the book title
            [
                'author' => 'xxxxx', <==== change the x to author name
                'category' => 'xxxxxx', <==== change the x to the book category
                'stock' => xxxxx, <==== change the x to add available stock input an integer
            ]
        );

after editing the seeder you need to run the db:seed again
