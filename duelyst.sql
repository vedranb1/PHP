drop database if exists duelyst;
create database duelyst;

use duelyst;

create table klasa(
sifra int not null primary key auto_increment,
naziv varchar(50) not null
);

create table tip(
sifra int not null primary key auto_increment,
naziv varchar(50) not null
);

create table karta(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
klasa int not null,
tip int not null,
ogranicenje int not null
);

create table korisnik(
sifra int not null primary key auto_increment,
username varchar(50) not null,
email varchar(50) not null
);

create table deck(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
korisnik int not null,
karta int not null
);

alter table karta add foreign key (klasa) references klasa(sifra);
alter table karta add foreign key (tip) references tip(sifra);
alter table deck add foreign key (korisnik) references korisnik(sifra);
alter table deck add foreign key (karta) references karta(sifra);