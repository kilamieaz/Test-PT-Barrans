<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
</p>



## Install
- git clone https://github.com/kilamieaz/Test-PT-Barrans.git
### 1. Test Basic concepts
- File PDF
### 2. Test Algoritma
- cd .\2-algoritma
### 3. Test Basic Coding Api
- cd .\3-basic-coding\basic-api
- composer install .
- setting .env .
- php artisan key:generate
- php artisan migrate --seed
- php artisan serve

#### Routes

##### ```-H "Content-Type: application/json" -H "Accept: application/json"```
- ```-POST localhost/login```
- ```-POST localhost/register```
- ```-POST localhost/logout -H "Authorization: Bearer {accessToken}"```
- ```-GET localhost/products -H "Authorization: Bearer {accessToken}"```
- ```-POST localhost/products -H "Authorization: Bearer {accessToken}"```
- ```-PUT localhost/products/{product} -H "Authorization: Bearer {accessToken}"```
- ```-DELETE localhost/products/{product} -H "Authorization: Bearer {accessToken}"```
- ```-POST localhost/transactions -H "Authorization: Bearer {accessToken}"```
- ```-GET localhost/users?role=customer&has_transaction=true -H "Authorization: Bearer {accessToken}"```

#### Testing
##### - ```vendor/bin/phpunit```

