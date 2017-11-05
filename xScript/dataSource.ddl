create table compagnie
(
	compagnie_id varchar(5) not null,
	compagnie_nom varchar(50) not null,
	compagnie_logo varchar(250) not null
)
;

create table message
(
	message_id int(10) auto_increment,
	notification_id int(10) not null,
	message_date timestamp default 'current_timestamp()' not null
)
;

create table nom_aeroport_ville
(
	code_ville varchar(12) not null,
	nom_ville varchar(75) not null,
	pays_ville varchar(75) not null
)
;

create table notification
(
	notification_id int auto_increment,
	vols_details_id int(10) not null,
	phone_id varchar(10) not null,
	notification_date date not null,
	notification_heure timestamp default 'current_timestamp()' not null,
	notification_nature varchar(15) not null,
	notification_active int(1) not null
)
;

create table vols
(
	vols_id int not null,
	compagnie_id varchar(5) default 'NULL' null,
	ville_provenance varchar(12) default 'NULL' null,
	ville_destination varchar(12) default 'NULL' null,
	heure_depart time(6) default 'NULL' null,
	heure_arrivee time(6) default 'NULL' null,
	temps_de_vols time(6) default 'NULL' null,
	num_vols varchar(15) not null
)
;

create index num_vols
	on vols (num_vols)
;

create index vols_id
	on vols (vols_id)
;

create table vols_details
(
	vols_details_id int not null,
	num_vols varchar(15) not null,
	date_depart date default 'NULL' null,
	date_arrivee date default 'NULL' null,
	heure_est_depart time default 'NULL' null,
	heure_est_arrivee time default 'NULL' null,
	date_modified timestamp default 'NULL' null,
	date_created timestamp default 'NULL' null,
	vol_status int default 'NULL' null
)
;

create index num_vols
	on vols_details (num_vols)
;

