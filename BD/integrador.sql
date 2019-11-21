create database monitoria_integrador;
use monitoria_integrador;

create table usuario(
	id_usuario integer primary key auto_increment,
    tipo_usuario varchar(45),
    matricula varchar(45),
    nome varchar(45),
    senha varchar(45)
);

create table curso(
	id_curso integer primary key auto_increment,
    nome_curso varchar(45)
);

create table aluno(
	id_aluno integer primary key auto_increment,
    id_curso integer,
    id_usuario integer,
    foreign key (id_curso) references curso(id_curso),
    foreign key (id_usuario) references usuario(id_usuario)
);

create table disciplina(
	id_disciplina integer primary key auto_increment,
    nome_disciplina varchar(45)
);

create table monitor(
	id_monitor integer primary key auto_increment,
    horarios varchar(45),
    id_usuario integer,
    id_disciplina integer,
    id_curso integer,
    foreign key (id_usuario) references usuario(id_usuario),
    foreign key (id_disciplina) references disciplina(id_disciplina),
    foreign key (id_curso) references curso(id_curso)
    );

create table atendimento(
	id_atendimento integer primary key auto_increment,
    data_atendimento date,
    relatorio varchar(45),
    id_aluno integer,
    id_monitor integer,
    id_disciplina integer,
    foreign key (id_aluno) references aluno(id_aluno),
    foreign key (id_monitor) references monitor(id_monitor),
    foreign key (id_disciplina) references disciplina(id_disciplina)
);