create database muKingg
go

use muKingg
go



create table usuario(
	id				int identity(1,1) primary key,
	nombreUsuario	nvarchar(40),
	correo			nvarchar(100),
	direccion		nvarchar(100),
	tarjeta			nvarchar(20),
	contra			nvarchar(260) --solo guardo el hash
)
go

create table comentarios(
	autor		int	foreign key references usuario(id),
	descripcion	nvarchar(300),	
)
go

--creo los tipos especiales
CREATE TYPE TipoRopa FROM VARCHAR(20) NOT NULL;
CREATE TYPE tallas FROM VARCHAR(20) NOT NULL;
go

create table  producto(
	id int		IDENTITY(1,1) primary key,
	precio		int,
	tipo		TipoRopa CHECK (tipo IN ('pantalon', 'sudadera', 'camisa')),
	talla		tallas CHECK (talla IN ('p', 'm', 'g','eg')),
	existencia	int,
	imagen		nvarchar(100)
)
go

create table pedido(
	id			int IDENTITY(1,1) primary key,
	usuario		int foreign key references usuario(id),
	idProducto	int foreign key references producto(id),
	cantidad	int,
)
go

--INSERTS----------------------------------------------------------

INSERT INTO producto (precio, tipo, talla, existencia) VALUES
(450, 'pantalon', 'm', 10),
(350, 'camisa', 'g', 15),
(600, 'sudadera', 'eg', 8),
(500, 'pantalon', 'g', 12),
(400, 'camisa', 'p', 20),
(700, 'sudadera', 'm', 5);
GO




