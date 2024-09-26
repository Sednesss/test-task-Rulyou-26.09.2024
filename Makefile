dev:
	docker-compose -f docker-compose-dev.yml up -d --build

start:
	docker-compose up -d

stop:
	docker-compose stop

down:
	docker-compose down

nginx:
	docker exec -it test_task_26092024_webserver sh

laravel:
	docker exec -it test_task_26092024_app bash