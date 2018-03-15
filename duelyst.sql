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
ogranicenje int not null,
mana int,
attack int,
health int,
rarity varchar(50)
);

create table operater(
sifra int not null primary key auto_increment,
username varchar(50) not null,
email varchar(50) not null,
lozinka char(32) not null,
uloga varchar(50) not null
);

create table deck(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
operater int not null
);

create table karta_deck(
karta int not null,
deck int not null
);

alter table karta add foreign key (klasa) references klasa(sifra);
alter table karta add foreign key (tip) references tip(sifra);
alter table deck add foreign key (operater) references operater(sifra);
alter table karta_deck add foreign key (karta) references karta(sifra);
alter table karta_deck add foreign key (deck) references deck(sifra);

select * from klasa;

select * from karta;

select * from tip;
insert into klasa values 
(null, 'Lyonar'),
(null, 'Songhai'),
(null, 'Vetruvian'),
(null, 'Magmar'),
(null, 'Abyssian'),
(null, 'Vanar'),
(null, 'Neutral');

insert into tip values
(null, 'Minion'),
(null, 'Spell'),
(null, 'Artifact'),
(null, 'General');

general
insert into karta
(sifra, naziv, klasa, tip, ogranicenje, attack, health) values
(null, 'Argeon Highmayne', 1, 4, 1, 2, 25),
(null, 'Zir\'An Sunforge', 1, 4, 1, 2, 25),
(null, 'Brome Warcrest', 1, 4, 1, 2, 25);

minion
insert into karta values
(null, 'Silverguard Squire', 1, 1, 3, 1, 1, 4, 'Common'),
(null, 'Slo', 1, 1, 3, 1, 1, 4, 'Common'),
(null, 'Sunrise Cleric', 1, 1, 3, 1, 1, 3, 'Common'),
(null, 'Azurite Lion', 1, 1, 3, 2, 2, 3, 'Common'),
(null, 'Fiz', 1, 1, 3, 2, 3, 3, 'Rare'),
(null, 'Lightchaser', 1, 1, 3, 2, 3, 2, 'Common'),
(null, 'Pureblade Enforcer', 1, 1, 3, 2, 1, 3, 'Common'),
(null, 'Sun Wisp', 1, 1, 3, 2, 2, 1, 'Common'),
(null, 'Sunstone Templar', 1, 1, 3, 2, 1, 4, 'Epic'),
(null, 'Warblade', 1, 1, 3, 2, 1, 4, 'Common'),
(null, 'Windblade Adept', 1, 1, 3, 2, 2, 3, 'Basic'),
(null, 'Arclyte Sentinel', 1, 1, 3, 3, 2, 4, 'Rare'),
(null, 'Aurora', 1, 1, 3, 3, 1, 5, 'Epic'),
(null, 'Decorated Enlistee', 1, 1, 3, 3, 1, 5, 'Common'),
(null, 'Radiant Dragoon', 1, 1, 3, 3, 3, 4, 'Rare'),
(null, 'Scintilla', 1, 1, 3, 3, 3, 4, 'Common'),
(null, 'Silverguard Knight', 1, 1, 3, 3, 1, 5, 'Basic'),
(null, 'Sol Pontiff', 1, 1, 3, 3, 1, 4, 'Rare'),
(null, 'Sunforge Lancer', 1, 1, 3, 3, 2, 4, 'Epic'),
(null, 'Sunforger', 1, 1, 3, 3, 2, 2, 'Legendary'),
(null, 'Vigilator', 1, 1, 3, 3, 3, 4, 'Common'),
(null, 'Ironcliffe Monument', 1, 1, 3, 4, 0, 10, 'Legendary'),
(null, 'Lysian Brawler', 1, 1, 3, 4, 4, 4, 'Common'),
(null, 'Solpiercer', 1, 1, 3, 4, 3, 4, 'Rare'),
(null, 'Sun Sister Sterope', 1, 1, 3, 4, 4, 4, 'Legendary'),
(null, 'Sunbreaker', 1, 1, 3, 4, 2, 4, 'Rare'),
(null, 'Sunriser', 1, 1, 3, 4, 3, 4, 'Epic'),
(null, 'Suntide Maiden', 1, 1, 3, 4, 3, 6, 'Common'),
(null, 'War Judicator', 1, 1, 3, 4, 4, 5, 'Rare'),
(null, 'Ironcliffe Guardian', 1, 1, 3, 5, 3, 10, 'Rare'),
(null, 'Oakenheart', 1, 1, 3, 5, 4, 5, 'Rare'),
(null, 'Second Sun', 1, 1, 3, 5, 0, 8, 'Rare'),
(null, 'Elyx Stormblade', 1, 1, 3, 6, 7, 7, 'Legendary'),
(null, 'Prominence', 1, 1, 3, 6, 4, 7, 'Epic'),
(null, 'Solarius', 1, 1, 3, 6, 3, 3, 'Legendary'),
(null, 'Grandmaster Zir', 1, 1, 3, 7, 5, 12, 'Legendary'),
(null, 'Alabaster Titan', 1, 1, 3, 7, 5, 7, 'Legendary'),
(null, 'Peacekeeper', 1, 1, 3, 7, 5, 5, 'Legendary'),
(null, 'Excelsious', 1, 1, 3, 8, 6, 6, 'Legendary');

spell
insert into karta 
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Beam Shock', 1, 2, 3, 0, 'Common'),
(null, 'Steadfast Formation', 1, 2, 3, 0, 'Common'),
(null, 'Aegis Barrier', 1, 2, 3, 1, 'Legendary'),
(null, 'Aerial Rift', 1, 2, 3, 1, 'Epic'),
(null, 'Auryn Nexus', 1, 2, 3, 1, 'Common'),
(null, 'Draining Wave', 1, 2, 3, 1, 'Common'),
(null, 'Fighting Spirit', 1, 2, 3, 1, 'Epic'),
(null, 'Fortified Assault', 1, 2, 3, 1, 'Rare'),
(null, 'Lionheart Blessing', 1, 2, 3, 1, 'Rare'),
(null, 'Magnetize', 1, 2, 3, 1, 'Rare'),
(null, 'Sanctify', 1, 2, 3, 1, 'Common'),
(null, 'Sundrop Elixir', 1, 2, 3, 1, 'Common'),
(null, 'True Strike', 1, 2, 3, 1, 'Common'),
(null, 'Channeled Breath', 1, 2, 3, 2, 'Common'),
(null, 'Dauntless Advance', 1, 2, 3, 2, 'Common'),
(null, 'Lasting Judgement', 1, 2, 3, 2, 'Rare'),
(null, 'Lucent Beam', 1, 2, 3, 2, 'Common'),
(null, 'Prism Barrier', 1, 2, 3, 2, 'Rare'),
(null, 'Sun Bloom', 1, 2, 3, 2, 'Common'),
(null, 'Tempest', 1, 2, 3, 2, 'Basic'),
(null, 'Vale Ascension', 1, 2, 3, 2, 'Epic'),
(null, 'War Surge', 1, 2, 3, 2, 'Basic'),
(null, 'Afterblaze', 1, 2, 3, 3, 'Common'),
(null, 'Empyreal Congregation', 1, 2, 3, 3, 'Epic'),
(null, 'Life Coil', 1, 2, 3, 3, 'Common'),
(null, 'Divine Bond', 1, 2, 3, 3, 'Basic'),
(null, 'Fealty', 1, 2, 3, 3, 'Rare'),
(null, 'Martyrdom', 1, 2, 3, 3, 'Basic'),
(null, 'Sky Burial', 1, 2, 3, 3, 'Rare'),
(null, 'Decimate', 1, 2, 3, 4, 'Legendary'),
(null, 'Holy Immolation', 1, 2, 3, 4, 'Epic'),
(null, 'Invincible', 1, 2, 3, 4, 'Epic'),
(null, 'Ironcliffe Heart', 1, 2, 3, 4, 'Epic'),
(null, 'Sunstrike', 1, 2, 3, 4, 'Epic'),
(null, 'Trinity Oath', 1, 2, 3, 4, 'Epic'),
(null, 'Circle of Life', 1, 2, 3, 5, 'Epic'),
(null, 'Aperions Claim', 1, 2, 3, 7, 'Legendary'),
(null, 'Call to Arms', 1, 2, 3, 7, 'Legendary'),
(null, 'Sky Phalanx', 1, 2, 3, 8, 'Legendary');

