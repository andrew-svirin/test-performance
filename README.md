# Test performance

# Goal

Optimize performance for tests by optimizing database node.
- Using cloning of containers
- Using virtual database

# Installation

1. Run `make docker-build`
2. Install the project `make project-install`
3. Run suites:
    1. Run Suite 1: `make project-run-suite-1`
    2. Run Suite 2: `make project-run-suite-2`
    3. Run Suite 3: `make project-run-suite-3`
    4. Run Suite 4: `make project-run-suite-4`
    5. Run Suite 5: `make project-run-suite-5`

# Experiment

1. Using 2 related tables (authors, books)
2. Prepare tables for tests.
3. Making console command call that show information by author id in raw representation.
4. Making 30 controller command invocations for measure.

### Suite1 (tests/functional/suite1):

Is typical approach:

- upload fixtures into 1 database
- call all tests one by one

### Suite2 (tests/functional/suite2):

Use 2 containers for databases for parallel tests:

- upload fixtures into 2 databases
- call all tests one by one in 2 parallel processes

### Suite3 (tests/functional/suite3):

Use 2 databases in single container for parallel tests:

- upload fixtures into 2 databases
- call all tests one by one in 2 parallel processes

### Suite4 (tests/functional/suite4):

Use virtual database:

- upload pseudo-fixtures into 1 virtual database
- call all tests one by one

### Suite5 (tests/functional/suite5):

Use virtual database for parallel tests:

- upload pseudo-fixtures into 4 virtual databases
- call all tests one by one in 4 parallel processes

# Results

| Suite | Time |
| --------- | --------- |
| Suite 1 | 15 s |
| Suite 2 | 10 s |
| Suite 3 | 11 s |
| Suite 4 | 0.7 s |
| Suite 5 | 1.1 s |