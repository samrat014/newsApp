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


