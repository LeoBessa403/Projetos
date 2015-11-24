<?php
     session_start();     
	 if(!$_SESSION['sessao_codigo_usuario'])
	 {
		 require('util/funcoes.php');
	 	 direciona('login_form.php');
		 exit;
	 }
	 else
	 {
		 
		  $tabela = $_REQUEST['tabela'];
		  	if ($tabela == '')
				$tabela = 'home';
	 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ByNet - Sistema Gerenciador de Armarinho e Papelaria</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">td img {display: block;}</style>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
  <link href="util/estilos.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="util/funcoes.js"></script>
      <style type="text/css">td img {display: block;}</style>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="shadowbox_js/shadowbox.js"></script>
<link rel="stylesheet" type="text/css" href="shadowbox_js/shadowbox.css">
<script type="text/javascript">
Shadowbox.init({
    language: 'pt',
    players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv', 'mp4', '3gp', 'wmv'],
});</script>
</head>

<body background="imagens_site/fundo2.jpg" onload="MM_preloadImages('imagens_site/home_r4_c4_f2.jpg','imagens_site/home_r4_c4_f4.jpg','imagens_site/home_r4_c4_f3.jpg','imagens_site/home_r4_c9_f2.jpg','imagens_site/home_r4_c9_f4.jpg','imagens_site/home_r4_c9_f3.jpg','imagens_site/home_r4_c13_f2.jpg','imagens_site/home_r4_c13_f4.jpg','imagens_site/home_r4_c13_f3.jpg','imagens_site/home_r4_c17_f2.jpg','imagens_site/home_r4_c17_f4.jpg','imagens_site/home_r4_c17_f3.jpg','imagens_site/home_r4_c20_f2.jpg','imagens_site/home_r4_c20_f4.jpg','imagens_site/home_r4_c20_f3.jpg')">
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td width="22"><img src="imagens_site/spacer.gif" width="22" height="1" border="0" alt="" /></td>
   <td width="9"><img src="imagens_site/spacer.gif" width="9" height="1" border="0" alt="" /></td>
   <td width="12"><img src="imagens_site/spacer.gif" width="12" height="1" border="0" alt="" /></td>
   <td width="18"><img src="imagens_site/spacer.gif" width="18" height="1" border="0" alt="" /></td>
   <td width="44"><img src="imagens_site/spacer.gif" width="44" height="1" border="0" alt="" /></td>
   <td width="62"><img src="imagens_site/spacer.gif" width="62" height="1" border="0" alt="" /></td>
   <td width="26"><img src="imagens_site/spacer.gif" width="26" height="1" border="0" alt="" /></td>
   <td width="25"><img src="imagens_site/spacer.gif" width="25" height="1" border="0" alt="" /></td>
   <td width="83"><img src="imagens_site/spacer.gif" width="83" height="1" border="0" alt="" /></td>
   <td width="27"><img src="imagens_site/spacer.gif" width="27" height="1" border="0" alt="" /></td>
   <td width="60"><img src="imagens_site/spacer.gif" width="60" height="1" border="0" alt="" /></td>
   <td width="28"><img src="imagens_site/spacer.gif" width="28" height="1" border="0" alt="" /></td>
   <td width="83"><img src="imagens_site/spacer.gif" width="83" height="1" border="0" alt="" /></td>
   <td width="87"><img src="imagens_site/spacer.gif" width="87" height="1" border="0" alt="" /></td>
   <td width="11"><img src="imagens_site/spacer.gif" width="11" height="1" border="0" alt="" /></td>
   <td width="16"><img src="imagens_site/spacer.gif" width="16" height="1" border="0" alt="" /></td>
   <td width="162"><img src="imagens_site/spacer.gif" width="162" height="1" border="0" alt="" /></td>
   <td width="8"><img src="imagens_site/spacer.gif" width="8" height="1" border="0" alt="" /></td>
   <td width="51"><img src="imagens_site/spacer.gif" width="51" height="1" border="0" alt="" /></td>
   <td width="32"><img src="imagens_site/spacer.gif" width="32" height="1" border="0" alt="" /></td>
   <td width="92"><img src="imagens_site/spacer.gif" width="92" height="1" border="0" alt="" /></td>
   <td width="13"><img src="imagens_site/spacer.gif" width="13" height="1" border="0" alt="" /></td>
   <td width="29"><img src="imagens_site/spacer.gif" width="29" height="1" border="0" alt="" /></td>
   <td width="10"><img src="imagens_site/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td colspan="4"><img name="home_r1_c1" src="imagens_site/home_r1_c1.jpg" width="61" height="20" border="0" id="home_r1_c1" alt="" /></td>
   <td colspan="5"><img name="home_r1_c5" src="imagens_site/home_r1_c5.jpg" width="240" height="20" border="0" id="home_r1_c5" alt="" /></td>
   <td><img name="home_r1_c10" src="imagens_site/home_r1_c10.jpg" width="27" height="20" border="0" id="home_r1_c10" alt="" /></td>
   <td colspan="10"><img name="home_r1_c11" src="imagens_site/home_r1_c11.jpg" width="538" height="20" border="0" id="home_r1_c11" alt="" /></td>
   <td colspan="3"><img name="home_r1_c21" src="imagens_site/home_r1_c21.jpg" width="134" height="20" border="0" id="home_r1_c21" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="20" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="home_r2_c1" src="imagens_site/home_r2_c1.jpg" width="61" height="168" border="0" id="home_r2_c1" alt="" /></td>
   <td colspan="5"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="240" height="168">
     <param name="movie" value="midias/novo.swf" />
     <param name="quality" value="high" />
     <param name="wmode" value="opaque" />
     <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
     <!--[if !IE]>-->
     <object type="application/x-shockwave-flash" data="midias/novo.swf" width="240" height="168">
       <!--<![endif]-->
       <param name="quality" value="high" />
       <param name="wmode" value="opaque" />
       <param name="swfversion" value="6.0.65.0" />
       <param name="expressinstall" value="Scripts/expressInstall.swf" />
       <!-- O navegador exibe o seguinte conteúdo alternativo para usuários que tenham o Flash Player 6.0 e versões anteriores. -->
        <!--[if !IE]>-->
     </object>
     <!--<![endif]-->
   </object>
   
   </td>
   <td><img name="home_r2_c10" src="imagens_site/home_r2_c10.jpg" width="27" height="168" border="0" id="home_r2_c10" alt="" /></td>
   <td colspan="10"><img name="home_r2_c11" src="imagens_site/topo.gif" width="538" height="168" border="0" id="home_r2_c11" alt="" /></td>
   <td colspan="3"><img name="home_r2_c21" src="imagens_site/home_r2_c21.jpg" width="134" height="168" border="0" id="home_r2_c21" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="168" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="home_r3_c1" src="imagens_site/home_r3_c1.jpg" width="43" height="29" border="0" id="home_r3_c1" alt="" /></td>
   <td colspan="3"><img name="home_r3_c4" src="imagens_site/home_r3_c4.jpg" width="124" height="29" border="0" id="home_r3_c4" alt="" /></td>
   <td colspan="2"><img name="home_r3_c7" src="imagens_site/home_r3_c7.jpg" width="51" height="29" border="0" id="home_r3_c7" alt="" /></td>
   <td colspan="3"><img name="home_r3_c9" src="imagens_site/home_r3_c9.jpg" width="170" height="29" border="0" id="home_r3_c9" alt="" /></td>
   <td><img name="home_r3_c12" src="imagens_site/home_r3_c12.jpg" width="28" height="29" border="0" id="home_r3_c12" alt="" /></td>
   <td colspan="2"><img name="home_r3_c13" src="imagens_site/home_r3_c13.jpg" width="170" height="29" border="0" id="home_r3_c13" alt="" /></td>
   <td colspan="2"><img name="home_r3_c15" src="imagens_site/home_r3_c15.jpg" width="27" height="29" border="0" id="home_r3_c15" alt="" /></td>
   <td colspan="2"><img name="home_r3_c17" src="imagens_site/home_r3_c17.jpg" width="170" height="29" border="0" id="home_r3_c17" alt="" /></td>
   <td><img name="home_r3_c19" src="imagens_site/home_r3_c19.jpg" width="51" height="29" border="0" id="home_r3_c19" alt="" /></td>
   <td colspan="2"><img name="home_r3_c20" src="imagens_site/home_r3_c20.jpg" width="124" height="29" border="0" id="home_r3_c20" alt="" /></td>
   <td colspan="2"><img name="home_r3_c22" src="imagens_site/home_r3_c22.jpg" width="42" height="29" border="0" id="home_r3_c22" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="29" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="home_r4_c1" src="imagens_site/home_r4_c1.jpg" width="43" height="41" border="0" id="home_r4_c1" alt="" /></td>
   <td colspan="3"><a href="home.php" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','home_r4_c4','imagens_site/home_r4_c4_f2.jpg','imagens_site/home_r4_c4_f4.jpg',1)" onclick="MM_nbGroup('down','navbar1','home_r4_c4','imagens_site/home_r4_c4_f3.jpg',1)"><img name="home_r4_c4" src="imagens_site/home_r4_c4.jpg" width="124" height="41" border="0" id="home_r4_c4" alt="" /></a></td>
   <td colspan="2"><img name="home_r4_c7" src="imagens_site/home_r4_c7.jpg" width="51" height="41" border="0" id="home_r4_c7" alt="" /></td>
   <td colspan="3"><a href="home.php?tabela=produto&acao=listar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','home_r4_c9','imagens_site/home_r4_c9_f2.jpg','imagens_site/home_r4_c9_f4.jpg',1)" onclick="MM_nbGroup('down','navbar1','home_r4_c9','imagens_site/home_r4_c9_f3.jpg',1)"><img name="home_r4_c9" src="imagens_site/home_r4_c9.jpg" width="170" height="41" border="0" id="home_r4_c9" alt="" /></a></td>
   <td><img name="home_r4_c12" src="imagens_site/home_r4_c12.jpg" width="28" height="41" border="0" id="home_r4_c12" alt="" /></td>
   <td colspan="2"><a href="home.php?tabela=cliente&acao=listar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','home_r4_c13','imagens_site/home_r4_c13_f2.jpg','imagens_site/home_r4_c13_f4.jpg',1)" onclick="MM_nbGroup('down','navbar1','home_r4_c13','imagens_site/home_r4_c13_f3.jpg',1)"><img name="home_r4_c13" src="imagens_site/home_r4_c13.jpg" width="170" height="41" border="0" id="home_r4_c13" alt="" /></a></td>
   <td colspan="2"><img name="home_r4_c15" src="imagens_site/home_r4_c15.jpg" width="27" height="41" border="0" id="home_r4_c15" alt="" /></td>
   <td colspan="2"><a href="home.php?tabela=venda&acao=listar_produtos" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','home_r4_c17','imagens_site/home_r4_c17_f2.jpg','imagens_site/home_r4_c17_f4.jpg',1)" onclick="MM_nbGroup('down','navbar1','home_r4_c17','imagens_site/home_r4_c17_f3.jpg',1)"><img name="home_r4_c17" src="imagens_site/home_r4_c17.jpg" width="170" height="41" border="0" id="home_r4_c17" alt="" /></a></td>
   <td><img name="home_r4_c19" src="imagens_site/home_r4_c19.jpg" width="51" height="41" border="0" id="home_r4_c19" alt="" /></td>
   <td rowspan="2" colspan="2"><a href="logoff.php" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','home_r4_c20','imagens_site/home_r4_c20_f2.jpg','imagens_site/home_r4_c20_f4.jpg',1)" onclick="MM_nbGroup('down','navbar1','home_r4_c20','imagens_site/home_r4_c20_f3.jpg',1)"><img name="home_r4_c20" src="imagens_site/home_r4_c20.jpg" width="124" height="42" border="0" id="home_r4_c20" alt="" /></a></td>
   <td rowspan="2" colspan="2"><img name="home_r4_c22" src="imagens_site/home_r4_c22.jpg" width="42" height="42" border="0" id="home_r4_c22" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="41" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="19"><img name="home_r5_c1" src="imagens_site/home_r5_c1.jpg" width="834" height="1" border="0" id="home_r5_c1" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="23"><img name="home_r6_c1" src="imagens_site/home_r6_c1.jpg" width="1000" height="17" border="0" id="home_r6_c1" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="home_r7_c1" src="imagens_site/home_r7_c1.jpg" width="22" height="47" border="0" id="home_r7_c1" alt="" /></td>
   <td colspan="7"><img name="home_r7_c2" src="imagens_site/home_r7_c2<?php echo $tabela?>.jpg" width="196" height="47" border="0" id="home_r7_c2" alt="" /></td>
   <td colspan="3"><img name="home_r7_c9" src="imagens_site/home_r7_c9.jpg" width="170" height="47" border="0" id="home_r7_c9" alt="" /></td>
   <td><img name="home_r7_c12" src="imagens_site/home_r7_c12.jpg" width="28" height="47" border="0" id="home_r7_c12" alt="" /></td>
   <td colspan="2"><img name="home_r7_c13" src="imagens_site/home_r7_c13.jpg" width="170" height="47" border="0" id="home_r7_c13" alt="" /></td>
   <td colspan="2"><img name="home_r7_c15" src="imagens_site/home_r7_c15.jpg" width="27" height="47" border="0" id="home_r7_c15" alt="" /></td>
   <td colspan="2"><img name="home_r7_c17" src="imagens_site/home_r7_c17.jpg" width="170" height="47" border="0" id="home_r7_c17" alt="" /></td>
   <td><img name="home_r7_c19" src="imagens_site/home_r7_c19.jpg" width="51" height="47" border="0" id="home_r7_c19" alt="" /></td>
   <td colspan="2"><img name="home_r7_c20" src="imagens_site/home_r7_c20.jpg" width="124" height="47" border="0" id="home_r7_c20" alt="" /></td>
   <td colspan="2"><img name="home_r7_c22" src="imagens_site/home_r7_c22.jpg" width="42" height="47" border="0" id="home_r7_c22" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="47" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="23" align="left" valign="top" background="imagens_site/home_r8_c1.jpg">
  <?php
                 $acao   = $_REQUEST['acao'];		   
                 //echo "tabela = $tabela e acao = $acao";
                 require("util/conecta.php");
								 
                if($tabela == "produto")
                   require('produto_acao.php'); 
                 else if($tabela == "cliente")
                   require('cliente_acao.php'); 
				 else if($tabela == "venda")
                   require('carrinho_acao.php');
				else
                   require('principal.php');			 
          ?>
  
   </td>
   <td><img src="imagens_site/spacer.gif" width="1" height="562" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="home_r9_c1" src="imagens_site/home_r9_c1.jpg" width="31" height="84" border="0" id="home_r9_c1" alt="" /></td>
   <td colspan="3"><img name="home_r9_c3" src="imagens_site/home_r9_c3.jpg" width="74" height="84" border="0" id="home_r9_c3" alt="" /></td>
   <td colspan="2"><img name="home_r9_c6" src="imagens_site/home_r9_c6.jpg" width="88" height="84" border="0" id="home_r9_c6" alt="" /></td>
   <td colspan="2"><img name="home_r9_c8" src="imagens_site/home_r9_c8.jpg" width="108" height="84" border="0" id="home_r9_c8" alt="" /></td>
   <td colspan="2"><img name="home_r9_c10" src="imagens_site/home_r9_c10.jpg" width="87" height="84" border="0" id="home_r9_c10" alt="" /></td>
   <td colspan="2"><img name="home_r9_c12" src="imagens_site/home_r9_c12.jpg" width="111" height="84" border="0" id="home_r9_c12" alt="" /></td>
   <td colspan="2"><img name="home_r9_c14" src="imagens_site/home_r9_c14.jpg" width="98" height="84" border="0" id="home_r9_c14" alt="" /></td>
   <td colspan="2"><img name="home_r9_c16" src="imagens_site/home_r9_c16.jpg" width="178" height="84" border="0" id="home_r9_c16" alt="" /></td>
   <td colspan="3"><img name="home_r9_c18" src="imagens_site/home_r9_c18.jpg" width="91" height="84" border="0" id="home_r9_c18" alt="" /></td>
   <td colspan="2"><img name="home_r9_c21" src="imagens_site/home_r9_c21.jpg" width="105" height="84" border="0" id="home_r9_c21" alt="" /></td>
   <td><img name="home_r9_c23" src="imagens_site/home_r9_c23.jpg" width="29" height="84" border="0" id="home_r9_c23" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="84" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="23"><img name="home_r10_c1" src="imagens_site/home_r10_c1.jpg" width="1000" height="31" border="0" id="home_r10_c1" alt="" /></td>
   <td><img src="imagens_site/spacer.gif" width="1" height="31" border="0" alt="" /></td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
<?php } ?>
