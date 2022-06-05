create table user
(
    id       int auto_increment
        primary key,
    username varchar(50) null,
    password varchar(50) null,
    constraint user_id_uindex
        unique (id),
    constraint user_username_uindex
        unique (username)
);

INSERT INTO webprog2db.user (id, username, password) VALUES (1, 'student', 'student');
INSERT INTO webprog2db.user (id, username, password) VALUES (2, 'test', 'test');
