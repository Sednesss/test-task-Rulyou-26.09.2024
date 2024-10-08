dev:
	docker-compose -f docker-compose-dev.yml up -d --build

init-app:
	docker exec -it test_task_26092024_app composer i
	docker exec -it test_task_26092024_app php artisan key:generate
	docker exec -it test_task_26092024_app php artisan migrate

start:
	docker-compose -f docker-compose-dev.yml up -d

stop:
	docker-compose -f docker-compose-dev.yml stop

down:
	docker-compose -f docker-compose-dev.yml down

nginx:
	docker exec -it test_task_26092024_webserver sh

laravel:
	docker exec -it test_task_26092024_app bash

cache-clear:
	# docker exec -it test_task_26092024_app php artisan cache:clear
	docker exec -it test_task_26092024_app php artisan config:clear
	docker exec -it test_task_26092024_app php artisan route:clear