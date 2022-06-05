create table message
(
    id            int auto_increment
        primary key,
    username_from varchar(50) null,
    username_to   varchar(50) null,
    message       text        null,
    constraint message_id_uindex
        unique (id)
);

INSERT INTO webprog2db.message (id, username_from, username_to, message) VALUES (1, 'test', 'student', 'Hello!');
INSERT INTO webprog2db.message (id, username_from, username_to, message) VALUES (38, 'student', 'test', 'Hello');
