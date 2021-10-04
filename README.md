# Test performance

# Goal

Optimize performance for tests by optimizing database node.

# Installation

1. Run `make docker-build`
2. Install the project `make project-install`
3. Run suites:
    1. Run Suite 1: `make project-run-suite-1`
    2. Run Suite 2: `make project-run-suite-2`
    3. Run Suite 3: `make project-run-suite-3`

# Experiment

1. Using 2 related tables (authors, books)
2. Making console command call that show information by author id in raw representation.
3. Making 30 command invocations for measure.

### Suite1 (tests/functional/commands/Suite1Cest):

Is typical approach:

- upload fixtures into 1 database
- call all tests one by one

### Suite2 (tests/functional/commands/Suite2Cest):

Use 2 containers for databases for parallel tests:

- upload fixtures into 2 databases
- call all tests one by one in 2 parallel processes

### Suite3 (tests/functional/commands/Suite3Cest):

Use 1 virtual database:

- upload pseudo-fixtures into 1 database
- call all tests one by one

# Results

| Suite | Time |
| --------- | --------- |
| Suite 1 | 15 s |
| Suite 2 | 11 s |
| Suite 3 | 00 s |