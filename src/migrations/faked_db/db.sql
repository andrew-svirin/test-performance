create table author
(
    id      int auto_increment
        primary key,
    name    varchar(255) null,
    created datetime null,
    updated datetime null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;;

create table book
(
    id        int auto_increment
        primary key,
    author_id int not null,
    title     varchar(255) null,
    created   datetime null,
    updated   datetime null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;;