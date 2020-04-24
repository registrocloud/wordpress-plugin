
start:
	docker-compose up -d wordpress

install:
	docker-compose run --rm -w /app -u $${UID} wordpress composer install

update:
	docker-compose run --rm -w /app -u $${UID} wordpress composer update

release:
	docker-compose run --rm -w /app -u $${UID} wordpress ./release.sh

ps:
	docker-compose ps
