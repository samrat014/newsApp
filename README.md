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

- login
    http://127.0.0.1:8000/api/login
    http://127.0.0.1:8000/api/logout

- assign user role
    POST        api/assign_role_to_user

- add news and {news} is news primary key
    http://127.0.0.1:8000/api/news
      POST       api/news
      GET|HEAD   api/news/{news}
      POST       api/news/{news}
      DELETE     api/news/{news}

- add comment and {comment} is comment primary key

  POST       api/comment/{news}
  GET|HEAD   api/comment/{news}
  DELETE     api/comment/{news}
  UPDATE   api/comment/update/{id}/{comment}


