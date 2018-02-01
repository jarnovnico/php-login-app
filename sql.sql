CREATE TABLE comments (
    cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    title varchar(128) not null,
    message TEXT not null,
);

CREATE TABLE user (
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    pwd varchar(128) not null,
);