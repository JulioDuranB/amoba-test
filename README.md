# Pasos de instalacion

- clonar repositorio
- instalar paquetes de laravel y node
	- composer install
	- npm install
- ejecutar el comando 
	- php artisan migrate:refresh --seed
	- php artisan passport:install
- configurar base de datos y client secret de passport en el archivo .env
- ejecutar npm run dev