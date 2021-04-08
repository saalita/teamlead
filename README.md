How to install project


1. Create folder name ‘teamlead ’ and clone project in from https://github.com/saalita/teamlead

	Run ‘git clone https://github.com/saalita/teamlead'

2. Run following commands at once in terminal for install dependences

‘run docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install’


3. Run ‘./vendor/bin/sail up’ in terminal 
4. Go to http://localhost:8080/ in browser by -u root -p and create database named ‘teamlead’
5. Run  ‘./vendor/bin/sail php artisan migrate’ in terminal


Useful links 
http://localhost:8080/ - phpmyadmin
http://localhost/order/create - order form page
http://localhost/api/rates - rates API


Task #2


1. SELECT COUNT(`orders`.`rate_id`), `orders`.`client_id` FROM `orders`
INNER JOIN `rates` on `orders`.`rate_id`=`rates`.`id`
WHERE `rates`.`price`=1000 or `rates`.`price`=200 GROUP BY `orders`.`client_id`

2. SELECT * FROM `orders` WHERE `client_id`=1 AND `created_at` >= (CURDATE() - INTERVAL 7 DAY) ORDER BY `created_at` DESC LIMIT 3

3. SELECT `orders`.*,`rates`.`price` FROM `orders`
    JOIN `rates` ON `orders`.`rate_id`=`rates`.`id` WHERE `price`>=1000 ORDER BY `orders`.`client_id` ASC, `orders`.`created_at` DESC

4. SELECT `phone`,`name` FROM `clients` order by `name`
