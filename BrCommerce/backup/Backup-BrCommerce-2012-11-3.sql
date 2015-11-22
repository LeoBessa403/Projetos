CREATE DATABASE IF NOT EXISTS brcommerce;

USE brcommerce;

DROP TABLE IF EXISTS acesso;

CREATE TABLE `acesso` (
  `ACE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ULTIMO_ACESSO` varchar(200) NOT NULL,
  PRIMARY KEY (`ACE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO acesso VALUES("1","20121128153733");



DROP TABLE IF EXISTS serial;

CREATE TABLE `serial` (
  `SER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SER_SERIAL` varchar(255) NOT NULL,
  `SER_MES` varchar(11) NOT NULL,
  `SER_STATUS` varchar(200) NOT NULL,
  PRIMARY KEY (`SER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

INSERT INTO serial VALUES("1","TlNIMENYVThPSFc2SVhaMw==","201212","pendente");
INSERT INTO serial VALUES("2","TUlRMklVRDFaVEU1WUtXMQ==","201301","pendente");
INSERT INTO serial VALUES("3","WERHM1BHRjlYSFAySEtRMg==","201302","pendente");
INSERT INTO serial VALUES("4","VVpCMlVLQTlHV0g4U1dCNw==","201303","pendente");
INSERT INTO serial VALUES("5","RFdCOVdaTjNDUkUyRERFNQ==","201304","pendente");
INSERT INTO serial VALUES("6","V1pINUJGVDFKTkc1TVdBNw==","201305","pendente");
INSERT INTO serial VALUES("7","R0NUMEVCUzFFTE82VktQMg==","201306","pendente");
INSERT INTO serial VALUES("8","QUtMMkZNSTZMTUM2REtZMA==","201307","pendente");
INSERT INTO serial VALUES("9","R1FLNEdOVTREUFk0SlhZMg==","201308","pendente");
INSERT INTO serial VALUES("10","V0JMM0dEWTVLVVkwUUJQOA==","201309","pendente");
INSERT INTO serial VALUES("11","Q09VMUdJUzlaQ0I1VlZBNw==","201310","pendente");
INSERT INTO serial VALUES("12","VERJOEVFRzdDTUw4QUVFOQ==","201311","pendente");
INSERT INTO serial VALUES("13","VlZEM0NQTjlTWkMwRERCNQ==","201312","pendente");
INSERT INTO serial VALUES("14","SlFDN1dPTjRUT1cwR1JRNA==","201401","pendente");
INSERT INTO serial VALUES("15","TE5LOFVFRjJIR0E5S1ZXNg==","201402","pendente");
INSERT INTO serial VALUES("16","Wk1UOVFJUTRIQUg2Sk9aMg==","201403","pendente");
INSERT INTO serial VALUES("17","V09KOEpEVDlUWVUxSllUMg==","201404","pendente");
INSERT INTO serial VALUES("18","SlNHNUVOUThSVk41SlVGNQ==","201405","pendente");
INSERT INTO serial VALUES("19","S1pJMFlNRjBCWU04SUhKMQ==","201406","pendente");
INSERT INTO serial VALUES("20","U0tSNE9BTjZXQVE4SEpIMQ==","201407","pendente");
INSERT INTO serial VALUES("21","T1RFN0dFTjVIR0E4RUNYNA==","201408","pendente");
INSERT INTO serial VALUES("22","WUhYOFlXRzdDUFE1QkpHMQ==","201409","pendente");
INSERT INTO serial VALUES("23","UldZN0xIUzNJQUwxWUhLMQ==","201410","pendente");
INSERT INTO serial VALUES("24","V1FCNUFGWTJDT002UlVDNA==","201411","pendente");
INSERT INTO serial VALUES("25","Uk1MMU9UVDVLRVQ5TFlQMQ==","201412","pendente");
INSERT INTO serial VALUES("26","WUlCNkJZSTFBWUYwRU5WMg==","201501","pendente");
INSERT INTO serial VALUES("27","TkpYOU5PUzFFUlgwWFVUNg==","201502","pendente");
INSERT INTO serial VALUES("28","Uk1aMVpYVDRVT1Y4T1FKMw==","201503","pendente");
INSERT INTO serial VALUES("29","SFJHMUpVTjBZT1c1RkNVNA==","201504","pendente");
INSERT INTO serial VALUES("30","S1pTOVRIWjBMUUgwVkRZOA==","201505","pendente");
INSERT INTO serial VALUES("31","WElMNkNJRjRMVlk0SlVTNQ==","201506","pendente");
INSERT INTO serial VALUES("32","WFZJMUxCRDFXQ1I2V0FGNg==","201507","pendente");
INSERT INTO serial VALUES("33","SUpONVNLVDFYTFI3TVZNMQ==","201508","pendente");
INSERT INTO serial VALUES("34","S0JZN1pGRDRJWFg1V0dMOQ==","201509","pendente");
INSERT INTO serial VALUES("35","VFVNOEVSRjJHTUszSkdEMA==","201510","pendente");
INSERT INTO serial VALUES("36","UVJIN0lUWjJRQ0E5VllONQ==","201511","pendente");
INSERT INTO serial VALUES("37","WlBINU9KTjZNWVgzR0JSMw==","201512","pendente");
INSERT INTO serial VALUES("38","VlFOMVJRVDRVUlo2UFlONQ==","201601","pendente");
INSERT INTO serial VALUES("39","Q1RaNVRNUzRPUEs3V0dCMA==","201602","pendente");
INSERT INTO serial VALUES("40","WVpSOFZYSTlVUVk2RkdLOA==","201603","pendente");
INSERT INTO serial VALUES("41","Q0hPOVlXVDdOVFA0TVZLMA==","201604","pendente");
INSERT INTO serial VALUES("42","VVNSOVlPWThTV1AxVFpCNg==","201605","pendente");
INSERT INTO serial VALUES("43","V0ZBN1ZVUjJLR1U1V1RONQ==","201606","pendente");
INSERT INTO serial VALUES("44","UFZQNFVQRzBNUkU5Q0NSNw==","201607","pendente");
INSERT INTO serial VALUES("45","U05JOVJBTjJCRFYwR0JOMw==","201608","pendente");
INSERT INTO serial VALUES("46","SEhJMk9aTTdDU1IxSVBEMg==","201609","pendente");
INSERT INTO serial VALUES("47","S0VPNEpQRTVRSlQ5TFRMNA==","201610","pendente");
INSERT INTO serial VALUES("48","VkVaNEdVUDdRRUE2Tk1NMA==","201611","pendente");



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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("1","Administrador Master","bGVvYmVzc2E=","leodjx@hotmail.com","5","azul","leo");
INSERT INTO usuario VALUES("2","teste","dGVzdGUwNQ==","lfefewg@hoitmail.com","2","azul","teste06");
INSERT INTO usuario VALUES("3","testefe","bGVvYmVzc2E=","leodjx@hotmail.com","1","azul","leofkpdfj");
INSERT INTO usuario VALUES("4","testefe","bGVvYmVzc2E=","teste@hewfoihj.com.hwfdu","1","azul","geawsgeg");
INSERT INTO usuario VALUES("5","testefe","bGVvYmVzc2E=","teste@hewfoihj.com.hwfdu","1","azul","fewafewfefge");
INSERT INTO usuario VALUES("6","gewrgewhg","dGVzdGV2ZXJkZQ==","lfefewg@hoitmail.com","1","verde","testeverde");
INSERT INTO usuario VALUES("7","testeverde","dGVzdGV2ZXJtZWxobw==","lfefewg@hoitmail.com","1","vermelho","testevermelho");
INSERT INTO usuario VALUES("8","testevermelho","dGVzdGVhbWFyZWxv","lfefewg@hoitmail.com","3","amarelo","testeamarelo");
INSERT INTO usuario VALUES("9","teste","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","sdgfdsagsdagsdag");
INSERT INTO usuario VALUES("10","testeverde","bGVvYmVzc2E=","leodjx@hotmail.com","1","azul","dsagdsgdsg");
INSERT INTO usuario VALUES("11","gewrgewhg","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","asdgfgfdh");
INSERT INTO usuario VALUES("12","gewrgewhg","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","adsghfhf");
INSERT INTO usuario VALUES("13","testeverde","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","asgdsgdg");
INSERT INTO usuario VALUES("14","testefe","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","asdgdfsgd");
INSERT INTO usuario VALUES("15","testeverde","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","lvdsvdsvdsvdv");
INSERT INTO usuario VALUES("16","teste","bGVvYmVzc2E=","leodjx@hotmail.com","1","azul","fdnrnr");
INSERT INTO usuario VALUES("17","gewrgewhg","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","gerh4h4");
INSERT INTO usuario VALUES("18","testefe","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","brbrnrn");
INSERT INTO usuario VALUES("19","bebebbebe","bGVvYmVzc2E=","lfefewg@hoitmail.com","1","azul","brenrnr");
INSERT INTO usuario VALUES("20","gewrgewhg","bGVvYmVzc2E=","teste@hewfoihj.com.hwfdu","1","azul","vevebe");