artifact
insert into karta
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Sunstome Bracers', 1, 3, 3, 0, 'Basic'),
(null, 'Gold Vitriol', 1, 3, 3, 2, 'Rare'),
(null, 'Sunbond Pavise', 1, 3, 3, 2, 'Rare'),
(null, 'Skywind Glaives', 1, 3, 3, 3, 'Epic'),
(null, 'Arclyte Regalia', 1, 3, 3, 4, 'Legendary'),
(null, 'Halo Bulwark', 1, 3, 3, 5, 'Legendary'),
(null, 'Dawn\'s Eye', 1, 3, 3, 6, 'Legendary');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, attack, health) values
(null, 'Kaleos Xaan', 2, 4, 1, 2, 25),
(null, 'Reva Eventide', 2, 4, 1, 2, 25),
(null, 'Shidai Stormblossom', 2, 4, 1, 2, 25);

insert into karta values
(null, 'Heartseeker', 2, 1, 3, 1, 1, 1, 'Common'),
(null, 'Ace', 2, 1, 3, 1, 1, 2, 'Common'),
(null, 'Katara', 2, 1, 3, 1, 1, 3, 'Common'),
(null, 'Chakri Avatar', 2, 1, 3, 2, 1, 2, 'Basic'),
(null, 'Kaido Assassin', 2, 1, 3, 2, 2, 3, 'Basic'),
(null, 'Scroll Bandit', 2, 1, 3, 2, 1, 3, 'Epic'),
(null, 'Suzumebachi', 2, 1, 3, 2, 1, 3, 'Common'),
(null, 'Tusk Boar', 2, 1, 3, 2, 2, 3, 'Legendary'),
(null, 'Xho', 2, 1, 3, 2, 2, 3, 'Rare'),
(null, 'Battle Panddo', 2, 1, 3, 3, 2, 4, 'Epic'),
(null, 'Celestial Phantom', 2, 1, 3, 3, 1, 5, 'Rare'),
(null, 'Dusk Rigger', 2, 1, 3, 3, 2, 3, 'Rare'),
(null, 'Gore Horn', 2, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Hundred-Handed Rakushi', 2, 1, 3, 3, 3, 4, 'Common'),
(null, 'Jade Monk', 2, 1, 3, 3, 4, 3, 'Common'),
(null, 'Ki Beholder', 2, 1, 3, 3, 3, 2, 'Rare'),
(null, 'Lantern Fox', 2, 1, 3, 3, 2, 3, 'Epic'),
(null, 'Mind-Cage Oni', 2, 1, 3, 3, 4, 3, 'Rare'),
(null, 'Mizuchi', 2, 1, 3, 3, 2, 5, 'Rare'),
(null, 'Penumbraxx', 2, 1, 3, 3, 3, 1, 'Legendary'),
(null, 'Sparrowhawk', 2, 1, 3, 3, 3, 2, 'Common'),
(null, 'Twilight Fox', 2, 1, 3, 3, 3, 3, 'Legendary'),
(null, 'Whiplash', 2, 1, 3, 3, 4, 3, 'Common'),
(null, 'Widowmaker', 2, 1, 3, 3, 2, 3, 'Basic'),
(null, 'Flamewreath', 2, 1, 3, 4, 2, 4, 'Common'),
(null, 'Four Winds Magi', 2, 1, 3, 4, 4, 4, 'Rare'),
(null, 'Keshrai Fanblade', 2, 1, 3, 4, 5, 3, 'Common'),
(null, 'Kindling', 2, 1, 3, 4, 3, 5, 'Epic'),
(null, 'Manakite Drifter', 2, 1, 3, 4, 3, 3, 'Common'),
(null, 'Storm Sister Alkyone', 2, 1, 3, 4, 3, 5, 'Legendary'),
(null, 'Wildfire Tenketsu', 2, 1, 3, 4, 3, 5, 'Epic'),
(null, 'Geomancer', 2, 1, 3, 5, 5, 4, 'Rare'),
(null, 'Hamon Bladeseeker', 2, 1, 3, 5, 8, 8, 'Epic'),
(null, 'Onyx Jaguar', 2, 1, 3, 5, 3, 3, 'Epic'),
(null, 'Scarlet Viper', 2, 1, 3, 5, 2, 5, 'Common'),
(null, 'Eternity Painter', 2, 1, 3, 6, 3, 4, 'Legendary'),
(null, 'Grandmaster Zendo', 2, 1, 3, 6, 4, 6, 'Legendary'),
(null, 'Calligrapher', 2, 1, 3, 7, 3, 7, 'Legendary'),
(null, 'Second-Sword Sarugi', 2, 1, 3, 7, 4, 7, 'Legendary'),
(null, 'Storm Kage', 2, 1, 3, 7, 5, 10, 'Legendary');

insert into karta 
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Juxtaposition', 2, 2, 3, 0, 'Epic'),
(null, 'Mana Vortex', 2, 2, 3, 0, 'Rare'),
(null, 'Assassination Protocol', 2, 2, 3, 1, 'Common'),
(null, 'Ghost Lightning', 2, 2, 3, 1, 'Basic'),
(null, 'Gotatsu', 2, 2, 3, 1, 'Common'),
(null, 'Inner Focus', 2, 2, 3, 1, 'Basic'),
(null, 'Joseki', 2, 2, 3, 1, 'Common'),
(null, 'Mist Dragon Seal', 2, 2, 3, 1, 'Basic'),
(null, 'Mist Walking', 2, 2, 3, 1, 'Rare'),
(null, 'Obscuring Blow', 2, 2, 3, 1, 'Rare'),
(null, 'Spiral Counter', 2, 2, 3, 1, 'Common'),
(null, 'Shadow Waltz', 2, 2, 3, 1, 'Common'),
(null, 'Artifact Defiler', 2, 2, 3, 2, 'Common'),
(null, 'Crimson Coil', 2, 2, 3, 2, 'Common'),
(null, 'Deathstrike Seal', 2, 2, 3, 2, 'Rare'),
(null, 'Eight Gates', 2, 2, 3, 2, 'Legendary'),
(null, 'Ethereal Blades', 2, 2, 3, 2, 'Common'),
(null, 'Mass Flight', 2, 2, 3, 2, 'Rare'),
(null, 'Mirror Meld', 2, 2, 3, 2, 'Rare'),
(null, 'Phoenix Fire', 2, 2, 3, 2, 'Basic'),
(null, 'Saberspine Seal', 2, 2, 3, 2, 'Basic'),
(null, 'Bamboozle', 2, 2, 3, 3, 'Epic'),
(null, 'Flicker', 2, 2, 3, 3, 'Epic'),
(null, 'Killing Edge', 2, 2, 3, 3, 'Basic'),
(null, 'Onyx Bear Seal', 2, 2, 3, 3, 'Epic'),
(null, 'Substitution', 2, 2, 3, 3, 'Epic'),
(null, 'Thunderbomb', 2, 2, 3, 3, 'Common'),
(null, 'Twin Strike', 2, 2, 3, 3, 'Common'),
(null, 'Ancestral Divination', 2, 2, 3, 4, 'Common'),
(null, 'Cobra Strike', 2, 2, 3, 4, 'Epic'),
(null, 'Pandamonium', 2, 2, 3, 4, 'Epic'),
(null, 'Heaven\'s Eclipse', 2, 2, 3, 5, 'Legendary'),
(null, 'Seeker Squad', 2, 2, 3, 5, 'Legendary'),
(null, 'Twilight Reiki', 2, 2, 3, 5, 'Legendary'),
(null, 'Bombard', 2, 2, 3, 6, 'Rare'),
(null, 'Firestorm Mantra', 2, 2, 3, 6, 'Epic'),
(null, 'Koan of Horns', 2, 2, 3, 8, 'Legendary'),
(null, 'Spiral Technique', 2, 2, 3, 8, 'Epic');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Crescent Spear', 2, 3, 3, 1, 'Legendary'),
(null, 'Bloodrage Mask', 2, 3, 3, 2, 'Basic'),
(null, 'Mask of Shadows', 2, 3, 3, 2, 'Legendary'),
(null, 'Bangle of Blinding Stike', 2, 3, 3, 3, 'Rare'),
(null, 'Cyclone Mask', 2, 3, 3, 3, 'Epic'),
(null, 'Unbounded Energy Amulet', 2, 3, 3, 3, 'Legendary'),
(null, 'Ornate Hiogi', 2, 3, 3, 6, 'Rare');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, attack, health) values
(null, 'Zirix Starstrider', 3, 4, 1, 2, 25),
(null, 'Scioness Sajj', 3, 4, 1, 2, 25),
(null, 'Ciphyron Ascendant', 3, 4, 1, 2, 25);

