this is the omway task
i am creating a news app
that has 3 user
1- admin
2- category_admin
3- Normal user

if you are using this app

i have made a dummy data for you to use

    >php artisan db:seed --class=UserSeeder


you can use it to login as admin or category_admin

    admin: admin@admin.com
    password: password

    category_amin: category@admin.com
    password: password

    normal user: user@user.com
    password: password


i have user roles and permission

    > php artisan db:seed --class=RoleSeeder

> TASK

- i created a Crud operation of news and comments
- now user can add comments to news


