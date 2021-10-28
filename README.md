## Subscription App

####Installation Steps

1) Clone this repository
2) Run `composer install` command
3) Copy `.env.example` file to `.env` file
4) Run migration and seeds
5) For testing I am using mailhog in local, if you want to test mails in local then please run below command.
 -  `brew install mailhog`
 - `brew services start mailhog`
 - `php artisan queue:work`
 - Now open this URL in your browser - http://localhost:8025

Once this complete, you can start add blog and you should see the emails in mailhog as a subscribers.
