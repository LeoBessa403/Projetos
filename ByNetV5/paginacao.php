<?php require_once('../Connections/conex_bynet.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
///////////////////////// consulta listar //////////////////
$pagina = $_SERVER["PHP_SELF"];
$maximo_linhas_listar = 10;
$numero_pagina_listar = 0;
if (isset($_GET['numero_pagina_listar'])) {
  $numero_pagina_listar = $_GET['numero_pagina_listar'];
}
$inicio_linha_listar = $numero_pagina_listar * $maximo_linhas_listar;

mysql_select_db($database_conex_bynet, $conex_bynet);
$query_listar = "SELECT * FROM produto";
$query_limit_listar = sprintf("%s LIMIT %d, %d", $query_listar, $inicio_linha_listar, $maximo_linhas_listar);
$listar = mysql_query($query_limit_listar, $conex_bynet) or die(mysql_error());
$linhas_listar = mysql_fetch_assoc($listar);

if (isset($_GET['total_linhas_listar'])) {
  $total_linhas_listar = $_GET['total_linhas_listar'];
} else {
  $todas_linhas = mysql_query($query_listar);
  $total_linhas_listar = mysql_num_linhass($todas_linhas);
}
$total_paginas_listar = ceil($total_linhas_listar/$maximo_linhas_listar)-1;

$queryString_listar = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "numero_pagina_listar") == false && 
        stristr($param, "total_linhas_listar") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listar = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listar = sprintf("&total_linhas_listar=%d%s", $total_linhas_listar, $queryString_listar);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td>pro_id</td>
    <td>pro_descricao</td>
    <td>pro_preco_venda</td>
    <td>pro_unidade_venda</td>
    <td>pro_estoque</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $linhas_listar['pro_id']; ?></td>
      <td><?php echo $linhas_listar['pro_descricao']; ?></td>
      <td><?php echo $linhas_listar['pro_preco_venda']; ?></td>
      <td><?php echo $linhas_listar['pro_unidade_venda']; ?></td>
      <td><?php echo $linhas_listar['pro_estoque']; ?></td>
    </tr>
    <?php } while ($linhas_listar = mysql_fetch_assoc($listar)); ?>
</table>
<p>&nbsp;
<table border="0">
  <tr>
    <td><?php if ($numero_pagina_listar > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?numero_pagina_listar=%d%s", $pagina, 0, $queryString_listar); ?>">Primeiro</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($numero_pagina_listar > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?numero_pagina_listar=%d%s", $pagina, max(0, $numero_pagina_listar - 1), $queryString_listar); ?>">Anterior</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($numero_pagina_listar < $total_paginas_listar) { // Show if not last page ?>
        <a href="<?php printf("%s?numero_pagina_listar=%d%s", $pagina, min($total_paginas_listar, $numero_pagina_listar + 1), $queryString_listar); ?>">Pr&oacute;ximo</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($numero_pagina_listar < $total_paginas_listar) { // Show if not last page ?>
        <a href="<?php printf("%s?numero_pagina_listar=%d%s", $pagina, $total_paginas_listar, $queryString_listar); ?>">&Uacute;ltimo</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($listar);
?>
