this is the omway task <br>
i am creating a news app <br>
that has 3 user <br>
1- admin <br>
2- category_admin <br>
3- Normal user <br>

if you are using this app <br>

i have made a dummy data for you to use <br>

    php artisan db:seed --class=UserSeeder


you can use it to login as admin or category_admin <br>

    admin: admin@admin.com
    password: password

    category_amin: category@admin.com
    password: password

    normal user: user@user.com
    password: password


i have user roles and permission

    php artisan db:seed --class=RoleSeeder

> TASK

- i created a Crud operation of news and comments
- now user can add comments to news
- added middleware to check if user is admin or category_admin and used it in routes
- added policy in comment section to give



# routes are <br>
methods should match the routes use

post to add or update <br>
get to get data <br>
delete to delete data <br>

- login and logout <br>
    `http://127.0.0.1:8000/api/login`<br>
    `http://127.0.0.1:8000/api/logout`


- assign user role <br>
    `POST        api/assign_role_to_user` <br>

- add news and {news} is news primary key <br>

    `http://127.0.0.1:8000/api/news`<br>
    `  POST       api/news` <br>
      `GET|HEAD   api/news/{news}`<br>
      `POST       api/news/{news}`<br>
      `DELETE     api/news/{news}`<br>
    `
- add comment and {comment} is comment primary key <br>
  i have added policy to authorization rules <br>
     ` POST       api/comment/{news}`<br>
      `GET|HEAD   api/comment/{news}`<br>
     ` DELETE     api/comment/{news}`<br>
    `  UPDATE   api/comment/update/{id}/{comment}`<br>