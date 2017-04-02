# 科研申报系统
## 安装
```bash
composer install
php artisan admin:install
cp .env.example .env
php artisan key:generate
php artisan migrate
```
## 环境要求
* PHP版本 >= 5.6.4
* PHP扩展：OpenSSL
* PHP扩展：PDO
* PHP扩展：Mbstring
* PHP扩展：Tokenizer
* PHP扩展：XML
