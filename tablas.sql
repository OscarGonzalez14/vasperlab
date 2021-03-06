create table glucosa(
id_examen_glucosa INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_glucosa),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

/* tabla Colesterol*/
create table colesterol(
id_examen_colesterol INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(24),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_glucosa),
foreign key(id_paciente) references pacientes_o(id_paciente)
);


create table colesterol(
id_examen_colesterol INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_colesterol),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

create table acido_urico(
id_examen_acido INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_acido),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

create table creatinina(
id_examen_creatinina INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_creatinina),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

create table sgot(
id_examen_sgot INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_sgot),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

create table sgpt(
id_examen_sgpt INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_sgpt),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

create table baciloscopia(
id_examen_baciloscopia INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_baciloscopia),
foreign key(id_paciente) references pacientes_o(id_paciente)
);

create table rpr(
id_examen_rpr INT not null auto_increment,
resultado varchar(25),
numero_orden varchar(25),
estado varchar(25),
id_paciente INT,
observacione varchar(125),
primary key(id_examen_rpr),
foreign key(id_paciente) references pacientes_o(id_paciente)
);