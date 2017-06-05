# +===================================================================
# | Generado el 29-06-2015 a las 08:32:32 PM 
# | Servidor: localhost
# | MySQL Version: 5.6.16
# | PHP Version: 5.5.11
# | Base de datos: 'inventario'
# | Tablas: clientes;  configuracion;  detalle_ventas;  log;  material_almacen;  orden_compras;  pedidos;  proveedores;  usuarios;  ventas
# +-------------------------------------------------------------------
# Si tienen tablas con relacion y no estan en orden dara problemas al recuperar datos. Para evitarlo:
SET FOREIGN_KEY_CHECKS=0; 
SET time_zone = '+00:00';
SET sql_mode = ''; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

# | Vaciado de tabla 'clientes'
# +-------------------------------------
DROP TABLE IF EXISTS `clientes`;


# | Estructura de la tabla 'clientes'
# +-------------------------------------
CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `rutcliente` varchar(25) NOT NULL,
  `nombrecliente` varchar(40) NOT NULL,
  `telefcliente` varchar(15) NOT NULL,
  `direccliente` varchar(100) NOT NULL,
  `ciudadcliente` varchar(80) NOT NULL,
  `regioncliente` varchar(80) NOT NULL,
  `girocliente` varchar(50) NOT NULL,
  `emailcliente` varchar(50) NOT NULL,
  `contactocliente` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'clientes'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `clientes` (`cod_cliente`, `rutcliente`, `nombrecliente`, `telefcliente`, `direccliente`, `ciudadcliente`, `regioncliente`, `girocliente`, `emailcliente`, `contactocliente`) VALUES 
      ('1', '6538915-0', 'RAMON ANTONIO URDANETA', '0426478956', 'SECTOR LOS CABALLOS', 'EL VIGIA', 'LA CARCELARIA', 'REPUESTOS', 'ELSAIYA@GMAIL.COM', 'RAMON URDANETA'), 
      ('2', '6255375-8', 'RICHARD JOSE CHIRINOS RODRIGUEZ', '04268957859', 'SANTA CLARA', 'RAMONES', 'OCCIDENTAL', 'IMPORTACIONES', 'R@HOTMAIL.COMICHARD', 'RICHARD JOSE'), 
      ('3', '23943429-0', 'LENIN JOSE VIERA RODRIGUEZ', '0125465897', 'SANTA RAMIL', 'RAMONES', 'OCCIDENTAL', 'IMPORTACIONES', 'LENIN@GMAIL.COM', 'LENIN VIERA'), 
      ('4', '24751593-3', 'LEIDA RODRIGUEZ', '04284569875', 'LOS LAURELES', 'CABIMAS', 'OCCIDENTAL', 'REPUESTOS', 'RRE@YAHOO.COM', 'LEIDA RODRIGUEZ'), 
      ('5', '22991611-4', 'MARCOS JESUS CONTRERAS', '02748985687', 'EL VIGIA ESTADO MERIDA', 'EL VIGIA', 'LA CARCELARIA', 'IMPORTACIONES', 'MAR@YAHOO.COM', 'MARCOS MORALES');
COMMIT;

# | Vaciado de tabla 'configuracion'
# +-------------------------------------
DROP TABLE IF EXISTS `configuracion`;


