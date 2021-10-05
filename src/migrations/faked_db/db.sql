create table information_schema.REFERENTIAL_CONSTRAINTS
(
    CONSTRAINT_CATALOG        varchar(512) default '' not null,
    CONSTRAINT_SCHEMA         varchar(64)  default '' not null,
    CONSTRAINT_NAME           varchar(64)  default '' not null,
    UNIQUE_CONSTRAINT_CATALOG varchar(512) default '' not null,
    UNIQUE_CONSTRAINT_SCHEMA  varchar(64)  default '' not null,
    UNIQUE_CONSTRAINT_NAME    varchar(64) null,
    MATCH_OPTION              varchar(64)  default '' not null,
    UPDATE_RULE               varchar(64)  default '' not null,
    DELETE_RULE               varchar(64)  default '' not null,
    TABLE_NAME                varchar(64)  default '' not null,
    REFERENCED_TABLE_NAME     varchar(64)  default '' not null
) engine = MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create table information_schema.KEY_COLUMN_USAGE
(
    CONSTRAINT_CATALOG            varchar(512) default '' not null,
    CONSTRAINT_SCHEMA             varchar(64)  default '' not null,
    CONSTRAINT_NAME               varchar(64)  default '' not null,
    TABLE_CATALOG                 varchar(512) default '' not null,
    TABLE_SCHEMA                  varchar(64)  default '' not null,
    TABLE_NAME                    varchar(64)  default '' not null,
    COLUMN_NAME                   varchar(64)  default '' not null,
    ORDINAL_POSITION              bigint(10) default 0 not null,
    POSITION_IN_UNIQUE_CONSTRAINT bigint(10) null,
    REFERENCED_TABLE_SCHEMA       varchar(64) null,
    REFERENCED_TABLE_NAME         varchar(64) null,
    REFERENCED_COLUMN_NAME        varchar(64) null
) engine = MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create table test_performance_test.author
(
    id      int NOT NULL AUTO_INCREMENT,
    name    varchar(255) null,
    created datetime null,
    updated datetime null,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create table test_performance_test.book
(
    id        int NOT NULL AUTO_INCREMENT,
    author_id int not null,
    title     varchar(255) null,
    created   datetime null,
    updated   datetime null,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
