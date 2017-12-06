drop database if exists duelyst;
create database duelyst;

use duelyst;

create table klasa(
sifra int not null primary key auto_increment,
klasa varchar(50) not null
);

create table tip(
sifra int not null primary key auto_increment,
tip varchar(50) not null
);

create table karta(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
klasa int not null,
tip int not null,
ogranicenje int not null
);

alter table karta add foreign key (klasa) references klasa(sifra);
alter table karta add foreign key (tip) references tip(sifra);