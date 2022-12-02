 use project

create or replace table kjonn(
  id int not null primary key auto_increment,
  kjonn varchar(255)
);

create or replace table brukerType(
  id int not null primary key auto_increment,
  brukerType varchar(255) not null
);

create or replace table boligtype(
  id int not null primary key auto_increment,
  boligtype varchar(255) not null
);

create or replace table bruker(
  id int not null primary key auto_increment,
  fornavn varchar(255) not null,
  etternavn varchar(255) not null,
  brukernavn varchar(255) not null,
  epost varchar(254) not null,
  brukerTypeId int, 
  kjonnId int,
  beskrivelse varchar(500),
  passord varchar(255),
  FOREIGN KEY(kjonnId) REFERENCES kjonn(id),
  FOREIGN KEY(brukerTypeId) REFERENCES brukerType(id)
);

create or replace table annonser(
  id int not null primary key auto_increment,
  eier int not null,
  gate varchar(255) not null,
  postnummer varchar(4) not null, 
  leie int not null,
  depositum int not null,
  tittel varchar(255) not null,
  beskrivelse varchar(255) not null,
  startLeie date default null,
  sluttLeie date default null,
  kollektiv boolean default null,
  dyrTillatt boolean default null,
  roykingTillatt boolean default null,
  stromInkl boolean default null,
  internettInkl boolean default null,
  tvInkl boolean default null,
  moblert boolean default null,
  boligtype int default null,
  soveromAnt int default null,
  badAnt int default null,
  kvadrat int default null,
  bildelenke varchar(255)
);

create or replace table favoritter(
  brukerId int not null, 
  annonseId int not null, 
  primary key(brukerId, annonseId)
);

create or replace table postnummer(
  id int not null primary key,
  poststedId int not null 
);

create or replace table poststed(
  id int not null primary key,
  poststed varchar(255)
);

create or replace table meldinger(
  id int not null primary key auto_increment,
  frabruker int,
  tilbruker int,
  innhold varchar(255),
  dato datetime default current_timestamp
);

-- insert values into tables:

-- kjonn
insert into kjonn (kjonn) values ('mann');
insert into kjonn (kjonn) values ('kvinne');
insert into kjonn (kjonn) values ('annet');

-- brukertype
insert into brukerType (brukertype) values ('utleier');
insert into brukerType (brukertype) values ('leietaker');

-- boligtyper
insert into boligtype (boligtype) values('Enebolig');
insert into boligtype (boligtype) values('Garasje/Parkering');
insert into boligtype (boligtype) values('Hybel');
insert into boligtype (boligtype) values('Leilighet');
insert into boligtype (boligtype) values('Rekkehus');
insert into boligtype (boligtype) values('Bofelleskap');

-- bruker
insert into bruker (
  fornavn,
  etternavn,
  brukernavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'birger',
  'olsen',
  'birgerOlsen',
  'birgerolsen@mail.com',
  2,
  1,
  'vennlig utleier som leier ut leiligheter',
  '$2y$10$Es9wViRX0EbNBKvegtKOSurwJ7vh8yyzGEUrVOcXFNN0PUbU16oM.'
);

insert into bruker (
  fornavn,
  etternavn,
  brukernavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'kari',
  'svendsen',
  'kar11',
  'kariSvendsen@mail.no',
  2,
  2,
  'utleier som leier ut kjellerleiligheten min',
  '$2y$10$Es9wViRX0EbNBKvegtKOSurwJ7vh8yyzGEUrVOcXFNN0PUbU16oM.'
);

insert into bruker (
  fornavn,
  etternavn,
  brukernavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'ola',
  'nordmann',
  'N0rdMan',
  'olaNordmann@mail.com',
  2,
  1,
  'rolig person som ikke liker fest og moro',
  '$2y$10$Es9wViRX0EbNBKvegtKOSurwJ7vh8yyzGEUrVOcXFNN0PUbU16oM.'
);
insert into bruker (
  fornavn,
  etternavn,
  brukernavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'nora',
  'aas',
  'binbong',
  'noraAas@mail.no',
  2,
  2,
  'leter etter et sted og bo',
  '$2y$10$Es9wViRX0EbNBKvegtKOSurwJ7vh8yyzGEUrVOcXFNN0PUbU16oM.'
);



