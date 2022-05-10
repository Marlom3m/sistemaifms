<?php
/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__).'/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/sistema/');

/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'controle/database.php');

define('HEADER_TEMPLATE', ABSPATH . 'controle/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'controle/footer.php');

/** caminho para encurtar a parte de eventos**/
?>
