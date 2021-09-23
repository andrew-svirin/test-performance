docker-up u:
	docker-compose up -d

docker-down d:
	docker-compose down

docker-build:
	docker-compose build --no-cache

docker-php php:
	docker exec -it php-cli-test-performance /bin/bash

docker-mysql mysql:
	docker exec -it mysql-test-performance /bin/bash

docker-mysql-rm-volume:
	docker volume rm test-performance_mysql-datavolume