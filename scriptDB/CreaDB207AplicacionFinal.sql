create database if not exists DB207ProyectoFinal;

create user if not exists 'user207ProyectoFinal'@'%' identified by 'paso';
grant all privileges on DB207ProyectoFinal.* to 'user207ProyectoFinal'@'%';

create table if not exists DB207ProyectoFinal.Usuario(
    IDUsuario varchar(255) primary key,
    Password varchar(255) not null,
    FechaHoraUltimaConexion datetime default now(),
    FechaHoraGuardada datetime
)engine=innodb;

create table if not exists DB207ProyectoFinal.Coleccionable(
    IDColeccionable varchar(255) primary key,
    Nombre varchar(255) not null,
    RutaIcono varchar(255) not null,
    Precio int not null
)engine=innodb;

create table if not exists DB207ProyectoFinal.Obra(
    IDColeccionable varchar(255) primary key,
    RutaFalsificacion varchar(255),
    Diferencia varchar(255),
    foreign key(IDColeccionable) references Coleccionable(IDColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Fosil(
    IDColeccionable varchar(255) primary key,
    Conjunto varchar(255) not null,
    Parte enum('craneo', 'cuerpo', 'cola', 'torax', 'pelvis', 'cuello', 'alaIzq', 'alaDer', 'completo') not null,
    foreign key(IDColeccionable) references Coleccionable(IDColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Pez(
    IDColeccionable varchar(255) primary key,
    Ubicación enum('Cascada', 'Lago', 'Rio', 'Desembocadura', 'Mar', 'Estanque', 'Mar(Lluvia)'),
    Horario set('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '22', '21', '22', '23'),
    Meses set('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'),
    Tamano float unsigned,
    Sombra enum('Enano', 'Pequeno', 'Mediano', 'Grande', 'Gigante', 'Enorme', 'Aleta', 'Fino');
    foreign key(IDColeccionable) references Coleccionable(IDColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.Bicho(
    IDColeccionable varchar(255) primary key,
    Ubicación varchar(255),
    Horario set('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '22', '21', '22', '23'),
    Meses set('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'),
    Tamano float unsigned,
    foreign key(IDColeccionable) references Coleccionable(IDColeccionable) on update cascade on delete cascade
)engine=innodb;

create table if not exists DB207ProyectoFinal.ObtencionColeccionables(
    IDUsuario varchar(255),
    IDColeccionable varchar(255),
    primary key(IDUsuario, IDColeccionable),
    foreign key(IDUsuario) references Usuario(IDUsuario) on update cascade on delete cascade,
    foreign key(IDColeccionable) references Coleccionable(IDColeccionable) on update cascade on delete cascade
)engine=innodb;