insert into karta values
(null, 'Rae', 3, 1, 3, 0, 1, 1, 'Common'),
(null, 'Dreamshaper', 3, 1, 3, 2, 2, 2, 'Common'),
(null, 'Dunecaster', 3, 1, 3, 2, 2, 1, 'Common'),
(null, 'Duskweaver', 3, 1, 3, 2, 1, 1, 'Common'),
(null, 'Ethereal Obelysk', 3, 1, 3, 2, 0, 6, 'Basic'),
(null, 'Lavastorm Obelysk', 3, 1, 3, 2, 0, 4, 'Rare'),
(null, 'Pax', 3, 1, 3, 2, 2, 1, 'Rare'),
(null, 'Pyromancer', 3, 1, 3, 2, 2, 1, 'Basic'),
(null, 'Wind Slicer', 3, 1, 3, 2, 2, 3, 'Rare'),
(null, 'Falcius', 3, 1, 3, 3, 3, 3, 'Common'),
(null, 'Fate Watcher', 3, 1, 3, 3, 2, 3, 'Common'),
(null, 'Fireblaze Obelysk', 3, 1, 3, 3, 0, 6, 'Rare'),
(null, 'Imperial Mechanyst', 3, 1, 3, 3, 2, 5, 'Rare'),
(null, 'Orb Weaver', 3, 1, 3, 3, 2, 2, 'Common'),
(null, 'Portal Guardian', 3, 1, 3, 3, 0, 6, 'Epic'),
(null, 'Sand Howler', 3, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Skyppy', 3, 1, 3, 3, 3, 3, 'Common'),
(null, 'Simulacra Obelysk	', 3, 1, 3, 3, 0, 7, 'Legendary'),
(null, 'Windstorm Obelysk', 3, 1, 3, 3, 0, 6, 'Common'),
(null, 'Zephyr', 3, 1, 3, 3, 3, 3, 'Common'),
(null, 'Allomancer', 3, 1, 3, 4, 4, 3, 'Epic'),
(null, 'Barren Shrike', 3, 1, 3, 4, 5, 5, 'Common'),
(null, 'Mirage Master', 3, 1, 3, 4, 1, 1, 'Epic'),
(null, 'Sand Sister Saon', 3, 1, 3, 4, 3, 4, 'Legendary'),
(null, 'Trygon Obelysk', 3, 1, 3, 4, 0, 9, 'Legendary'),
(null, 'Wasteland Wraith', 3, 1, 3, 4, 1, 5, 'Epic'),
(null, 'Wind Shrike', 3, 1, 3, 4, 4, 3, 'Basic'),
(null, 'Wind Striker', 3, 1, 3, 4, 1, 4, 'Epic'),
(null, 'Gust', 3, 1, 3, 5, 3, 5, 'Epic'),
(null, 'Incinera', 3, 1, 3, 5, 5, 6, 'Rare'),
(null, 'Nimbus', 3, 1, 3, 5, 3, 8, 'Legendary'),
(null, 'Sandswirl Reader', 3, 1, 3, 5, 3, 4, 'Rare'),
(null, 'Silica Weaver', 3, 1, 3, 5, 4, 4, 'Rare'),
(null, 'Sirocco', 3, 1, 3, 5, 4, 3, 'Legendary'),
(null, 'Starfire Scarab', 3, 1, 3, 5, 4, 6, 'Common'),
(null, 'Aymara Healer', 3, 1, 3, 6, 5, 5, 'Legendary'),
(null, 'Grapnel Paradigm', 3, 1, 3, 6, 5, 5, 'Legendary'),
(null, 'Pantheran', 3, 1, 3, 6, 6, 6, 'Epic'),
(null, 'Oserix', 3, 1, 3, 7, 8, 6, 'Legendary'),
(null, 'Grandmaster Nosh-Rak', 3, 1, 3, 8, 4, 8, 'Legendary');

insert into karta 
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Burden of Knowledge', 3, 2, 3, 0, 'Common'),
(null, 'Syphon Energy', 3, 2, 3, 0, 'Common'),
(null, 'Arid Unmaking', 3, 2, 3, 1, 'Common'),
(null, 'Auroras Tears', 3, 2, 3, 1, 'Epic'),
(null, 'Azure Summoning', 3, 2, 3, 1, 'Epic'),
(null, 'Blindscorch', 3, 2, 3, 1, 'Basic'),
(null, 'Droplift', 3, 2, 3, 1, 'Rare'),
(null, 'Kinematic Projection', 3, 2, 3, 1, 'Rare'),
(null, 'Stone to Spears', 3, 2, 3, 1, 'Rare'),
(null, 'Cosmic Flesh', 3, 2, 3, 2, 'Basic'),
(null, 'Scions First Wish', 3, 2, 3, 1, 'Basic'),
(null, 'Bone Swarm', 3, 2, 3, 2, 'Common'),
(null, 'Equality Constraint', 3, 2, 3, 2, 'Common'),
(null, 'Fountain of Youth', 3, 2, 3, 2, 'Rare'),
(null, 'Neurolink', 3, 2, 3, 2, 'Epic'),
(null, 'Rashas Curse', 3, 2, 3, 2, 'Epic'),
(null, 'Reassemble', 3, 2, 3, 2, 'Common'),
(null, 'Sand Trap', 3, 2, 3, 2, 'Common'),
(null, 'Scions Second Wish', 3, 2, 3, 2, 'Basic'),
(null, 'Whisper of the Sands', 3, 2, 3, 2, 'Common'),
(null, 'Astral Flood', 3, 2, 3, 3, 'Common'),
(null, 'Astral Phasing', 3, 2, 3, 3, 'Common'),
(null, 'Divine Spark', 3, 2, 3, 3, 'Common'),
(null, 'Inner Oasis', 3, 2, 3, 3, 'Rare'),
(null, 'Psychic Conduit', 3, 2, 3, 3, 'Rare'),
(null, 'Scions Third Wish', 3, 2, 3, 3, 'Legendary'),
(null, 'Time Maelstrom', 3, 2, 3, 3, 'Legendary'),
(null, 'Entropic Decay', 3, 2, 3, 4, 'Basic'),
(null, 'Lost in the Desert', 3, 2, 3, 4, 'Epic'),
(null, 'Blood of Air', 3, 2, 3, 5, 'Common'),
(null, 'Corpse Combustion', 3, 2, 3, 5, 'Epic'),
(null, 'Stars Fury', 3, 2, 3, 5, 'Epic'),
(null, 'Superior Mirage', 3, 2, 3, 5, 'Epic'),
(null, 'Autarchs Gifts', 3, 2, 3, 6, 'Epic'),
(null, 'Cataclysmic Fault', 3, 2, 3, 6, 'Legendary'),
(null, 'Dominate Will', 3, 2, 3, 7, 'Rare'),
(null, 'Circle of Dessication', 3, 2, 3, 8, 'Legendary'),
(null, 'Monolithic Vision', 3, 2, 3, 9, 'Legendary');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Oblivion Sickle', 3, 3, 3, 1, 'Legendary'),
(null, 'Iris Barrier', 3, 3, 3, 2, 'Rare'),
(null, 'Staff of Ykir', 3, 3, 3, 2, 'Basic'),
(null, 'Wildfire Ankh', 3, 3, 3, 3, 'Epic'),
(null, 'Hexblade', 3, 3, 3, 4, 'Legendary'),
(null, 'Thunderclap', 3, 3, 3, 4, 'Rare'),
(null, 'Spinecleaver', 3, 3, 3, 5, 'Legendary');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, attack, health) values
(null, 'Vaath the Immortal', 4, 4, 1, 2, 25),
(null, 'Starhorn the Seeker', 4, 4, 1, 2, 25),
(null, 'Ragnora the Relentless', 4, 4, 1, 2, 25);

