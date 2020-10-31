create table product
(
    id          int auto_increment
        primary key,
    title       varchar(255)         not null,
    description text                 null,
    image       varchar(255)         not null,
    in_stock    tinyint(1) default 0 not null,
    category_id int                  not null
);