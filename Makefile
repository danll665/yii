build:
	docker-compose build
up:
	docker-compose up -d
composer-install:
	docker-compose exec php composer install
chmod:
	docker-compose exec php chmod 777 -R .

install: build up composer-install chmod

migrate:
	docker-compose exec php yii migrate