--  annonser
insert into annonser (
  eier,
  gate,
  postnummer,
  leie,
  depositum,
  tittel,
  beskrivelse,
  startLeie,
  sluttLeie,
  kollektiv,
  dyrTillatt,
  roykingTillatt,
  stromInkl,
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat,
  bildelenke
) values (
  1,
  'supergata',
  '1350',
  10200,
  20000,
  'koselig leilighet for studenter',
  'fin leilighet med masse av plass. Koselig strøk med mulighet for mange forskjellige aktiviteter',
  '2023-01-25',
  '2023-01-25',
  false,
  true,
  true,
  false,
  true,
  null,
  false,
  4,
  4,
  1,
  60,
  "apartment1.jpg"
);

insert into annonser (
  eier,
  gate,
  postnummer,
  leie,
  depositum,
  tittel,
  beskrivelse,
  startLeie,
  sluttLeie,
  kollektiv,
  dyrTillatt,
  roykingTillatt,
  stromInkl,
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat,
  bildelenke
) values (
  2,
  'gategata 98',
  '1234',
  13200,
  15000,
  'trivelig sted for to eller fler',
  'liten leilighet som passe fint for et ungt studentpar eller nybakte foreldre',
  '2023-01-25',
  '2023-01-25',
  false,
  true,
  false,
  true,
  true,
  null,
  null,
  5,
  2,
  1,
  30,
  "apartment2.jpg"
);

insert into annonser (
  eier,
  gate,
  postnummer,
  leie,
  depositum,
  tittel,
  beskrivelse,
  startLeie,
  sluttLeie,
  kollektiv,
  dyrTillatt,
  roykingTillatt,
  stromInkl,
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat,
  bildelenke
) values (
  1,
  'bringebaerstien 21',
  '2345',
  10000,
  30000,
  'kuleste leiligheten i byen',
  'dette er en fet leilighet med ALT inkludert!! Den ligger ikke langt universitetet og rett ved byens beste barer.',
  '12-12-22',
  null,
  false,
  true,
  true,
  true,
  true,
  null,
  null,
  1,
  1,
  2,
  40,
  "apartment3.jpg"
);

insert into annonser (
  eier,
  gate,
  postnummer,
  leie,
  depositum,
  tittel,
  beskrivelse,
  startLeie,
  sluttLeie,
  kollektiv,
  dyrTillatt,
  roykingTillatt,
  stromInkl,
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat,
  bildelenke
) values (
  2,
  'tangen 78',
  '2345',
  40000,
  60000,
  'ok leilighet med noen hull i taket',
  'helt ok leilighet. her som sagt noen hull i taket, men dette er fikset ved å dette bøtter på gulvet, og en pakke lærertyggis ligger i skuffen på badet',
  '10-11-22',
  '13-08-24',
  null,
  null, 
  true,
  true,
  null,
  true,
  true,
  3,
  3,
  3,
  40,
  "apartment4.jpg"
);

-- meldinger

insert into meldinger (
  frabruker, 
  tilbruker, 
  innhold,
  dato) values (
  1,
  2,
  'hei! jeg har veldig lyst til å leie denne leiligheten',
  '022-11-29 09:30:46'
);

insert into meldinger (
  frabruker, 
  tilbruker, 
  innhold,
  dato) values (
  2,
  1,
  'heisann sveissan, denne leiligheten er dessverre allerede leid ut til noen andre',
  '022-11-29 09:30:47'
);

insert into meldinger (
  frabruker, 
  tilbruker, 
  innhold,
  dato) values (
  1,
  2,
  'oi! det var synd, jeg skulle ønske jeg fikk leie den, den så sååååååå fin ut',
  '022-11-29 09:30:48'
);

insert into meldinger (
  frabruker, 
  tilbruker, 
  innhold,
  dato) values (
  2,
  1,
  'ja, bedre lykke neste gang, de flytter nok ut så fort de finner at det er mugg i veggene :-)',
  '022-11-29 09:30:49'
)
