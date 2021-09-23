# Test performance

# Goal
Optimize performance for tests by optimizing database node.

# Installation
1. Run `make docker-build`
2. Login into php-container `make php`
2.1 From php container: Install dependencies `composer install`
2.2 From php container: Install migration `php tests/bin/yii migrate -y`
2.3 From php container: Run tests `./vendor/bin/codeception run`

# Experiment
1. Using 2 related tables (authors, books)
2. Making console command call that show information by author id in raw representation.
3. Making 30 command invocations for measure.

### Suite1 (tests/functional/commands/Suite1Cest):
Is typical approach:
- upload fixtures into 1 database
- call all tests one by one

### Suite2 (tests/functional/commands/Suite2Cest):
Use 2 databases for parallel tests:
- upload fixtures into 2 databases
- call all tests one by one in 2 processes

### Suite3 (tests/functional/commands/Suite3Cest):
Use 1 virtual database:
- upload pseudo-fixtures into 1 database
- call all tests one by one

# Results
|Suite| Time | Memory |
| --------- | --------- | --------- |
| Suite 1 | 00:15 | 22 MB |
| Suite 2 | 00:00 | 00 MB |
| Suite 3 | 00:00 | 00 MB |