## News API 
 Fetch Latest News
<br><br>
## Setup
```bash 
git clone https://github.com/lexemmy/news-api.git
cd news-api
composer install
php -r "file_exists('.env') || copy('.env.example', '.env');"

php artisan schedule:work
``` 