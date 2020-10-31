create table client
(
    id      int auto_increment
        primary key,
    name    varchar(255) not null,
    phone   varchar(12)  not null,
    address text         not null,
    constraint clients_phone_vindex
        unique (phone)
);