# | Estructura de la tabla 'configuracion'
# +-------------------------------------
CREATE TABLE `configuracion` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `rut_empresa` varchar(25) NOT NULL,
  `nom_empresa` varchar(100) NOT NULL,
  `direc_empresa` varchar(100) NOT NULL,
  `tlf_empresa` varchar(15) NOT NULL,
  `ced_gerente` int(15) NOT NULL,
  `nom_gerente` varchar(35) NOT NULL,
  `ape_gerente` varchar(35) NOT NULL,
  `correo_gerente` varchar(70) NOT NULL,
  `tlf_gerente` varchar(15) NOT NULL,
  `iva` float(6,2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'configuracion'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `configuracion` (`codigo`, `rut_empresa`, `nom_empresa`, `direc_empresa`, `tlf_empresa`, `ced_gerente`, `nom_gerente`, `ape_gerente`, `correo_gerente`, `tlf_gerente`, `iva`) VALUES 
      ('1', '5456100-8', 'CENTRO DE CONEXIONES MI ANGEL', 'SANTA CRUZ DE MORA', '02758896547', '18633174', 'RUBEN DARIO', 'CHIRINOS RODRIGUEZ', 'ELSAIYA@GMAIL.COM', '04169983764', '20.00');
COMMIT;

# | Vaciado de tabla 'detalle_ventas'
# +-------------------------------------
DROP TABLE IF EXISTS `detalle_ventas`;


# | Estructura de la tabla 'detalle_ventas'
# +-------------------------------------
CREATE TABLE `detalle_ventas` (
  `cod_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `cod_venta` varchar(30) NOT NULL,
  `cod_material` varchar(10) NOT NULL,
  `rutcliente` varchar(25) NOT NULL,
  `cant_venta` int(5) NOT NULL,
  `descuento` int(5) NOT NULL,
  `importe` float(12,2) NOT NULL,
  `status_detalle` varchar(15) NOT NULL,
  `fecha_detalle` datetime NOT NULL,
  PRIMARY KEY (`cod_detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'detalle_ventas'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `detalle_ventas` (`cod_detalle`, `cod_venta`, `cod_material`, `rutcliente`, `cant_venta`, `descuento`, `importe`, `status_detalle`, `fecha_detalle`) VALUES 
      ('1', 'FACTURA-00001', 'PA54423', '23943429-0', '10', '0', '12200.00', 'VENDIDO', '2015-04-09 12:05:25'), 
      ('2', 'FACTURA-00001', 'PT54423', '23943429-0', '9', '0', '11700.00', 'VENDIDO', '2015-04-09 12:05:25'), 
      ('3', 'BOLETA-00001', 'LA88863', '6255375-8', '500', '0', '750000.00', 'DEVUELTO', '2015-04-09 12:14:16'), 
      ('4', 'BOLETA-00001', 'CRT9853', '6255375-8', '100', '0', '13580000.00', 'VENDIDO', '2015-04-09 12:14:16'), 
      ('5', 'BOLETA-00001', 'CR0001', '6255375-8', '100', '0', '8500000.00', 'VENDIDO', '2015-04-09 12:14:16'), 
      ('6', 'FACTURA-00002', 'PA54423', '22991611-4', '10', '0', '12200.00', 'VENDIDO', '2015-04-08 07:05:42'), 
      ('7', 'FACTURA-00002', 'PT54423', '22991611-4', '10', '0', '13000.00', 'VENDIDO', '2015-04-08 07:05:42'), 
      ('8', 'FACTURA-00002', 'LA88863', '22991611-4', '10', '0', '15000.00', 'VENDIDO', '2015-04-08 07:05:42'), 
      ('9', 'FACTURA-00002', 'CRT9853', '22991611-4', '10', '0', '1358000.00', 'VENDIDO', '2015-04-08 07:05:42'), 
      ('10', 'FACTURA-00002', 'CR0001', '22991611-4', '10', '0', '850000.00', 'VENDIDO', '2015-04-08 07:05:42'), 
      ('11', 'BOLETA-00002', 'LA88863', '6255375-8', '10', '0', '15000.00', 'VENDIDO', '2015-04-08 07:10:21'), 
      ('14', 'BOLETA-00003', 'TQ1776423', '6538915-0', '1', '0', '1750.00', 'VENDIDO', '2015-04-10 02:13:07'), 
      ('15', 'BOLETA-00003', 'PT54423', '6538915-0', '2541', '0', '3303300.00', 'VENDIDO', '2015-04-10 02:13:07'), 
      ('16', 'BOLETA-00003', 'TQ7665', '6538915-0', '1881', '0', '2633400.00', 'VENDIDO', '2015-04-10 02:13:07'), 
      ('18', 'BOLETA-00004', 'PA54423', '6255375-8', '1560', '0', '1903200.00', 'VENDIDO', '2015-04-10 03:06:20'), 
      ('19', 'GUIA-00001', 'PT54423', '23943429-0', '2', '0', '2600.00', 'VENDIDO', '2015-04-14 02:14:38'), 
      ('20', 'GUIA-00001', 'TQ7665', '23943429-0', '2', '0', '2800.00', 'VENDIDO', '2015-04-14 02:14:38'), 
      ('21', 'GUIA-00001', 'LA88863', '23943429-0', '2', '0', '3000.00', 'VENDIDO', '2015-04-14 02:14:38'), 
      ('22', 'GUIA-00002', 'PA54423', '23943429-0', '5', '0', '6100.00', 'VENDIDO', '2015-04-14 02:15:11'), 
      ('23', 'GUIA-00002', 'LA88863', '23943429-0', '5', '0', '7500.00', 'VENDIDO', '2015-04-14 02:15:11'), 
      ('24', 'GUIA-00002', 'CR0001', '23943429-0', '2', '0', '170000.00', 'VENDIDO', '2015-04-14 02:15:11'), 
      ('25', 'FACTURA-00003', 'PA54423', '22991611-4', '4', '0', '4880.00', 'VENDIDO', '2015-04-14 02:15:58'), 
      ('26', 'FACTURA-00003', 'CRT9853', '22991611-4', '3', '0', '407400.00', 'VENDIDO', '2015-04-14 02:15:58'), 
      ('27', 'NOTA-00001', 'PA54423', '24751593-3', '41', '0', '50020.00', 'VENDIDO', '2015-06-14 01:28:12'), 
      ('28', 'NOTA-00001', 'PT54423', '24751593-3', '8', '0', '10400.00', 'VENDIDO', '2015-06-14 01:28:12'), 
      ('29', 'NOTA-00001', 'TQ7665', '24751593-3', '8', '0', '11200.00', 'VENDIDO', '2015-06-14 01:28:12');
COMMIT;

# | Vaciado de tabla 'log'
# +-------------------------------------
DROP TABLE IF EXISTS `log`;


# | Estructura de la tabla 'log'
# +-------------------------------------
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `tiempo` datetime DEFAULT NULL,
  `detalles` text,
  `paginas` text,
  `usuario` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'log'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `log` (`id`, `ip`, `tiempo`, `detalles`, `paginas`, `usuario`) VALUES 
      ('1', '127.0.0.1', '2015-04-12 01:29:29', 'Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0', '/inventario/ingreso.php', 'RUBENCHIRINOS'), 
      ('2', '127.0.0.1', '2015-04-14 02:03:28', 'Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0', '/inventario/ingreso.php', 'RUBENCHIRINOS'), 
      ('3', '127.0.0.1', '2015-06-14 12:39:29', 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0', '/inventario/ingreso.php', 'RUBENCHIRINOS'), 
      ('4', '127.0.0.1', '2015-06-29 08:32:04', 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0', '/inventario/ingreso.php', 'RUBENCHIRINOS');
COMMIT;

# | Vaciado de tabla 'material_almacen'
# +-------------------------------------
DROP TABLE IF EXISTS `material_almacen`;


# | Estructura de la tabla 'material_almacen'
# +-------------------------------------
CREATE TABLE `material_almacen` (
  `cod_orden` varchar(10) NOT NULL,
  `cod_material` varchar(10) NOT NULL,
  `precio_venta` float NOT NULL,
  `existencia` int(5) NOT NULL,
  `minimo_stock` int(5) NOT NULL,
  `ubicacion_deposito` varchar(150) NOT NULL,
  `status_material` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'material_almacen'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `material_almacen` (`cod_orden`, `cod_material`, `precio_venta`, `existencia`, `minimo_stock`, `ubicacion_deposito`, `status_material`) VALUES 
      ('01', 'CR0001', '85000', '1438', '50', 'ESTANTERIA 6', 'ACTIVO'), 
      ('02', 'CRT9853', '135800', '1387', '0', '0', 'ACTIVO'), 
      ('03', 'TQ1776423', '2000', '5599', '0', '0', 'ACTIVO'), 
      ('04', 'TQ7665', '1400', '4490', '0', '0', 'ACTIVO'), 
      ('05', 'LA88863', '1500', '7973', '0', '0', 'ACTIVO'), 
      ('06', 'PT54423', '1300', '15490', '0', '0', 'ACTIVO'), 
      ('07', 'PA54423', '1220', '1500', '0', '0', 'ACTIVO');
COMMIT;

# | Vaciado de tabla 'orden_compras'
# +-------------------------------------
DROP TABLE IF EXISTS `orden_compras`;


# | Estructura de la tabla 'orden_compras'
# +-------------------------------------
CREATE TABLE `orden_compras` (
  `cod_orden` varchar(10) NOT NULL,
  `cod_material` varchar(10) NOT NULL,
  `material` varchar(50) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `cant` int(5) NOT NULL,
  `codigo_barra` varchar(50) NOT NULL,
  `rutprov` varchar(25) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`cod_orden`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'orden_compras'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `orden_compras` (`cod_orden`, `cod_material`, `material`, `precio_compra`, `precio_venta`, `cant`, `codigo_barra`, `rutprov`, `fecha_ingreso`) VALUES 
      ('01', 'CR0001', 'LAMINAS DE ZINC', '80000', '85000', '1550', '098765555', '5617715-9', '2015-04-14'), 
      ('02', 'CRT9853', 'LAMINAS DE ACEROLI', '125000', '135800', '1500', '0886354', '5617715-9', '2015-04-08'), 
      ('03', 'TQ1776423', 'TUBOS DE 4X4', '1400', '1750', '5000', '22200021', '5617715-9', '2015-04-08'), 
      ('04', 'TQ7665', 'TUBOS DE 2X2', '1200', '1400', '4500', '8888111', '5617715-9', '2015-04-10'), 
      ('05', 'LA88863', 'LADRILLOS ROJOS', '1100', '1500', '8000', '0441322', '15123919-6', '2015-04-08'), 
      ('06', 'PT54423', 'PINTURAS PINTO COLOR VERDE', '780', '8300', '15500', '00536432', '15123919-6', '2015-04-10'), 
      ('07', 'PA54423', 'PINTURA PINTO COLOR AZUL', '780', '1220', '1550', '7553421', '20739800-4', '2015-04-10'), 
      ('08', 'TQ1776423', 'TUBOS DE 4X4', '1400', '1750', '500', '66799900', '5617715-9', '2015-04-10'), 
      ('09', 'TQ1776423', 'TUBOS DE 4X4', '1400', '2000', '100', '456656456', '5617715-9', '2015-04-10');
COMMIT;

# | Vaciado de tabla 'pedidos'
# +-------------------------------------
DROP TABLE IF EXISTS `pedidos`;


# | Estructura de la tabla 'pedidos'
# +-------------------------------------
CREATE TABLE `pedidos` (
  `cod_pedido` varchar(10) NOT NULL,
  `cod_material` varchar(10) NOT NULL,
  `material_pedido` varchar(50) NOT NULL,
  `cantidad_pedido` int(5) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `rutprov` varchar(25) NOT NULL,
  PRIMARY KEY (`cod_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'pedidos'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `pedidos` (`cod_pedido`, `cod_material`, `material_pedido`, `cantidad_pedido`, `fecha_pedido`, `rutprov`) VALUES 
      ('01', 'TQ1776423', 'TUBOS DE 4X4', '8000', '2015-04-08', '5617715-9'), 
      ('02', 'LA88863', 'LADRILLOS ROJOS', '4550', '2015-04-08', '5617715-9'), 
      ('03', 'CR0001', 'LAMINAS DE ZINC', '8800', '2015-04-08', '5617715-9'), 
      ('04', 'PA655243', 'PINTURA SOLINTEX', '3899', '2015-04-08', '20739800-4');
COMMIT;

# | Vaciado de tabla 'proveedores'
# +-------------------------------------
DROP TABLE IF EXISTS `proveedores`;


# | Estructura de la tabla 'proveedores'
# +-------------------------------------
CREATE TABLE `proveedores` (
  `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `rutprov` varchar(25) NOT NULL,
  `nombreprov` varchar(40) NOT NULL,
  `telefprov` varchar(15) NOT NULL,
  `direcprov` varchar(100) NOT NULL,
  `ciudadprov` varchar(80) NOT NULL,
  `regionprov` varchar(80) NOT NULL,
  `giroprov` varchar(50) NOT NULL,
  `emailprov` varchar(50) NOT NULL,
  `nomcontacto` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'proveedores'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `proveedores` (`cod_proveedor`, `rutprov`, `nombreprov`, `telefprov`, `direcprov`, `ciudadprov`, `regionprov`, `giroprov`, `emailprov`, `nomcontacto`) VALUES 
      ('1', '5617715-9', 'PROVEEDURIA LAS MALVINAS', '0426478956', 'SANTA CRUZ DE MORA ESTADO MERIDA', 'EL VIGIA', 'LA CARCELARIA', 'REPUESTOS', 'ELSAIYA@GMAIL.COM', 'RUBEN DARIO CHIRINOS RODRIGUEZ'), 
      ('2', '15123919-6', 'COMERCIALIZADORA ANTR', '04268957859', 'SANTA CLARA', 'RAMONES', 'OCCIDENTAL', 'IMPORTACIONES', 'COMERCIALIZADORA@HOTMAIL.COM', 'MARBELLA PAREDES MARQUEZ'), 
      ('3', '20739800-4', 'FERRECOM', '0125465897', 'SANTA INES', 'CABELLL', 'REGIONAL', 'REPUESTOS', 'FERRE@GMAILO.COM', 'MOISES RODOLFO CHIRINOS'), 
      ('4', '23982018-2', 'HERRAMIENTAS', '04284569875', 'SECTOR LOS ZAUSALES', 'RAMONES', 'OCCIDENTAL', 'REPUESTOS', 'HERR@YAHOO.COM', 'MARIA NUBIA RODRIGUEZ');
COMMIT;

# | Vaciado de tabla 'usuarios'
# +-------------------------------------
DROP TABLE IF EXISTS `usuarios`;


# | Estructura de la tabla 'usuarios'
# +-------------------------------------
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(25) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pregunta` varchar(50) NOT NULL,
  `respuesta` varchar(40) NOT NULL,
  `nivel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'usuarios'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `usuarios` (`id`, `cedula`, `nombre`, `cargo`, `usuario`, `password`, `pregunta`, `respuesta`, `nivel`) VALUES 
      ('1', '16306471-5', 'MARBELLA PAREDES MARQUEZ', 'ADMINISTRADORA', 'MARBELLA', 'eceba48f37b5021833a485470e7546e9ba870764', 'NOMBRE DE TU PRIMER MASCOTA', 'NEGRA', 'ADMINISTRADOR'), 
      ('2', '14323962-4', 'MOISES RODOLFO CHIRINOS LEAL', 'ASISTENTE', 'MOISES', '680e8c6a6723fe06f8fab72048e1e260436b1ad3', 'NOMBRE DE TU PRIMER MASCOTA', 'CHIRA', 'ASISTENTE'), 
      ('3', '17345875-4', 'RUBEN DARIO CHIRINOS RODRIGUEZ', 'WEBMASTER', 'RUBENCHIRINOS', 'd8d5c0b005711418a83990c6f5405310fa487cb4', 'NOMBRE DE LA MADRE', 'NUBIA', 'ADMINISTRADOR');
COMMIT;

# | Vaciado de tabla 'ventas'
# +-------------------------------------
DROP TABLE IF EXISTS `ventas`;


# | Estructura de la tabla 'ventas'
# +-------------------------------------
CREATE TABLE `ventas` (
  `cod_venta` varchar(30) NOT NULL,
  `rutcliente` varchar(25) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `subtotal` float(12,2) NOT NULL,
  `iva` float(12,2) NOT NULL,
  `total_iva` float(12,2) NOT NULL,
  `total_pago` float(12,2) NOT NULL,
  `fecha_venta` date NOT NULL,
  `tipo_pago` varchar(10) NOT NULL,
  `tipo_venta` varchar(15) NOT NULL,
  PRIMARY KEY (`cod_venta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                
# | Carga de datos de la tabla 'ventas'
# +-------------------------------------

COMMIT;
INSERT IGNORE INTO `ventas` (`cod_venta`, `rutcliente`, `vendedor`, `subtotal`, `iva`, `total_iva`, `total_pago`, `fecha_venta`, `tipo_pago`, `tipo_venta`) VALUES 
      ('BOLETA-00001', '6255375-8', '17345875', '22080000.00', '20.00', '4416000.00', '26496000.00', '2015-04-09', 'EFECTIVO', 'BOLETA'), 
      ('FACTURA-00001', '23943429-0', '17345875', '23900.00', '20.00', '4780.00', '28680.00', '2015-04-09', 'EFECTIVO', 'FACTURA'), 
      ('FACTURA-00002', '22991611-4', '18633174', '2248200.00', '20.00', '449640.00', '2697840.00', '2015-04-08', 'EFECTIVO', 'FACTURA'), 
      ('BOLETA-00002', '6255375-8', '18633174', '15000.00', '20.00', '3000.00', '18000.00', '2015-04-08', 'EFECTIVO', 'BOLETA'), 
      ('BOLETA-00003', '6538915-0', '18633174', '5938450.00', '20.00', '1187690.00', '7126140.00', '2015-04-10', 'CHEQUE', 'BOLETA'), 
      ('BOLETA-00004', '6255375-8', '18633174', '1903200.00', '20.00', '380640.00', '2283840.00', '2015-04-10', 'CHEQUE', 'BOLETA'), 
      ('GUIA-00001', '23943429-0', '17345875', '8400.00', '20.00', '1680.00', '10080.00', '2015-04-14', 'EFECTIVO', 'GUIA'), 
      ('GUIA-00002', '23943429-0', '17345875', '183600.00', '20.00', '36720.00', '220320.00', '2015-04-14', 'EFECTIVO', 'GUIA'), 
      ('FACTURA-00003', '22991611-4', '17345875', '412280.00', '20.00', '82456.00', '494736.00', '2015-04-14', 'CHEQUE', 'FACTURA'), 
      ('NOTA-00001', '24751593-3', '17345875', '71620.00', '20.00', '14324.00', '85944.00', '2015-06-14', 'CHEQUE', 'NOTA');
COMMIT;


