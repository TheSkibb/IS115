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
  id int not null primary key,
  eier int not null,
  gate varchar(255) not null,
  postnummer int not null, 
  leie int not null,
  depositum int not null,
  beskrivelse varchar(255),
  startLeie date,
  sluttLeie date,
  kollektiv boolean,
  dyrTillatt boolean,
  roykingTillatt boolean,
  stromInkl boolean,
  internettInkl boolean,
  tvInkl boolean,
  moblert boolean,
  boligtype int, 
  soveromAnt int,
  badAnt int,
  kvadrat int
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

