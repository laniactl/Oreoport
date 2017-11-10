create table compagnie
(
  compagnie_id varchar(5) not null
    primary key,
  compagnie_nom varchar(50) not null,
  compagnie_logo varchar(250) not null
)
;

create table message
(
  message_id int(10) auto_increment
    primary key,
  notification_id int(10) not null,
  message_date timestamp default CURRENT_TIMESTAMP not null
)
;

create table nom_aeroport_ville
(
  code_ville varchar(12) not null
    primary key,
  nom_ville varchar(75) not null,
  pays_ville varchar(75) not null
)
;

create table notification
(
  notification_id int auto_increment
    primary key,
  vols_details_id int(10) not null,
  phone_id varchar(10) not null,
  notification_date date not null,
  notification_heure timestamp default CURRENT_TIMESTAMP not null,
  notification_nature varchar(15) not null,
  notification_active int(1) not null
)
;

create table vols
(
  vols_id int not null,
  compagnie_id varchar(5) null,
  ville_provenance varchar(12) null,
  ville_destination varchar(12) null,
  heure_depart time(6) null,
  heure_arrivee time(6) null,
  temps_de_vols time(6) null,
  num_vols varchar(15) not null
    primary key
)
;

create index num_vols
  on vols (num_vols)
;

create index vols_id
  on vols (vols_id)
;

create trigger insert_trigger
before INSERT on vols
for each row
;

create table vols_details
(
  vols_details_id int not null
    primary key,
  num_vols varchar(15) not null,
  date_depart date null,
  date_arrivee date null,
  heure_est_depart time null,
  heure_est_arrivee time null,
  date_modified timestamp null,
  date_created timestamp null,
  vol_status int null,
  constraint num_vols_FK
  foreign key (num_vols) references vols (num_vols)
)
;

create index num_vols
  on vols_details (num_vols)
;

create trigger vols_details_BEFORE_INSERT
before INSERT on vols_details
for each row
;