insert into karta values
(null, 'Rex', 4, 1, 3, 1, 3, 1, 'Common'),
(null, 'Biomimetic Hulk', 4, 1, 3, 2, 10, 10, 'Common'),
(null, 'Gro', 4, 1, 3, 2, 2, 4, 'Rare'),
(null, 'Kujata', 4, 1, 3, 2, 2, 2, 'Epic'),
(null, 'Phalanxar', 4, 1, 3, 2, 6, 1, 'Basic'),
(null, 'Rancour', 4, 1, 3, 2, 1, 3, 'Rare'),
(null, 'Seismoid', 4, 1, 3, 2, 3, 1, 'Rare'),
(null, 'Warpup', 4, 1, 3, 2, 1, 1, 'Rare'),
(null, 'Young Silithar', 4, 1, 3, 2, 2, 3, 'Common'),
(null, 'Catalyst Quillbeast', 4, 1, 3, 3, 3, 4, 'Common'),
(null, 'Earth Walker', 4, 1, 3, 3, 3, 3, 'Basic'),
(null, 'Erratic Raptyr', 4, 1, 3, 3, 5, 5, 'Common'),
(null, 'Moloki Huntress', 4, 1, 3, 3, 1, 2, 'Epic'),
(null, 'Primordial Gazer', 4, 1, 3, 3, 2, 2, 'Basic'),
(null, 'Ragebinder', 4, 1, 3, 3, 3, 4, 'Common'),
(null, 'Terradon', 4, 1, 3, 3, 2, 8, 'Common'),
(null, 'Thraex', 4, 1, 3, 3, 2, 4, 'Common'),
(null, 'Vindicator', 4, 1, 3, 3, 1, 3, 'Legendary'),
(null, 'Drogon', 4, 1, 3, 4, 5, 4, 'Legendary'),
(null, 'Earth Sister Taygete', 4, 1, 3, 4, 3, 4, 'Legendary'),
(null, 'Elucidator', 4, 1, 3, 4, 5, 4, 'Rare'),
(null, 'Gigaloth', 4, 1, 3, 4, 7, 7, 'Legendary'),
(null, 'Grimrock', 4, 1, 3, 4, 3, 4, 'Common'),
(null, 'Omniseer', 4, 1, 3, 4, 4, 5, 'Rare'),
(null, 'Progenitor', 4, 1, 3, 4, 5, 4, 'Legendary'),
(null, 'Rizen', 4, 1, 3, 4, 3, 2, 'Epic'),
(null, 'Veteran Silithar', 4, 1, 3, 4, 4, 3, 'Common'),
(null, 'Wild Inceptor', 4, 1, 3, 4, 3, 3, 'Common'),
(null, 'Kolossus', 4, 1, 3, 5, 1, 7, 'Common'),
(null, 'Lavaslasher', 4, 1, 3, 5, 4, 7, 'Epic'),
(null, 'Spirit Harvester', 4, 1, 3, 5, 5, 5, 'Rare'),
(null, 'Visionar', 4, 1, 3, 5, 6, 3, 'Epic'),
(null, 'Armada', 4, 1, 3, 6, 5, 6, 'Epic'),
(null, 'Dreadnought', 4, 1, 3, 6, 4, 6, 'Legendary'),
(null, 'Makantor Warbeast', 4, 1, 3, 6, 4, 4, 'Epic'),
(null, 'Silithar Elder', 4, 1, 3, 7, 6, 6, 'Legendary'),
(null, 'Unstable Leviathan', 4, 1, 3, 7, 11, 11, 'Rare'),
(null, 'Juggernaut', 4, 1, 3, 8, 4, 10, 'Legendary'),
(null, 'Grandmaster Kraigon', 4, 1, 3, 9, 7, 7, 'Legendary'),
(null, 'Mandrake', 4, 1, 3, 12, 6, 6, 'Rare');

insert into karta 
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Dampening Wave', 4, 2, 3, 0, 'Basic'),
(null, 'Flash Reincarnation', 4, 2, 3, 0, 'Rare'),
(null, 'Amplification', 4, 2, 3, 1, 'Common'),
(null, 'Dance of Dreams', 4, 2, 3, 1, 'Basic'),
(null, 'Greater Fortitude', 4, 2, 3, 1, 'Basic'),
(null, 'Lava Lance', 4, 2, 3, 1, 'Common'),
(null, 'Razor Skin', 4, 2, 3, 1, 'Common'),
(null, 'Cascading Rebirth', 4, 2, 3, 2, 'Common'),
(null, 'Diretide Frenzy', 4, 2, 3, 2, 'Common'),
(null, 'Embryotic Insight', 4, 2, 3, 2, 'Common'),
(null, 'Entropic Gaze', 4, 2, 3, 2, 'Common'),
(null, 'Natural Selection', 4, 2, 3, 2, 'Basic'),
(null, 'Primal Ballast', 4, 2, 3, 2, 'Rare'),
(null, 'Tremor', 4, 2, 3, 2, 'Common'),
(null, 'Vaaths Brutality', 4, 2, 3, 2, 'Rare'),
(null, 'Effulgent Infusion', 4, 2, 3, 3, 'Common'),
(null, 'Endure the Beastlands', 4, 2, 3, 3, 'Epic'),
(null, 'Kinetic Equilibrium', 4, 2, 3, 3, 'Rare'),
(null, 'Tectonic Spikes', 4, 2, 3, 3, 'Rare'),
(null, 'Upper Hand', 4, 2, 3, 3, 'Rare'),
(null, 'Blood Rage', 4, 2, 3, 4, 'Common'),
(null, 'Earth Sphere', 4, 2, 3, 4, 'Common'),
(null, 'Egg Morph', 4, 2, 3, 4, 'Rare'),
(null, 'Homeostatic Rebuke', 4, 2, 3, 4, 'Epic'),
(null, 'Mind Steal', 4, 2, 3, 4, 'Epic'),
(null, 'Pupabomb', 4, 2, 3, 4, 'Epic'),
(null, 'Thumping Wave', 4, 2, 3, 4, 'Rare'),
(null, 'Valknus Seal', 4, 2, 3, 4, 'Epic'),
(null, 'Verdant Fulmination', 4, 2, 3, 4, 'Epic'),
(null, 'Natures Confluence', 4, 2, 3, 5, 'Epic'),
(null, 'Plasma Storm', 4, 2, 3, 5, 'Basic'),
(null, 'Chrysalis Burst', 4, 2, 3, 6, 'Legendary'),
(null, 'Fractal Replication', 4, 2, 3, 6, 'Epic'),
(null, 'Metamorphosis', 4, 2, 3, 6, 'Legendary'),
(null, 'Bounded Lifeforce', 4, 2, 3, 7, 'Epic'),
(null, 'Evolutionary Apex', 4, 2, 3, 7, 'Legendary'),
(null, 'Flaming Stampede', 4, 2, 3, 8, 'Legendary'),
(null, 'Saurian Finality', 4, 2, 3, 8, 'Legendary');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Eternal Heart', 4, 3, 3, 1, 'Legendary'),
(null, 'Godhammer', 4, 3, 3, 1, 'Rare'),
(null, 'Rage Reactor', 4, 3, 3, 1, 'Rare'),
(null, 'Iridium Scale', 4, 3, 3, 2, 'Epic'),
(null, 'Twin Fang', 4, 3, 3, 3, 'Legendary'),
(null, 'Adamantite Claws', 4, 3, 3, 4, 'Basic'),
(null, 'Morin-Khur', 4, 3, 3, 5, 'Legendary');


insert into karta
(sifra, naziv, klasa, tip, ogranicenje, attack, health) values
(null, 'Lilithe Bligthchaser', 5, 4, 1, 2, 25),
(null, 'Cassyva Soulreaper', 5, 4, 1, 2, 25),
(null, 'Maehv Skinsolder', 5, 4, 1, 2, 25);

