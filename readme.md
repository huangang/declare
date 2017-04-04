# 科研申报系统
## 安装
```bash
composer install
php artisan admin:install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```
## 环境要求
* PHP版本 >= 5.6.4
* PHP扩展：OpenSSL
* PHP扩展：PDO
* PHP扩展：Mbstring
* PHP扩展：Tokenizer
* PHP扩展：XML

## 其他
如果不能命令行执行则把`declare.sql`导入数据库   
默认管理员帐号密码都为`admin`
