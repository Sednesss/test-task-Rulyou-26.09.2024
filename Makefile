dev:
	docker-compose -f docker-compose-dev.yml up -d --build

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