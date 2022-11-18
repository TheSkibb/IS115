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
  kvadrat int default null
);

create or replace table favoritter(
  brukerId int not null, 
  annonseId int not null, 
  primary key(brukerId, annonseId)
);

create or replace table bilde(
  id int not null primary key,
  bildeLenke varchar(255) not null
);

create or replace table bildeAnnonser(
  annonseId int not null, 
  bildeId int not null,
  FOREIGN KEY(annonseId) REFERENCES annonser(id),
  FOREIGN KEY(bildeId) REFERENCES bilde(id)
);

create or replace table postnummer(
  id int not null primary key,
  poststedId int not null 
);

create or replace table poststed(
  id int not null primary key,
  poststed varchar(255)
);

--insert values into tables:

--kjonn
insert into kjonn (kjonn) values ('mann');
insert into kjonn (kjonn) values ('kvinne');
insert into kjonn (kjonn) values ('annet');

--brukertype
insert into brukerType (brukertype) values ('utleier');
insert into brukerType (brukertype) values ('leietaker');

--boligtyper
insert into boligtype (boligtype) values('Enebolig');
insert into boligtype (boligtype) values('Garasje/Parkering');
insert into boligtype (boligtype) values('Hybel');
insert into boligtype (boligtype) values('Leilighet');
insert into boligtype (boligtype) values('Rekkehus');
insert into boligtype (boligtype) values('Bofelleskap');
insert into boligtype (boligtype) values('Enebolig');

--bruker
insert into bruker (
  fornavn,
  etternavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'birger',
  'olsen',
  'birgerolsen@mail.com',
  1,
  1,
  'vennlig utleier som leier ut leiligheter',
  'passord'
);

insert into bruker (
  fornavn,
  etternavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'kari',
  'svendsen',
  'kariSvendsen@mail.no',
  1,
  2,
  'utleier som leier ut kjellerleiligheten min',
  'passord'
);

insert into bruker (
  fornavn,
  etternavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'ola',
  'nordmann',
  'olaNordmann@mail.com',
  2,
  1,
  'rolig person som ikke liker fest og moro',
  'passord'
);
insert into bruker (
  fornavn,
  etternavn,
  epost,
  brukerTypeId,
  kjonnId,
  beskrivelse,
  passord
) values (
  'nora',
  'aas',
  'noraAas@mail.no',
  2,
  2,
  'leter etter et sted og bo',
  'passord'
);



--annonser
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
  kvadrat
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
  2,
  1,
  60
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
  kvadrat
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
  2,
  2,
  1,
  30
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
  kvadrat
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
  3,
  1,
  2,
  40
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
  kvadrat
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
  2,
  3,
  3,
  40
);
