
start:
	docker-compose up -d wordpress

install:
	docker-compose run --rm wordpress composer install

update:
	docker-compose run --rm wordpress composer update

release:
	docker-compose run --rm wordpress ./release.sh

ps:
	docker-compose ps
