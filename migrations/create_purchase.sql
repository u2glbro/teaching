create table purchase
(
    id         int auto_increment
        primary key,
    client_id  int      not null,
    product_id int      not null,
    created_at datetime not null
);