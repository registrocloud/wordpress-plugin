
start:
	docker-compose up -d wordpress

install:
	docker-compose run --rm -w /app -u $$(id -u) wordpress composer install

update:
	docker-compose run --rm -w /app -u $$(id -u) wordpress composer update

release:
	docker-compose run --rm -w /app -u $$(id -u) wordpress ./release.sh

ps:
	docker-compose ps
