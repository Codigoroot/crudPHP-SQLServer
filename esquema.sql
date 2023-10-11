USE [Registros]
GO

/****** Object:  Table [dbo].[usuarios]    Script Date: 10/10/2023 11:11:34 p. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[usuarios](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](30) NULL,
	[Edad] [int] NULL,
	[Correo] [varchar](45) NULL,
	[Nacionalidad] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

INSERT INTO 
  [Registros].[dbo].[usuarios] ([Nombre], [Edad], [Correo], [Nacionalidad])
VALUES
  ('Juan', 25, 'juan@example.com', 'Argentina'),
  ('Mar�a', 30, 'maria@example.com', 'M�xico'),
  ('Pedro', 28, 'pedro@example.com', 'Espa�a'),
  ('Luisa', 22, 'luisa@example.com', 'Colombia'),
  ('Carlos', 26, 'carlos@example.com', 'Per�'),
  ('Ana', 27, 'ana@example.com', 'Chile'),
  ('Jorge', 32, 'jorge@example.com', 'Venezuela'),
  ('Sof�a', 29, 'sofia@example.com', 'Bolivia'),
  ('Miguel', 24, 'miguel@example.com', 'Uruguay'),
  ('Luc�a', 31, 'lucia@example.com', 'Paraguay'),
  ('Diego', 33, 'diego@example.com', 'Ecuador'),
  ('Laura', 23, 'laura@example.com', 'Costa Rica'),
  ('Eduardo', 28, 'eduardo@example.com', 'Guatemala'),
  ('Patricia', 27, 'patricia@example.com', 'El Salvador'),
  ('Roberto', 30, 'roberto@example.com', 'Honduras'),
  ('Isabel', 29, 'isabel@example.com', 'Nicaragua'),
  ('Ricardo', 26, 'ricardo@example.com', 'Panam�'),
  ('Carmen', 25, 'carmen@example.com', 'Belice'),
  ('Hugo', 31, 'hugo@example.com', 'Argentina'),
  ('Alejandra', 24, 'alejandra@example.com', 'M�xico'),
  ('Fernando', 28, 'fernando@example.com', 'Espa�a'),
  ('Diana', 27, 'diana@example.com', 'Colombia'),
  ('Gabriel', 26, 'gabriel@example.com', 'Per�'),
  ('Valentina', 29, 'valentina@example.com', 'Chile'),
  ('Pablo', 30, 'pablo@example.com', 'Venezuela'),
  ('Camila', 25, 'camila@example.com', 'Bolivia'),
  ('Luis', 31, 'luis@example.com', 'Uruguay'),
  ('Ver�nica', 29, 'veronica@example.com', 'Paraguay'),
  ('Andr�s', 28, 'andres@example.com', 'Ecuador'),
  ('Mariana', 26, 'mariana@example.com', 'Costa Rica'),
  ('Gustavo', 30, 'gustavo@example.com', 'Guatemala'),
  ('Marcela', 27, 'marcela@example.com', 'El Salvador'),
  ('Juli�n', 32, 'julian@example.com', 'Honduras'),
  ('Lucas', 28, 'lucas@example.com', 'Nicaragua'),
  ('Cecilia', 26, 'cecilia@example.com', 'Panam�'),
  ('Federico', 25, 'federico@example.com', 'Belice'),
  ('Natalia', 29, 'natalia@example.com', 'Argentina'),
  ('Ignacio', 24, 'ignacio@example.com', 'M�xico'),
  ('Vanessa', 27, 'vanessa@example.com', 'Espa�a'),
  ('Hern�n', 26, 'hernan@example.com', 'Colombia'),
  ('Carolina', 28, 'carolina@example.com', 'Per�'),
  ('Alberto', 30, 'alberto@example.com', 'Chile'),
  ('Romina', 25, 'romina@example.com', 'Venezuela'),
  ('Emanuel', 27, 'emanuel@example.com', 'Bolivia'),
  ('Victoria', 29, 'victoria@example.com', 'Uruguay'),
  ('Diego', 26, 'diego@example.com', 'Paraguay'),
  ('Marina', 25, 'marina@example.com', 'Ecuador'),
  ('Mat�as', 30, 'matias@example.com', 'Costa Rica'),
  ('Johana', 28, 'johana@example.com', 'Guatemala');

