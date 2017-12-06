drop database if exists dnevnikgledanja;
create database dnevnikgledanja;

use dnevnikgledanja;

create table serija(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
brojsezona int not null
);

create table sezona(
sifra int not null primary key auto_increment,
serija int not null,
naziv varchar(50) not null,
rednibroj int not null,
brojepizoda int not null
);

create table epizoda(
sifra int not null primary key auto_increment,
sezona int not null,
naziv varchar(50) not null,
rednibroj int not null,
trajanje int not null
);

alter table sezona add foreign key (serija) references serija(sifra);

alter table epizoda add foreign key (sezona) references sezona(sifra);