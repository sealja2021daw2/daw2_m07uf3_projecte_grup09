create database daw2_m07uf3_projecte_grup09bd;
use daw2_m07uf3_projecte_grup09bd;

CREATE USER 'admin_proj3'@'localhost' IDENTIFIED BY 'admin_proj3';
GRANT ALL PRIVILEGES ON  daw2_m07uf3_projecte_grup09bd. * TO 'admin_proj3'@'localhost';
FLUSH PRIVILEGES;

/*TAULA ONG*/
create table if not exists ongs(
	cif varchar(9) primary key not null,
    nom varchar(25) not null,
    adreca varchar(50) not null,
    poblacio varchar(25) not null,
    comarca varchar(25) not null,
    tipus_ong varchar(25) not null,
	utilpublicgencat boolean not null
);


/*TAULA SOCIS*/
create table if not exists socis(
	nif varchar(9) primary key not null,
    nom varchar(25) not null,
	cognoms varchar(50) not null,
    adreca varchar(50) not null,
    poblacio varchar(25) not null,
    comarca varchar(25) not null,
    telefon numeric(9,0),
    mobil numeric(9,0) not null,
    email varchar(25) not null,
    d_alta date not null,
    q_mensual double(9,2) not null,
    aport_anual double(9,2)
);

create table if not exists formades(
	cif_ong varchar(9),
    nif_socis varchar(9),
    primary key(cifong,nifsocis),
    foreign key (cif_ong) references tipus_ong(cif) on delete cascade ,
    foreign key (nif_socis) references tipus_ong(nif)
);

/*TAULA TREBALLADORS*/
create table if not exists treballadors(
	nif varchar(9) primary key not null,
    nom varchar(25) not null,
	cognoms varchar(50) not null,
    adreca varchar(50) not null,
    poblacio varchar(25) not null,
    comarca varchar(25) not null,
    telefon numeric(9,0),
    mobil numeric(9,0) not null,
    email varchar(25) not null,
    d_ingres date not null,
    cif_ong varchar(9),
    foreign key (cif_ong) references ong(cif)
);


create table if not exists professionals(
	nif varchar(9),
    carrec varchar(20) not null,
    quant_paga_SeguretatSocial double(9,2) not null,
    irpf_descompte DOUBLE(9,2) not null,
    primary key(nif),
    foreign key (nif) references treballadors(nif) on delete cascade
);

create table if not exists voluntaris(
	nif varchar(9),
    edat int not null,
    professio varchar(25) not null,
    h_dedicades int not null,
    primary key(nif),
    foreign key (nif) references treballadors(nif) on delete cascade
);

create table if not exists users(
	nomusuari varchar(25) primary key,
    esadmin boolean not null,
    contrasena varchar(200) not null,
    nom varchar(25) not null,
    cognoms varchar(50) not null,
    email varchar(25) not null,
	mobil integer not null,
    h_entrada datetime,
	h_sortida datetime
);


insert into users (nomusuari, esadmin, contrasena,nom,cognoms,email,mobil,h_entrada,h_sortida) values ("sergio",true,"sergio","sergio","aliaga jabalera",
"sergioaliaga@gmail.com", 9848575,null,null);



