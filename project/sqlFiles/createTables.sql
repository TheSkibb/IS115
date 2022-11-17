use project

create or replace table kjonn(
  id int not null primary key,
  kjonn varchar(255)
);

create or replace table brukerType(
  id int not null primary key,
  brukerType varchar(255) not null
);

create or replace table boligtype(
  id int not null primary key,
  boligtype varchar(255) not null
);

create or replace table bruker(
  id int not null primary key, 
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
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat
) values (
  12,
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
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat
) values (
  12,
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
  internettInkl,
  tvInkl,
  moblert,
  boligtype,
  soveromAnt,
  badAnt,
  kvadrat
) values (
  4,
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
  3,
  1,
  2,
  40
);
