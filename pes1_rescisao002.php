<?
/*
 *     E-cidade Software Publico para Gestao Municipal                
 *  Copyright (C) 2009  DBselller Servicos de Informatica             
 *                            www.dbseller.com.br                     
 *                         e-cidade@dbseller.com.br                   
 *                                                                    
 *  Este programa e software livre; voce pode redistribui-lo e/ou     
 *  modifica-lo sob os termos da Licenca Publica Geral GNU, conforme  
 *  publicada pela Free Software Foundation; tanto a versao 2 da      
 *  Licenca como (a seu criterio) qualquer versao mais nova.          
 *                                                                    
 *  Este programa e distribuido na expectativa de ser util, mas SEM   
 *  QUALQUER GARANTIA; sem mesmo a garantia implicita de              
 *  COMERCIALIZACAO ou de ADEQUACAO A QUALQUER PROPOSITO EM           
 *  PARTICULAR. Consulte a Licenca Publica Geral GNU para obter mais  
 *  detalhes.                                                         
 *                                                                    
 *  Voce deve ter recebido uma copia da Licenca Publica Geral GNU     
 *  junto com este programa; se nao, escreva para a Free Software     
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA          
 *  02111-1307, USA.                                                  
 *  
 *  Copia da licenca no diretorio licenca/licenca_en.txt 
 *                                licenca/licenca_pt.txt 
 */

require("libs/db_stdlib.php");
require("libs/db_conecta.php");
include("libs/db_sessoes.php");
include("libs/db_usuariosonline.php");
include("classes/db_rescisao_classe.php");
include("classes/db_rhcadregime_classe.php");
include("classes/db_codmovsefip_classe.php");
include("dbforms/db_funcoes.php");
parse_str($HTTP_SERVER_VARS["QUERY_STRING"]);
db_postmemory($HTTP_POST_VARS);
$clrescisao = new cl_rescisao;
$clrhcadregime = new cl_rhcadregime;
$clcodmovsefip = new cl_codmovsefip;
$db_opcao = 22;
$db_botao = false;
if(isset($alterar)){
  db_inicio_transacao();
  $db_opcao = 2;
  if(trim($r59_tercof) == "" || $r59_tercof == 0){
    $clrescisao->r59_tercof = "0";
  }
  if(trim($r59_codsaq) == ""){
    $clrescisao->r59_codsaq = "";
  }
  if(trim($r59_mfgts) == "" || $r59_mfgts == 0){
    $clrescisao->r59_mfgts = "0";
  }
  $clrescisao->r59_anousu = $r59_anousu;
  $clrescisao->r59_mesusu = $r59_mesusu;
  $clrescisao->r59_regime = $r59_regime;
  $clrescisao->r59_causa  = $r59_causa;
  $clrescisao->r59_caub   = $r59_caub;
  $clrescisao->r59_menos1 = $r59_menos1;
  $clrescisao->r59_descr  = $r59_descr; 
  $clrescisao->r59_descr1 = $r59_descr1;
  $clrescisao->r59_aviso  = $r59_aviso;
  $clrescisao->r59_13sal  = $r59_13sal;
  $clrescisao->r59_fvenc  = $r59_fvenc;
  $clrescisao->r59_fprop  = $r59_fprop;
  $clrescisao->r59_tercof = $r59_tercof;
  $clrescisao->r59_codsaq = $r59_codsaq;
  $clrescisao->r59_mfgts  = $r59_mfgts;
  $clrescisao->r59_479clt = $r59_479clt;
  $clrescisao->r59_grfp   = $r59_grfp;
  $clrescisao->r59_finss  = $r59_finss;
  $clrescisao->r59_ffgts  = $r59_ffgts;
  $clrescisao->r59_firrf  = $r59_firrf;
  $clrescisao->r59_13inss = $r59_13inss;
  $clrescisao->r59_13fgts = $r59_13fgts;
  $clrescisao->r59_13irrf = $r59_13irrf;
  $clrescisao->r59_rinss  = $r59_rinss;
  $clrescisao->r59_rfgts  = $r59_rfgts;
  $clrescisao->r59_rirrf  = $r59_rirrf;
  $clrescisao->r59_movsef = $r59_movsef;
  $clrescisao->r59_instit = db_getsession("DB_instit");

  $clrescisao->alterar($r59_anousu,$r59_mesusu,$r59_regime,$r59_causa,$r59_caub,$r59_menos1,db_getsession("DB_instit"));
  db_fim_transacao();
}else if(isset($chavepesquisa)){
   $db_opcao = 2;
   $result = $clrescisao->sql_record($clrescisao->sql_query($chavepesquisa,$chavepesquisa1,$chavepesquisa2,$chavepesquisa3,$chavepesquisa4,$chavepesquisa5,db_getsession("DB_instit"))); 
   db_fieldsmemory($result,0);
   $db_botao = true;
}
// exit;
?>
<html>
<head>
<title>DBSeller Inform&aacute;tica Ltda - P&aacute;gina Inicial</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Expires" CONTENT="0">
<script language="JavaScript" type="text/javascript" src="scripts/scripts.js"></script>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor=#CCCCCC leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="a=1" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#5786B2">
  <tr> 
    <td width="25%" height="18">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="430" align="left" valign="top" bgcolor="#CCCCCC"> 
    <center>
	<?
	include("forms/db_frmrescisao.php");
	?>
    </center>
	</td>
  </tr>
</table>
<?
db_menu(db_getsession("DB_id_usuario"),db_getsession("DB_modulo"),db_getsession("DB_anousu"),db_getsession("DB_instit"));
?>
</body>
</html>
<?
if(isset($alterar)){
  if($clrescisao->erro_status=="0"){
    $clrescisao->erro(true,false);
    $db_botao=true;
    echo "<script> document.form1.db_opcao.disabled=false;</script>  ";
    if($clrescisao->erro_campo!=""){
      echo "<script> document.form1.".$clrescisao->erro_campo.".style.backgroundColor='#99A9AE';</script>";
      echo "<script> document.form1.".$clrescisao->erro_campo.".focus();</script>";
    }
  }else{
    $clrescisao->erro(true,true);
  }
}
if($db_opcao==22){
  echo "<script>document.form1.pesquisar.click();</script>";
}
?>
<script>
js_tabulacaoforms("form1","r59_mesusu",true,1,"r59_mesusu",true);
</script>