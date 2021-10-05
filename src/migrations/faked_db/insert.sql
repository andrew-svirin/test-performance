INSERT INTO information_schema.KEY_COLUMN_USAGE (CONSTRAINT_CATALOG, CONSTRAINT_SCHEMA, CONSTRAINT_NAME, TABLE_CATALOG,
                                                 TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME, ORDINAL_POSITION,
                                                 POSITION_IN_UNIQUE_CONSTRAINT, REFERENCED_TABLE_SCHEMA,
                                                 REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME)
VALUES ('def', 'test_performance_test', 'PRIMARY', 'def', 'test_performance_test', 'author', 'id', 1, null, null, null,
        null);
INSERT INTO information_schema.KEY_COLUMN_USAGE (CONSTRAINT_CATALOG, CONSTRAINT_SCHEMA, CONSTRAINT_NAME, TABLE_CATALOG,
                                                 TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME, ORDINAL_POSITION,
                                                 POSITION_IN_UNIQUE_CONSTRAINT, REFERENCED_TABLE_SCHEMA,
                                                 REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME)
VALUES ('def', 'test_performance_test', 'PRIMARY', 'def', 'test_performance_test', 'book', 'id', 1, null, null, null,
        null);


INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (1, 'Alfredo Bogan', '1986-06-03 14:29:28', '2016-12-24 09:16:52');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (2, 'Marilie Dare', '2013-10-01 11:11:15', '1977-09-14 05:53:06');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (3, 'Maudie Kuphal', '2001-10-28 20:45:49', '2016-08-31 17:30:36');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (4, 'Alfred Prosacco', '1983-09-11 20:45:32', '1972-04-23 07:01:10');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (5, 'Kayleigh Huel', '1985-02-11 01:29:21', '2006-12-03 14:30:46');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (6, 'Billy Feil', '1982-10-09 04:22:15', '1974-06-05 03:11:50');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (7, 'Caterina Stroman', '1997-06-17 08:23:44', '2016-10-14 16:37:03');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (8, 'Velda Runolfsdottir', '1986-08-28 16:48:06', '1977-03-11 19:41:02');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (9, 'Cletus Bogisich', '1981-12-30 10:36:55', '2003-10-14 14:56:33');
INSERT INTO test_performance_test.author (id, name, created, updated)
VALUES (10, 'Jerod Schmidt', '1996-07-30 19:11:15', '1970-08-26 10:08:34');

INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (1, 1, 'Dolore voluptate asperiores qui iste tempora quia soluta.', '1974-07-15 13:40:22',
        '2018-10-01 06:27:37');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (2, 2, 'Illo optio doloribus tenetur libero itaque ut.', '1992-12-07 20:46:19', '2012-07-21 03:45:34');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (3, 3, 'Similique culpa voluptatem aut ipsa.', '2018-07-11 19:23:41', '2016-02-24 02:41:07');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (4, 4, 'Accusantium nam odit ea quidem ea est expedita.', '2005-03-06 23:20:02', '2013-05-07 15:17:30');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (5, 5, 'Omnis quidem odit quo quaerat facilis sit.', '1997-07-11 21:49:31', '2002-09-09 04:02:33');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (6, 6, 'Et ratione vitae voluptatem est.', '1987-07-22 04:08:27', '2001-10-11 09:40:43');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (7, 7, 'Esse reiciendis in repellendus quia libero fuga sapiente.', '2002-11-03 10:02:37',
        '2014-04-16 19:59:05');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (8, 8, 'Ipsam ut rerum ducimus incidunt quasi esse veritatis.', '2007-10-21 01:52:27', '2020-01-17 08:26:01');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (9, 9, 'Et ipsa dolorem ea non consequatur error placeat.', '2001-11-17 15:13:52', '2003-09-08 11:40:43');
INSERT INTO test_performance_test.book (id, author_id, title, created, updated)
VALUES (10, 10, 'Libero aperiam porro aut laboriosam.', '2014-05-24 05:22:19', '1995-10-03 19:09:01');