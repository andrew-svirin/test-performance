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
	docker volume rm test-performance_mysql-clone-1-datavolume

project-install:
	docker-compose exec php-cli composer install
	docker-compose exec php-cli php ./src/bin/yii migrate --interactive=0
	docker-compose exec php-cli php ./tests/bin/yii migrate --interactive=0
	docker-compose exec php-cli php ./tests/bin/yii_clone_1 migrate --interactive=0

project-fixtures-load:
	docker-compose exec php-cli php ./src/bin/yii fixture/load "*" --interactive=0

project-run-suite-1:
	docker-compose exec php-cli ./vendor/bin/codecept run tests/functional/suite1/Suite1AuthorCest.php

project-run-suite-2:
	docker-compose exec php-cli ./vendor/bin/robo parallel:split-suite2
	docker-compose exec php-cli ./vendor/bin/robo parallel:run-suite2
	docker-compose exec php-cli ./vendor/bin/robo parallel:merge-results-suite2

project-run-suite-3:
	docker-compose exec php-cli ./vendor/bin/codecept run tests/functional/suite3/Suite3AuthorCest.php

project-run-suite-4:
	docker-compose exec php-cli ./vendor/bin/robo parallel:split-suite4
	docker-compose exec php-cli ./vendor/bin/robo parallel:run-suite4
	docker-compose exec php-cli ./vendor/bin/robo parallel:merge-results-suite4