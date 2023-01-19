.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "Usage: make [target]"

install:
	@composer install

recreate:
	docker-compose down && docker-compose up -d

test:
	docker exec hotel_crm_php php artisan test

migrate:
	docker exec hotel_crm_php php artisan migrate

analyse:
	./vendor/bin/phpstan analyse

generate:
	docker exec hotel_crm_php php artisan ide-helper:models --write

php:
	docker exec -it hotel_crm_php bash

nginx:
	docker exec -it hotel_crm_nginx bash

redis:
	docker exec -it hotel_crm_redis bash

mysql:
	docker exec -it hotel_crm_mysql bash
