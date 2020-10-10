/*TABLA HEMOGRAMA*/
create table hemograma(
id_hemograma INT not null auto_increment,
gr_hemato varchar(10),
ht_hemato varchar(10),
hb_hemato varchar(10),
vcm_hemato varchar(10),
cmhc_hemato varchar(10),
gota_hema varchar(100),
gb_hemato varchar(10),
linfocitos_hemato varchar(10),
monocitos_hemato varchar(10),
eosinofilos_hemato varchar(10),
Basinofilos_hemato varchar(10),
banda_hemato varchar(10),
segmentados_hemato varchar(10),
metamielo_hemato varchar(10),
mielocitos_hemato varchar(10),
blastos_hemato varchar(10),
plaquetas_hemato varchar(10),
reti_hemato varchar(10),
eritro_hemato varchar(10),
otros_hema varchar(100),
id_paciente INT,
numero_orden varchar(25),
fecha varchar(25),
primary key(id_hemograma),
FOREIGN KEY (id_paciente) REFERENCES pacientes_o(id_paciente)
);