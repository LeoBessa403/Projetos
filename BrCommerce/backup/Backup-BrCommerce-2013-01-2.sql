CREATE DATABASE IF NOT EXISTS brcommerce;

USE brcommerce;

DROP TABLE IF EXISTS acesso;

CREATE TABLE `acesso` (
  `ACE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ULTIMO_ACESSO` varchar(200) NOT NULL,
  PRIMARY KEY (`ACE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO acesso VALUES("1","20130120154624");



DROP TABLE IF EXISTS serial;

CREATE TABLE `serial` (
  `SER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SER_SERIAL` varchar(255) NOT NULL,
  `SER_MES` varchar(11) NOT NULL,
  `SER_STATUS` varchar(200) NOT NULL,
  PRIMARY KEY (`SER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

INSERT INTO serial VALUES("1","UFJNNUxGSjRLVFc5SFhWMw==","201212","pendente");
INSERT INTO serial VALUES("2","VVNINlVZQjBUSUs0UlZWMQ==","201301","pendente");
INSERT INTO serial VALUES("3","V0lVMFFQVzRET0wyTVlDNw==","201302","pendente");
INSERT INTO serial VALUES("4","Q1FBN1dKQTdOSUgzVVpPMQ==","201303","pendente");
INSERT INTO serial VALUES("5","RU1aOFNJSThZVFk5TkZGNA==","201304","pendente");
INSERT INTO serial VALUES("6","R1hSMlpJWDdEU0Q3VE9ENQ==","201305","pendente");
INSERT INTO serial VALUES("7","SFdCMFJNUTVKSEQ5TVdHNQ==","201306","pendente");
INSERT INTO serial VALUES("8","SE9FMVlTUTJSTVk0UUxPMw==","201307","pendente");
INSERT INTO serial VALUES("9","R1VaNk5aVjdZRkgzR0JEMA==","201308","pendente");
INSERT INTO serial VALUES("10","RlBONFFKRzBBUEw2SVRYNQ==","201309","pendente");
INSERT INTO serial VALUES("11","Q1pVNUZZWTJFTksxV05YOA==","201310","pendente");
INSERT INTO serial VALUES("12","WlpVMEhNUzJIQ1gwWkpDMA==","201311","pendente");
INSERT INTO serial VALUES("13","Vk9NOVZEVTBJRkczTkpOMA==","201312","pendente");
INSERT INTO serial VALUES("14","UlRYMVVYQzdMV0c5TUxFOQ==","201401","pendente");
INSERT INTO serial VALUES("15","TE5CNkhVUDNMSEE5V1FCNg==","201402","pendente");
INSERT INTO serial VALUES("16","RlhYNUZUSzdMRk0xWVlEMg==","201403","pendente");
INSERT INTO serial VALUES("17","WFlNN1BVRzlKU1I4R0ZMNg==","201404","pendente");
INSERT INTO serial VALUES("18","UExVMk1XSjBLVk84Q1JXOA==","201405","pendente");
INSERT INTO serial VALUES("19","R1BVMVZFVTlGTkYxSkZTOQ==","201406","pendente");
INSERT INTO serial VALUES("20","WEtONFFOSjdCVk83RlZSOQ==","201407","pendente");
INSERT INTO serial VALUES("21","TVJaMFhXRjNYU1A4TU9WNw==","201408","pendente");
INSERT INTO serial VALUES("22","QlBFOVFMRzdTRUoxRklHMw==","201409","pendente");
INSERT INTO serial VALUES("23","UERCMllCTjBNR1k4SkhZOA==","201410","pendente");
INSERT INTO serial VALUES("24","Q0dROE9VWjJGV0M4QkhSMQ==","201411","pendente");
INSERT INTO serial VALUES("25","T1paN1NQUjJYRUIyRkpUMg==","201412","pendente");
INSERT INTO serial VALUES("26","QUhBMEtNUDBQQlMwVVBBMg==","201501","pendente");
INSERT INTO serial VALUES("27","SkZVN0pNVDdHTUIwWVlOMQ==","201502","pendente");
INSERT INTO serial VALUES("28","VVNIN1pPQzJZT0U0SkdGOA==","201503","pendente");
INSERT INTO serial VALUES("29","RFVNMFpTUjZMRVoyTFNEMw==","201504","pendente");
INSERT INTO serial VALUES("30","TE1KN01aTDhaSk4zWEhINw==","201505","pendente");
INSERT INTO serial VALUES("31","VFRCN0xJTDhNR1Q4WVdSOQ==","201506","pendente");
INSERT INTO serial VALUES("32","WlFKMVlWUjdaUlM1SFNHMA==","201507","pendente");
INSERT INTO serial VALUES("33","RkNNOFVJRDRMUko3RU9COQ==","201508","pendente");
INSERT INTO serial VALUES("34","SkRIOUVBVTBZSFYyTk5DNg==","201509","pendente");
INSERT INTO serial VALUES("35","T1VVM1pUUjRHTVcwS09LMg==","201510","pendente");
INSERT INTO serial VALUES("36","U0JBMEhQVTdRSFUxUVJVNw==","201511","pendente");
INSERT INTO serial VALUES("37","VVhaMUNOQzhXUkk2SlhMOQ==","201512","pendente");
INSERT INTO serial VALUES("38","WUtRNUtPUThHUVE1UUZJMQ==","201601","pendente");
INSERT INTO serial VALUES("39","WElBM0JSSjZORlE3S1FNMA==","201602","pendente");
INSERT INTO serial VALUES("40","WFpENEZZSTJUSksyTURWOQ==","201603","pendente");
INSERT INTO serial VALUES("41","WUZaOVlFTzdaRFUxRFNJNQ==","201604","pendente");
INSERT INTO serial VALUES("42","VkFON1pPWjBETlc0R0pEMA==","201605","pendente");
INSERT INTO serial VALUES("43","U0pVOFBCUDJITFY5VUZENA==","201606","pendente");
INSERT INTO serial VALUES("44","UEpUM1FRTDJKQUo4WUNLNQ==","201607","pendente");
INSERT INTO serial VALUES("45","TFpNMkVLTjFNRFMxSUJUNg==","201608","pendente");
INSERT INTO serial VALUES("46","R0VYNEVDVjhOWVQ3S0RKNQ==","201609","pendente");
INSERT INTO serial VALUES("47","QldBOVFXSzNPRk02VUhIMg==","201610","pendente");
INSERT INTO serial VALUES("48","VUtYOE9YQjdPRFo5U09JNw==","201611","pendente");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `USU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USU_NOME` varchar(255) NOT NULL,
  `USU_SENHA` varchar(255) NOT NULL,
  `USU_EMAIL` varchar(255) NOT NULL,
  `USU_NIVEL` varchar(50) NOT NULL,
  `USU_COR` varchar(255) NOT NULL,
  `USU_LOGIN` varchar(255) NOT NULL,
  PRIMARY KEY (`USU_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("1","Administrador Master","bGVvYmVzc2E=","leodjx@hotmail.com","5","azul","leo");