insert into karta values
(null, 'Abyssal Crawler', 5, 1, 3, 1, 2, 1, 'Basic'),
(null, 'Furiousa', 5, 1, 3, 1, 1, 2, 'Common'),
(null, 'Blood Siren', 5, 1, 3, 2, 3, 2, 'Common'),
(null, 'Darkspine Elemental', 5, 1, 3, 2, 1, 4, 'Rare'),
(null, 'Gloomchaser', 5, 1, 3, 2, 2, 2, 'Basic'),
(null, 'Gor', 5, 1, 3, 2, 1, 1, 'Common'),
(null, 'Nightmare Operant', 5, 1, 3, 2, 3, 2, 'Rare'),
(null, 'Nocturne', 5, 1, 3, 2, 2, 2, 'Epic'),
(null, 'Ooz', 5, 1, 3, 2, 3, 3, 'Rare'),
(null, 'Phantasm', 5, 1, 3, 2, 3, 2, 'Common'),
(null, 'Blood Baronette', 5, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Bound Tormentor', 5, 1, 3, 3, 2, 3, 'Common'),
(null, 'Horror Burster', 5, 1, 3, 3, 4, 1, 'Rare'),
(null, 'Nightsorrow Assassin', 5, 1, 3, 3, 2, 1, 'Common'),
(null, 'Shadow Watcher', 5, 1, 3, 3, 2, 2, 'Basic'),
(null, 'Skullprophet', 5, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Xerroloth', 5, 1, 3, 3, 3, 2, 'Rare'),
(null, 'Void Talon', 5, 1, 3, 3, 6, 1, 'Common'),
(null, 'Abyssal Juggernaut', 5, 1, 3, 4, 3, 3, 'Common'),
(null, 'Bloodtide Priestess', 5, 1, 3, 4, 3, 3, 'Rare'),
(null, 'Cacophynos', 5, 1, 3, 4, 6, 3, 'Common'),
(null, 'Deepfire Devourer', 5, 1, 3, 4, 4, 4, 'Common'),
(null, 'Desolator', 5, 1, 3, 4, 3, 1, 'Legendary'),
(null, 'Gate to the Undervault', 5, 1, 3, 4, 0, 0, 'Legendary'),
(null, 'Nekomata', 5, 1, 3, 4, 4, 2, 'Epic'),
(null, 'Nightshroud', 5, 1, 3, 4, 5, 1, 'Common'),
(null, 'Shadow Sister Kelaino', 5, 1, 3, 4, 3, 3, 'Legendary'),
(null, 'Black Solus', 5, 1, 3, 5, 4, 7, 'Epic'),
(null, 'Night Fiend', 5, 1, 3, 5, 3, 3, 'Common'),
(null, 'Reaper of the Nine Moons', 5, 1, 3, 5, 5, 3, 'Epic'),
(null, 'Shadowdancer', 5, 1, 3, 5, 4, 4, 'Rare'),
(null, 'Klaxon', 5, 1, 3, 6, 6, 6, 'Legendary'),
(null, 'Moonrider', 5, 1, 3, 6, 6, 6, 'Epic'),
(null, 'Vorpal Reaver', 5, 1, 3, 6, 6, 6, 'Legendary'),
(null, 'Arcane Devourer', 5, 1, 3, 7, 8, 4, 'Epic'),
(null, 'Stygian Observer', 5, 1, 3, 7, 7, 7, 'Legendary'),
(null, 'Death Knell', 5, 1, 3, 8, 8, 6, 'Legendary'),
(null, 'Grandmaster Variax', 5, 1, 3, 8, 8, 8, 'Legendary'),
(null, 'Spectral Revenant', 5, 1, 3, 8, 6, 6, 'Legendary');

insert into karta 
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Darkfire Sacrifice', 5, 2, 3, 0, 'Rare'),
(null, 'Grasp of Agony', 5, 2, 3, 1, 'Common'),
(null, 'Inkling Surge', 5, 2, 3, 1, 'Common'),
(null, 'Nethermeld', 5, 2, 3, 1, 'Epic'),
(null, 'Sphere of Darkness', 5, 2, 3, 1, 'Common'),
(null, 'Void Pulse', 5, 2, 3, 1, 'Common'),
(null, 'Aphotic Drain', 5, 2, 3, 2, 'Common'),
(null, 'Choking Tendrils', 5, 2, 3, 2, 'Common'),
(null, 'Consuming Rebirth', 5, 2, 3, 2, 'Epic'),
(null, 'Daemonic Lure', 5, 2, 3, 2, 'Epic'),
(null, 'Deathmark', 5, 2, 3, 2, 'Rare'),
(null, 'Echoing Shriek', 5, 2, 3, 2, 'Epic'),
(null, 'Inkhorn Gaze', 5, 2, 3, 2, 'Common'),
(null, 'Lurking Fear', 5, 2, 3, 2, 'Epic'),
(null, 'Punish', 5, 2, 3, 2, 'Rare'),
(null, 'Shadowstalk', 5, 2, 3, 2, 'Rare'),
(null, 'Soulshatter Pact', 5, 2, 3, 2, 'Basic'),
(null, 'Abhorrent Unbirth', 5, 2, 3, 3, 'Epic'),
(null, 'Blood Echoes', 5, 2, 3, 3, 'Common'),
(null, 'Deathfire Crescendo', 5, 2, 3, 3, 'Legendary'),
(null, 'Horrific Visage', 5, 2, 3, 3, 'Common'),
(null, 'Infest', 5, 2, 3, 3, 'Legendary'),
(null, 'Ritual Banishing', 5, 2, 3, 3, 'Rare'),
(null, 'Shadow Reflection', 5, 2, 3, 3, 'Common'),
(null, 'Void Steal', 5, 2, 3, 3, 'Rare'),
(null, 'Wraithling Fury', 5, 2, 3, 3, 'Epic'),
(null, 'Wraithling Swarm', 5, 2, 3, 3, 'Basic'),
(null, 'Breath of the Unborn', 5, 2, 3, 4, 'Common'),
(null, 'Dark Seed', 5, 2, 3, 4, 'Rare'),
(null, 'Shadow Nova', 5, 2, 3, 4, 'Basic'),
(null, 'Vellumscry', 5, 2, 3, 4, 'Common'),
(null, 'Corporeal Cadence', 5, 2, 3, 5, 'Epic'),
(null, 'Dark Transformation', 5, 2, 3, 5, 'Basic'),
(null, 'Nether Summoning', 5, 2, 3, 5, 'Legendary'),
(null, 'Betrayal', 5, 2, 3, 6, 'Epic'),
(null, 'Necrotic Sphere', 5, 2, 3, 6, 'Epic'),
(null, 'Rite of the Undervault', 5, 2, 3, 6, 'Epic'),
(null, 'Obliterate', 5, 2, 3, 8, 'Legendary'),
(null, 'Doom', 5, 2, 3, 9, 'Legendary');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Horn of the Forsaken', 5, 3, 3, 1, 'Basic'),
(null, 'Spectral Blade', 5, 3, 3, 2, 'Epic'),
(null, 'Mindlathe', 5, 3, 3, 3, 'Legendary'),
(null, 'Soul Grimwar', 5, 3, 3, 3, 'Legendary'),
(null, 'Ghost Azalea', 5, 3, 3, 4, 'Legendary'),
(null, 'The Releaser', 5, 3, 3, 3, 'Rare'),
(null, 'Furor Chakram', 5, 3, 3, 5, 'Rare');


insert into karta
(sifra, naziv, klasa, tip, ogranicenje, attack, health) values
(null, 'Faie Bloodwing', 6, 4, 1, 2, 25),
(null, 'Kara Winterblade', 6, 4, 1, 2, 25),
(null, 'Ilena Cryobyte', 6, 4, 1, 2, 25);

insert into karta values
(null, 'Snowchaser', 6, 1, 3, 1, 2, 1, 'Rare'),
(null, 'Borean Bear', 6, 1, 3, 2, 1, 3, 'Common'),
(null, 'Bur', 6, 1, 3, 2, 3, 3, 'Rare'),
(null, 'Circulus', 6, 1, 3, 2, 1, 1, 'Epic'),
(null, 'Cryoblade', 6, 1, 3, 2, 2, 3, 'Common'),
(null, 'Crystal Arbiter', 6, 1, 3, 2, 1, 4, 'Common'),
(null, 'Crystal Cloaker', 6, 1, 3, 2, 2, 3, 'Basic'),
(null, 'Crystal Wisp', 6, 1, 3, 2, 1, 1, 'Common'),
(null, 'Hearth-Sister', 6, 1, 3, 2, 3, 2, 'Common'),
(null, 'Icy', 6, 1, 3, 2, 2, 3, 'Common'),
(null, 'Protosensor', 6, 1, 3, 2, 2, 2, 'Common'),
(null, 'Shivers', 6, 1, 3, 2, 2, 1, 'Epic'),
(null, 'Drake Dowager', 6, 1, 3, 3, 1, 3, 'Rare'),
(null, 'Fenrir Warmaster', 6, 1, 3, 3, 3, 2, 'Basic'),
(null, 'Freeblade', 6, 1, 3, 3, 3, 5, 'Common'),
(null, 'Glacial Elemental', 6, 1, 3, 3, 2, 3, 'Rare'),
(null, 'Iceblade Dryad', 6, 1, 3, 3, 3, 3, 'Epic'),
(null, 'Kindred Hunter', 6, 1, 3, 3, 3, 3, 'Common'),
(null, 'Moonlit Basilysk', 6, 1, 3, 3, 2, 2, 'Rare'),
(null, 'Myriad', 6, 1, 3, 3, 3, 3, 'Common'),
(null, 'Snow Rippler', 6, 1, 3, 3, 3, 4, 'Common'),
(null, 'Wolfraven', 6, 1, 3, 3, 1, 4, 'Common'),
(null, 'Denadoro', 6, 1, 3, 4, 4, 5, 'Legendary'),
(null, 'Hydrogarm', 6, 1, 3, 4, 3, 3, 'Epic'),
(null, 'Razorback', 6, 1, 3, 4, 4, 3, 'Rare'),
(null, 'Sleet Dasher', 6, 1, 3, 4, 3, 6, 'Rare'),
(null, 'Voice of the Wind', 6, 1, 3, 4, 4, 4, 'Legendary'),
(null, 'Wind Sister Maia', 6, 1, 3, 4, 4, 5, 'Legendary'),
(null, 'Arctic Displacer', 6, 1, 3, 5, 10, 4, 'Basic'),
(null, 'Frosthorn Rhyno', 6, 1, 3, 5, 6, 5, 'Epic'),
(null, 'Frostiva', 6, 1, 3, 5, 3, 3, 'Legendary'),
(null, 'Huldra', 6, 1, 3, 5, 3, 4, 'Rare'),
(null, 'Draugar Eyolith', 6, 1, 3, 6, 7, 14, 'Legendary'),
(null, 'Draugar Lord', 6, 1, 3, 6, 4, 8, 'Epic'),
(null, 'Echo Deliverant', 6, 1, 3, 6, 6, 4, 'Rare'),
(null, 'Ancient Grove', 6, 1, 3, 7, 7, 7, 'Legendary'),
(null, 'Ghost Seraphim', 6, 1, 3, 7, 8, 9, 'Legendary'),
(null, 'Grandmaster Embla', 6, 1, 3, 8, 5, 5, 'Legendary'),
(null, 'Matron Elveiti', 6, 1, 3, 8, 7, 5, 'Legendary');

insert into karta 
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Flash Freeze', 6, 2, 3, 0, 'Basic'),
(null, 'Polarity', 6, 2, 3, 0, 'Common'),
(null, 'Essence Sculpt', 6, 2, 3, 1, 'Rare'),
(null, 'Mana Deathgrip', 6, 2, 3, 1, 'Common'),
(null, 'Mesmerize', 6, 2, 3, 1, 'Rare'),
(null, 'Vespyric Call', 6, 2, 3, 1, 'Epic'),
(null, 'Aspect of the Bear', 6, 2, 3, 2, 'Common'),
(null, 'Aspect of the Ravager', 6, 2, 3, 2, 'Basic'),
(null, 'Ascept of Shimzar', 6, 2, 3, 2, 'Common'),
(null, 'Bonechill Barrier', 6, 2, 3, 2, 'Common'),
(null, 'Boundless Courage', 6, 2, 3, 2, 'Epic'),
(null, 'Chromatic Cold', 6, 2, 3, 2, 'Basic'),
(null, 'Concealing Shroud', 6, 2, 3, 2, 'Rare'),
(null, 'Frigid Corona', 6, 2, 3, 2, 'Common'),
(null, 'Frostfire', 6, 2, 3, 2, 'Basic'),
(null, 'Gravity Well', 6, 2, 3, 2, 'Legendary'),
(null, 'Hailstone Prison', 6, 2, 3, 2, 'Common'),
(null, 'Lightning Blitz', 6, 2, 3, 2, 'Epic'),
(null, 'Mark of Solitude', 6, 2, 3, 2, 'Rare'),
(null, 'Shatter', 6, 2, 3, 2, 'Common'),
(null, 'Blazing Spines', 6, 2, 3, 3, 'Rare'),
(null, 'Crystalline Reinforcement', 6, 2, 3, 3, 'Epic'),
(null, 'Glacial Fissure', 6, 2, 3, 3, 'Epic'),
(null, 'Aspect of the Wyrm', 6, 2, 3, 4, 'Epic'),
(null, 'Avalanche', 6, 2, 3, 4, 'Basic'),
(null, 'Blinding Snowstorm', 6, 2, 3, 4, 'Common'),
(null, 'Cryogenesis', 6, 2, 3, 4, 'Common'),
(null, 'Wailing Overdrive', 6, 2, 3, 4, 'Common'),
(null, 'Wintertide', 6, 2, 3, 4, 'Epic'),
(null, 'Auroraboros', 6, 2, 3, 5, 'Legendary'),
(null, 'Enfeeble', 6, 2, 3, 5, 'Epic'),
(null, 'Luminous Charge', 6, 2, 3, 5, 'Rare'),
(null, 'Spirit of the Wild', 6, 2, 3, 5, 'Epic'),
(null, 'Vespyrian Might', 6, 2, 3, 5, 'Common'),
(null, 'Aspect of the Mountains', 6, 2, 3, 6, 'Legendary'),
(null, 'Frostburn', 6, 2, 3, 6, 'Rare'),
(null, 'Icebreak Ambush', 6, 2, 3, 6, 'Epic'),
(null, 'Flawless Reflection', 6, 2, 3, 7, 'Legendary'),
(null, 'Winters Wake', 6, 2, 3, 8, 'Legendary');

insert into karta
(sifra, naziv, klasa, tip, ogranicenje, mana, rarity) values
(null, 'Iceshatter Gauntlet', 6, 3, 3, 1, 'Rare'),
(null, 'Coldbiter', 6, 3, 3, 2, 'Legendary'),
(null, 'Snowpiercer', 6, 3, 3, 3, 'Basic'),
(null, 'The Dredger', 6, 3, 3, 3, 'Legendary'),
(null, 'White Asp', 6, 3, 3, 4, 'Legendary'),
(null, 'Winterblade', 6, 3, 3, 4, 'Epic'),
(null, 'Animus Plate', 6, 3, 3, 5, 'Rare');

insert into karta values
(null, 'Bloodtear Alchemist', 7, 1, 3, 1, 2, 1, 'Basic'),
(null, 'Dragonlark', 7, 1, 3, 1, 2, 1, 'Basic'),
(null, 'Dreamgazer', 7, 1, 3, 1, 1, 1, 'Epic'),
(null, 'Helm of MECHAZ0R', 7, 1, 3, 1, 2, 2, 'Common'),
(null, 'Koi', 7, 1, 3, 1, 3, 1, 'Common'),
(null, 'Komodo Charger', 7, 1, 3, 1, 1, 3, 'Basic'),
(null, 'Planar Scout', 7, 1, 3, 1, 2, 1, 'Basic'),
(null, 'Prophet of the White Palm', 7, 1, 3, 1, 1, 1, 'Rare'),
(null, 'Swamp Entangler', 7, 1, 3, 1, 0, 3, 'Common'),
(null, 'Zyx', 7, 1, 3, 1, 1, 2, 'Rare'),
(null, 'Aethermaster', 7, 1, 3, 2, 1, 3, 'Epic'),
(null, 'Amu', 7, 1, 3, 2, 3, 3, 'Common'),
(null, 'Araki Headhunter', 7, 1, 3, 2, 1, 3, 'Epic'),
(null, 'Azure Herald', 7, 1, 3, 2, 1, 4, 'Common'),
(null, 'Azure Horn Shaman', 7, 1, 3, 2, 1, 4, 'Rare'),
(null, 'Bluetip Scorpion', 7, 1, 3, 2, 3, 1, 'Common'),
(null, 'Celebrant', 7, 1, 3, 2, 1, 4, 'Rare'),
(null, 'Carcynus', 7, 1, 3, 2, 1, 5, 'Common'),
(null, 'Cryptographer', 7, 1, 3, 2, 2, 2, 'Common'),
(null, 'Ephemeral Shroud', 7, 1, 3, 2, 1, 1, 'Basic'),
(null, 'Flameblood Warlock', 7, 1, 3, 2, 3, 1, 'Rare'),
(null, 'Ghost Lynx', 7, 1, 3, 2, 2, 1, 'Common'),
(null, 'Golem Metallurgist', 7, 1, 3, 2, 2, 3, 'Rare'),
(null, 'Healing Mystic', 7, 1, 3, 2, 2, 3, 'Basic'),
(null, 'Jaxi', 7, 1, 3, 2, 1, 1, 'Common'),
(null, 'Lost Artificer', 7, 1, 3, 2, 2, 3, 'Rare'),
(null, 'Manaforger', 7, 1, 3, 2, 1, 3, 'Rare'),
(null, 'Maw', 7, 1, 3, 2, 2, 2, 'Common'),
(null, 'Metaltooth', 7, 1, 3, 2, 2, 2, 'Common'),
(null, 'Piercing Mantis', 7, 1, 3, 2, 2, 2, 'Basic'),
(null, 'Primus Fist', 7, 1, 3, 2, 2, 3, 'Common'),
(null, 'Recombobulus', 7, 1, 3, 2, 2, 3, 'Common'),
(null, 'Replicant', 7, 1, 3, 2, 2, 2, 'Common'),
(null, 'Rescue-RX', 7, 1, 3, 2, 2, 4, 'Common'),
(null, 'Rock Pulverizer', 7, 1, 3, 2, 1, 4, 'Basic'),
(null, 'Rust Crawler', 7, 1, 3, 2, 2, 3, 'Common'),
(null, 'Shiro Puppydragon', 7, 1, 3, 2, 1, 4, 'Common'),
(null, 'Sinister Silhouette', 7, 1, 3, 2, 1, 2, 'Rare'),
(null, 'Skyrock Golem', 7, 1, 3, 2, 3, 2, 'Basic'),
(null, 'Sol', 7, 1, 3, 2, 1, 1, 'Rare'),
(null, 'Vale Hunter', 7, 1, 3, 2, 1, 2, 'Basic'),
(null, 'Wings of MECHAZ0R', 7, 1, 3, 2, 1, 4, 'Common'),
(null, 'Wood-Wen', 7, 1, 3, 2, 2, 2, 'Common'),
(null, 'Z0r', 7, 1, 3, 2, 2, 1, 'Epic'),
(null, 'Abjudicator', 7, 1, 3, 3, 3, 1, 'Rare'),
(null, 'Alcuin Loremaster', 7, 1, 3, 3, 3, 1, 'Epic'),
(null, 'Architect-T2K5', 7, 1, 3, 3, 1, 4, 'Epic'),
(null, 'Bastion', 7, 1, 3, 3, 0, 5, 'Epic'),
(null, 'Blaze Hound', 7, 1, 3, 3, 4, 3, 'Common'),
(null, 'Bloodbound Mentor', 7, 1, 3, 3, 3, 4, 'Epic'),
(null, 'Bloodshard Golem', 7, 1, 3, 3, 4, 3, 'Basic'),
(null, 'Cannon of MECHAZ0R', 7, 1, 3, 3, 2, 2, 'Rare'),
(null, 'Chaos Elemental', 7, 1, 3, 3, 4, 4, 'Epic'),
(null, 'Crimson Oculus', 7, 1, 3, 3, 2, 3, 'Rare'),
(null, 'Crossbones', 7, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Day Watcher', 7, 1, 3, 3, 3, 3, 'Common'),
(null, 'Elkowl', 7, 1, 3, 3, 2, 3, 'Rare'),
(null, 'Ghoulie', 7, 1, 3, 3, 3, 4, 'Common'),
(null, 'Golden Mantella', 7, 1, 3, 3, 4, 2, 'Common'),
(null, 'Golem Vanquisher', 7, 1, 3, 3, 2, 4, 'Legendary'),
(null, 'Hydrax', 7, 1, 3, 3, 3, 3, 'Legendary'),
(null, 'Ion', 7, 1, 3, 3, 2, 3, 'Rare'),
(null, 'Komodo Hunter', 7, 1, 3, 3, 5, 6, 'Common'),
(null, 'Lady Locke', 7, 1, 3, 3, 2, 2, 'Legendary'),
(null, 'Mirkblood Devourer', 7, 1, 3, 3, 2, 4, 'Legendary'),
(null, 'Mogwai', 7, 1, 3, 3, 2, 3, 'Epic'),
(null, 'Prismatic Illusionist', 7, 1, 3, 3, 2, 3, 'Rare'),
(null, 'Putrid Dreadflayer', 7, 1, 3, 3, 2, 4, 'Basic'),
(null, 'Redsteel Minos', 7, 1, 3, 3, 2, 3, 'Common'),
(null, 'Repulsor Beast', 7, 1, 3, 3, 2, 2, 'Basic'),
(null, 'Rokadoptera', 7, 1, 3, 3, 2, 3, 'Common'),
(null, 'Sand Burrower', 7, 1, 3, 3, 2, 4, 'Common'),
(null, 'Sapphire Seer', 7, 1, 3, 3, 2, 2, 'Common'),
(null, 'Sarlac the Eternal', 7, 1, 3, 3, 1, 1, 'Legendary'),
(null, 'Silvertongue Corsair', 7, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Skywing', 7, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Soboro', 7, 1, 3, 3, 2, 4, 'Epic'),
(null, 'Sojourner', 7, 1, 3, 3, 1, 5, 'Rare'),
(null, 'Songweaver', 7, 1, 3, 3, 3, 3, 'Common'),
(null, 'Sun Seer', 7, 1, 3, 3, 2, 4, 'Common'),
(null, 'Sword of MECHAZ0R', 7, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Sworn Avenger', 7, 1, 3, 3, 1, 3, 'Epic'),
(null, 'Syvrel the Exile', 7, 1, 3, 3, 1, 4, 'Epic'),
(null, 'Venom Toth', 7, 1, 3, 3, 3, 3, 'Epic'),
(null, 'Void Hunter', 7, 1, 3, 3, 4, 2, 'Common'),
(null, 'Wild Tahr', 7, 1, 3, 3, 2, 4, 'Common'),
(null, 'Wind Runner', 7, 1, 3, 3, 3, 3, 'Rare'),
(null, 'Wind Stopper', 7, 1, 3, 3, 1, 7, 'Common'),
(null, 'Wings of Paradise', 7, 1, 3, 3, 3, 3, 'Common'),
(null, 'Yun', 7, 1, 3, 3, 5, 4, 'Common'),
(null, 'Zukong', 7, 1, 3, 3, 3, 4, 'Legendary'),
(null, 'Arrow Whistler', 7, 1, 3, 4, 2, 4, 'Common'),
(null, 'Artifact Hunter', 7, 1, 3, 4, 3, 3, 'Epic'),
(null, 'Black Locust', 7, 1, 3, 4, 2, 2, 'Legendary'),
(null, 'Blistering Skorn', 7, 1, 3, 4, 4, 5, 'Common'),
(null, 'Bloodsworn Gambler', 7, 1, 3, 4, 2, 3, 'Epic'),
(null, 'Captain Hank Hart', 7, 1, 3, 4, 2, 4, 'Epic'),
(null, 'Chassis of MECHAZ0R', 7, 1, 3, 4, 2, 4, 'Epic'),
(null, 'Deceptib0t', 7, 1, 3, 5, 5, 5, 'Epic'),
(null, 'Decimus', 7, 1, 3, 4, 4, 4, 'Legendary'),
(null, 'Dioltas', 7, 1, 3, 4, 5, 3, 'Epic'),
(null, 'Emerald Rejuvenator', 7, 1, 3, 4, 4, 4, 'Rare'),
(null, 'Feralu', 7, 1, 3, 4, 4, 3, 'Rare'),
(null, 'Fire Spitter', 7, 1, 3, 4, 3, 2, 'Basic'),
(null, 'Frostbone Naga', 7, 1, 3, 4, 3, 3, 'Common'),
(null, 'Gnasher', 7, 1, 3, 4, 3, 3, 'Common'),
(null, 'Hailstone Golem', 7, 1, 3, 4, 4, 6, 'Basic'),
(null, 'Lightbender', 7, 1, 3, 4, 3, 3, 'Rare'),
(null, 'Loreweaver', 7, 1, 3, 4, 2, 5, 'Rare'),
(null, 'Matter Shaper', 7, 1, 3, 4, 5, 4, 'Rare'),
(null, 'Mindwarper', 7, 1, 3, 4, 4, 3, 'Rare'),
(null, 'Moebius', 7, 1, 3, 4, 3, 5, 'Epic'),
(null, 'Night Watcher', 7, 1, 3, 4, 2, 4, 'Epic'),
(null, 'Owlbeast Sage', 7, 1, 3, 4, 4, 4, 'Rare'),
(null, 'Primus Shieldmaster', 7, 1, 3, 4, 3, 6, 'Basic'),
(null, 'Purgatos, the Realmkeeper', 7, 1, 3, 4, 3, 4, 'Epic'),
(null, 'Razorcrag Golem', 7, 1, 3, 4, 10, 3, 'Common'),
(null, 'Saberspine Tiger', 7, 1, 3, 4, 3, 2, 'Basic'),
(null, 'Sanguinar', 7, 1, 3, 4, 5, 4, 'Rare'),
(null, 'Silhouette Tracer', 7, 1, 3, 4, 2, 6, 'Common'),
(null, 'Spelljammer', 7, 1, 3, 4, 3, 5, 'Legendary'),
(null, 'Sphynx', 7, 1, 3, 4, 5, 4, 'Legendary'),
(null, 'Sun Elemental', 7, 1, 3, 4, 3, 3, 'Common'),
(null, 'Sunsteel Defender', 7, 1, 3, 4, 4, 3, 'Rare'),
(null, 'Sworn Sister Lkian', 7, 1, 3, 4, 2, 4, 'Legendary'),
(null, 'Tethermancer', 7, 1, 3, 4, 1, 6, 'Rare'),
(null, 'Thorn Needler', 7, 1, 3, 4, 6, 4, 'Basic'),
(null, 'Thunderhorn', 7, 1, 3, 4, 4, 5, 'Epic'),
(null, 'Timekeeper', 7, 1, 3, 4, 2, 2, 'Common'),
(null, 'Unseven', 7, 1, 3, 4, 2, 4, 'Legendary'),
(null, 'White Widow', 7, 1, 3, 4, 3, 4, 'Rare'),
(null, 'Young Flamewing', 7, 1, 3, 4, 5, 4, 'Basic'),
(null, 'Alter Rexx', 7, 1, 3, 5, 4, 4, 'Legendary'),
(null, 'Ash Mephyt', 7, 1, 3, 5, 2, 3, 'Common'),
(null, 'Beastbound Savage', 7, 1, 3, 5, 2, 5, 'Rare'),
(null, 'Blue Conjurer', 7, 1, 3, 5, 4, 6, 'Rare'),
(null, 'Boulder Breacher', 7, 1, 3, 5, 5, 5, 'Rare'),
(null, 'Brightmoss Golem', 7, 1, 3, 5, 4, 9, 'Basic'),
(null, 'Calculator', 7, 1, 3, 5, 1, 1, 'Epic'),
(null, 'Capricious Marauder', 7, 1, 3, 5, 9, 9, 'Rare'),
(null, 'Chakkram', 7, 1, 3, 5, 5, 5, 'Rare'),
(null, 'Dagger Kiri', 7, 1, 3, 5, 2, 8, 'Common'),
(null, 'Dancing Blades', 7, 1, 3, 5, 4, 6, 'Common'),
(null, 'Envybaer', 7, 1, 3, 5, 3, 7, 'Legendary'),
(null, 'Fireblazer', 7, 1, 3, 5, 5, 5, 'Common'),
(null, 'Firestarter', 7, 1, 3, 5, 3, 5, 'Rare'),
(null, 'Golden Justicar', 7, 1, 3, 5, 4, 6, 'Epic'),
(null, 'Grincher', 7, 1, 3, 5, 5, 4, 'Rare'),
(null, 'Hollow Grovekeeper', 7, 1, 3, 5, 3, 4, 'Legendary'),
(null, 'Impervious Giago', 7, 1, 3, 5, 1, 10, 'Rare'),
(null, 'Inquisitor Kron', 7, 1, 3, 5, 4, 4, 'Legendary'),
(null, 'Ironclad', 7, 1, 3, 5, 4, 3, 'Epic'),
(null, 'Keeper of the Vale', 7, 1, 3, 5, 3, 4, 'Legendary'),
(null, 'Letigress', 7, 1, 3, 5, 2, 6, 'Legendary'),
(null, 'Lux Ignis', 7, 1, 3, 5, 2, 5, 'Epic'),
(null, 'Necroseer', 7, 1, 3, 5, 5, 4, 'Basic'),
(null, 'Quahog', 7, 1, 3, 5, 7, 7, 'Rare'),
(null, 'Rawr', 7, 1, 3, 5, 3, 7, 'Legendary'),
(null, 'Rogue Warden', 7, 1, 3, 5, 4, 3, 'Common'),
(null, 'Sunset Paragon', 7, 1, 3, 5, 3, 2, 'Epic'),
(null, 'Sworn Defender', 7, 1, 3, 5, 4, 7, 'Epic'),
(null, 'The High Hand', 7, 1, 3, 5, 2, 3, 'Common'),
(null, 'Theobule', 7, 1, 3, 5, 5, 6, 'Legendary'),
(null, 'Trinity Wing', 7, 1, 3, 5, 4, 4, 'Legendary'),
(null, 'Twilight Sorcerer', 7, 1, 3, 5, 3, 6, 'Epic'),
(null, 'Archon Spellbinder', 7, 1, 3, 6, 7, 7, 'Legendary'),
(null, 'Bonereaper', 7, 1, 3, 6, 2, 9, 'Epic'),
(null, 'Deathblighter', 7, 1, 3, 6, 3, 4, 'Common'),
(null, 'Diamond Golem', 7, 1, 3, 6, 5, 11, 'Common'),
(null, 'Dust Wailer', 7, 1, 3, 6, 3, 4, 'Rare'),
(null, 'Eclipse', 7, 1, 3, 6, 3, 7, 'Legendary'),
(null, 'Facestriker', 7, 1, 3, 6, 4, 6, 'Basic'),
(null, 'First Sword of Akrane', 7, 1, 3, 6, 7, 7, 'Common'),
(null, 'Grimes', 7, 1, 3, 6, 3, 3, 'Rare'),
(null, 'Grove Lion', 7, 1, 3, 6, 5, 5, 'Epic'),
(null, 'Jax Truesight', 7, 1, 3, 6, 1, 1, 'Legendary'),
(null, 'Magesworn', 7, 1, 3, 6, 3, 8, 'Legendary'),
(null, 'Project Omega', 7, 1, 3, 6, 1, 1, 'Legendary'),
(null, 'Qorrhlmaa', 7, 1, 3, 6, 6, 6, 'Legendary'),
(null, 'Quartermaster Gauj', 7, 1, 3, 6, 5, 2, 'Legendary'),
(null, 'Ruby Rifter', 7, 1, 3, 6, 4, 6, 'Legendary'),
(null, 'Serpenti', 7, 1, 3, 6, 7, 4, 'Common'),
(null, 'S.I.L.V.E.R.', 7, 1, 3, 6, 7, 5, 'Legendary'),
(null, 'Silverbeak', 7, 1, 3, 6 , 6, 9, 'Common'),
(null, 'Spriggin', 7, 1, 3, 6, 6, 6, 'Epic'),
(null, 'Storm Aratha', 7, 1, 3, 6, 6, 5, 'Common'),
(null, 'Stormmetal Golem', 7, 1, 3, 6, 8, 8, 'Basic'),
(null, 'The Scientist', 7, 1, 3, 6, 6, 6, 'Epic'),
(null, 'Zenrui, the Blightspawned', 7, 1, 3, 6, 4, 4, 'Legendary'),
(null, 'Astral Crusader', 7, 1, 3, 7, 7, 6, 'Legendary'),
(null, 'Dark Nemesis', 7, 1, 3, 7, 4, 10, 'Legendary'),
(null, 'Drybone Golem', 7, 1, 3, 7, 10, 10, 'Basic'),
(null, 'Exun', 7, 1, 3, 7, 5, 5, 'Legendary'),
(null, 'Emberwyrm', 7, 1, 3, 7, 10, 7, 'Common'),
(null, 'EMP', 7, 1, 3, 7, 9, 9, 'Rare'),
(null, 'Grailmaster', 7, 1, 3, 7, 6, 6, 'Epic'),
(null, 'Paddo', 7, 1, 3, 7, 12, 6, 'Legendary'),
(null, 'Pandora', 7, 1, 3, 7, 3, 10, 'Legendary'),
(null, 'Red Synja', 7, 1, 3, 7, 7, 7, 'Legendary'),
(null, 'Reliquarian', 7, 1, 3, 7, 3, 3, 'Legendary'),
(null, 'Rook', 7, 1, 3, 7, 5, 5, 'Legendary'),
(null, 'War Talon', 7, 1, 3, 7, 4, 9, 'Common'),
(null, 'Whistling Blade', 7, 1, 3, 7, 2, 15, 'Common'),
(null, 'Zurael, the Lifegiver', 7, 1, 3, 7, 4, 7, 'Legendary'),
(null, 'Dagona', 7, 1, 3, 8, 8, 8, 'Legendary'),
(null, 'Khymera', 7, 1, 3, 8, 5, 12, 'Legendary'),
(null, 'Meltdown', 7, 1, 3, 8, 6, 6, 'Legendary'),
(null, 'Blood Taura', 7, 1, 3, 25, 12, 12, 'Epic');


select sifra from karta where naziv='Exun';

update karta set naziv='E\'Xun' where sifra=792;

select b.naziv, c.naziv as klasa, a.naziv as tip, b.mana, concat_ws(' / ', b.attack, b.health) as stats, b.rarity
from tip a inner join karta b on a.sifra=b.tip
inner join klasa c on b.klasa=c.sifra group by b.naziv, c.naziv, a.naziv, b.mana, stats, b.rarity order by b.naziv;

select count(b.sifra), b.naziv, c.naziv as klasa, a.naziv as tip, b.mana, concat_ws(' / ', b.attack, b.health) as stats, b.rarity
from tip a inner join karta b on a.sifra=b.tip
inner join klasa c on b.klasa=c.sifra where concat(b.naziv, c.naziv, a.naziv, b.mana, concat_ws(' / ', b.attack, b.health), b.rarity)
like '%Songhai%';

select sifra,naziv from karta where naziv like '%Bang%';

update karta set naziv='Bangle of Blinding Strike' where sifra=244;

select * from operater;

insert into operater values (null, 'duelyst', 'dlyst@edunova.hr', md5('e'), 'admin');

select * from deck;

select max(sifra) from deck;

select * from karta;

insert into karta_deck values (372, 1);

select c.naziv, c.mana, concat_ws(' / ', c.attack, c.health) as stats, c.rarity
from deck a inner join karta_deck b on a.sifra=b.deck
inner join karta c on b.karta=c.sifra
where a.sifra=1;

delete from karta_deck where karta=93;






