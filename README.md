## News API 
 Fetch Latest News
<br><br>
## Setup
```bash 
git clone https://github.com/lexemmy/news-api.git
cd news-api
composer install
copy .env.example .env

php artisan jwt:secret

php artisan schedule:work
``` 