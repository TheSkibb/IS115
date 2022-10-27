use project


create or replace table bruker(
  id int not null, 
  fornavn varchar(255) not null,
  etternavn varchar(255) not null,
  epost varchar(254) not null,
  type int,
  kjonn int,
  beskrivelse varchar(500),
  passord varchar(255)
);

create or replace table annonser(
  id int not null,
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
  brukerID int not null,
  annonseID int not null
);
