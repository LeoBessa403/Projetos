<?php
@session_start();
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF: Elizeu Alcantara         		          |
// +----------------------------------------------------------------------+


// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

require('../util/conecta.php');
require('gera_boleto.php');

$boleto = new  gera_boleto();
$boleto->busca_dados();
$boleto->registros = $boleto->resultado->FetchNextObject();

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 2;
$taxa_boleto = 2;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
//alerta(str_replace("R$ ","",$boleto->reg_soma->VEN_TOTAL));
$valor_cobrado = str_replace("R$ ","",$boleto->reg_soma->VEN_TOTAL);
//"2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = "80";  // Carteira SR: 80, 81 ou 82  -  Carteira CR: 90 (Confirmar com gerente qual usar)
$dadosboleto["nosso_numero"] = "19525086";  // Nosso numero sem o DV - REGRA: M�ximo de 8 caracteres!
$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $boleto->registros->CLI_NOME;
//"Nome do seu Cliente";
$dadosboleto["endereco1"] = $boleto->registros->CLI_ENDERECO;


// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compras";
$dadosboleto["demonstrativo2"] = "Compra referente ao pedido ".$_SESSION['sessao_codigo_pedido'];
$dadosboleto["demonstrativo3"] = "";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"] = "- Taxa do Boleta de R$ 2,00";
$dadosboleto["instrucoes3"] = "- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes4"] = "- Em caso de d�vidas entre em contato conosco: ByNet Sistema Gerenciador";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //

// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = "0464"; // Num da agencia, sem digito
$dadosboleto["conta"] = "46563"; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "7"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = "87000000414"; // ContaCedente do Cliente, sem digito (Somente N�meros)
$dadosboleto["conta_cedente_dv"] = "3"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "SR";  // C�digo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = "ByNet - Sistema Gerenciador";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "";
$dadosboleto["cidade_uf"] = "";
$dadosboleto["cedente"] = "Leonardo Bessa";

// N�O ALTERAR!
include("include/funcoes_cef.php"); 
include("include/layout_cef.php");
?>
