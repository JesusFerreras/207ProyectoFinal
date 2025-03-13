create database if not exists DB207ProyectoFinal;

create user if not exists 'user207ProyectoFinal'@'%' identified by 'paso';
grant all privileges on DB207ProyectoFinal.* to 'user207ProyectoFinal'@'%';

create table if not exists DB207ProyectoFinal.Usuario(
    idUsuario varchar(255) primary key,
    password varchar(255) not null,
    fechaHoraUltimaConexion datetime default now(),
    fechaHoraGuardada datetime
)engine=innodb;

create table if not exists DB207ProyectoFinal.Coleccionable(
    idColeccionable varchar(255) primary key,
    nombre varchar(255) not null,
    rutaIcono varchar(255) not null,
    precio int not null
)engine=innodb;

create table if not exists DB207ProyectoFinal.Obra(
    idColeccionable varchar(255) primary key,
    rutaFalsificacion varchar(255),
    diferencia varchar(255),
    foreign key(idColeccionable) references Coleccionable(idColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Fosil(
    idColeccionable varchar(255) primary key,
    conjunto varchar(255) not null,
    parte enum('craneo', 'cuerpo', 'cola', 'torax', 'pelvis', 'cuello', 'alaIzq', 'alaDer', 'completo') not null,
    foreign key(idColeccionable) references Coleccionable(idColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Pez(
    idColeccionable varchar(255) primary key,
    ubicacion enum('Cascada', 'Lago', 'Rio', 'Desembocadura', 'Mar', 'Estanque', 'Mar(Lluvia)'),
    horario set('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '22', '21', '22', '23'),
    meses set('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
    tamano float unsigned,
    sombra enum('Enano', 'Pequeno', 'Mediano', 'Grande', 'Gigante', 'Enorme', 'Aleta', 'Fino');
    foreign key(idColeccionable) references Coleccionable(idColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Bicho(
    idColeccionable varchar(255) primary key,
    ubicacion varchar(255),
    horario set('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '22', '21', '22', '23'),
    meses set('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
    tamano float unsigned,
    foreign key(idColeccionable) references Coleccionable(idColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Obtencion(
    idUsuario varchar(255),
    idColeccionable varchar(255),
    primary key(idUsuario, idColeccionable),
    foreign key(idUsuario) references Usuario(idUsuario) on update cascade on delete cascade,
    foreign key(idColeccionable) references Coleccionable(idColeccionable) on update cascade on delete cascade
)engine=innodb;