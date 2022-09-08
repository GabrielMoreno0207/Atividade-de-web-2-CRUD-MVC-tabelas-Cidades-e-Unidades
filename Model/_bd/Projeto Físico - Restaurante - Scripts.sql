
-- criando uma base de dados

-- utilizar a base master do sql server
use master; 
go

--drop database restaurante2022;

-- criando a base de dados
create database restaurante2022
go

-- utilizar a base que criou
use restaurante2022
go

create table cidades (
	cod_cidade int not null identity(1,1) primary key,
	nome varchar(100) not null,
	uf char(2) not null default 'SP'
);

create table clientes (
	cod_cliente int not null identity(1,1) primary key,
	nome varchar(100) not null,
	endereco varchar(150),
	bairro varchar(60),
	cod_cidade int foreign key references cidades (cod_cidade),
	cep char(8),
	cpf char(11),
	rg char(16),
	telefone char(11),
	email varchar(100)
);

create table unidades (
	cod_unidade	int not null identity(1,1) primary key,
	descricao varchar(100) not null,
	sigla char(5) not null
);

create table ingredientes (
	cod_ingrediente int not null identity(1,1) primary key,
	descricao varchar(100) not null,
	valor_unitario float default 0,	
	cod_unidade int	not null foreign key references unidades (cod_unidade)
);

create table pratos (
	cod_prato int not null identity(1,1) primary key,
	descricao varchar(100) not null,
	valor_unitario float default 0
);

create table composicao (
	cod_prato int not null foreign key references pratos (cod_prato),
	cod_ingrediente int not null foreign key references ingredientes (cod_ingrediente),
	quantidade float not null,
	constraint pk_composicao primary key (cod_prato, cod_ingrediente)
);

create table fornecedores (
	cod_fornecedor int not null identity(1,1) primary key,
	nome_fantasia varchar(100) not null,
	razao_social varchar(100) not null,
	cnpj char(16),
	insc_estatual char(20),
	endereco varchar(100),
	bairro varchar(50),
	cep char(8),
	cod_cidade int not null,
	telefone varchar(30),
	e_mail varchar(100),
	-- criando chave estrangeira com constraint
	constraint fk_for_cid foreign key (cod_cidade) references cidades (cod_cidade)
);

create table compras (
	cod_compra int not null identity(1,1) primary key,
	cod_fornecedor int not null foreign key references fornecedores (cod_fornecedor),
	num_nota varchar(20) not null,
	data datetime not null,
	valor_total float default 0
);

create table itens_compra (
	cod_item_compra	int not null identity(1,1) primary key,
	cod_compra	int  not null foreign key references compras (cod_compra),
	cod_ingrediente	int  not null foreign key references ingredientes (cod_ingrediente),
	quantidade	float  not null,
	valor_unitario	float  not null
);

create table encomendas (
	num_encomenda int not null identity(1,1) primary key,
	data datetime not null,
	cod_cliente int not null foreign key references clientes (cod_cliente), 
	valor_total float default 0
);

create table itens_encomenda (
	cod_item_encomenda int not null identity(1,1) primary key,
	num_encomenda int not null foreign key references encomendas (num_encomenda),
	cod_prato int not null foreign key references pratos (cod_prato),
	quantidade float not null,
	valor_unitario float not null default 0
);

insert into pratos (descricao, valor_unitario)
values 
('Pizza de Calabresa', 82),
('Pizza Portuguesa', 109.5),
('Feijoada', 512.77),
('Arroz Carreteiro', 1014.99),
('Beringela Parmegiana', 45);

create table usuarios (
	cod_usuario int not null identity(1,1) primary key,
	login varchar(30) not null,
	senha varchar(32),
	nome_completo varchar(100)
);

--ALTER TABLE usuarios ALTER COLUMN senha varchar(32);

insert into usuarios values ('andre','123', 'André Mendes');
insert into usuarios values ('marcos','321', 'Marcos Gabriel');


--select * from usuarios

--select lower(CONVERT(NVARCHAR(32),HASHBYTES('MD5','123'),2 ))

--select lower(CONVERT(NVARCHAR(32),HASHBYTES('MD5','123'),2))

update usuarios set
	senha = lower(CONVERT(NVARCHAR(32),HASHBYTES('MD5',senha),2));

go
--- criando um procedimento armazenado para autenticar
create procedure sp_autenticar
	-- parâmetros
	@login varchar(30),
	@senha varchar(32)
as begin

	-- aplicando o MD5 na senha informadoa
	set @senha = lower(CONVERT(NVARCHAR(32),HASHBYTES('MD5',@senha),2))

	select *
	from usuarios
	where login = @login and senha = @senha

end















