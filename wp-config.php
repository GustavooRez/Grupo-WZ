<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'grupowz' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'grupowz_add2' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'byronWz1906' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql.grupowz.com.br' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_L1]7n^nozM0yFU-(+$Hd?j3_+vjOr&|qz=N2iT{8jjjH9cPM Vqe@i:M9uDZ;Jo' );
define( 'SECURE_AUTH_KEY',  '/4GV1xfi&L`k{<}<h,~zX3`<X~5#+1T.ZCLvz[n0,.DM(6F1m&tL]|gWCoqP$))/' );
define( 'LOGGED_IN_KEY',    '&m^4]IX;x&S1_vb~+9:Y($ZSZt]u-]-j&[z?6f>v?SFKaR%ELk3VOz~Y3{N*t%|[' );
define( 'NONCE_KEY',        'L1qUka^i]X>_XX|T`5mKOL,;1slx|7 NPXPkFG)yz`y!y{OHrq^3NDsmnTun p&P' );
define( 'AUTH_SALT',        'O3z&?O)2XkM]>[E8BVF]xPv,RL-&5K%qvm;fgx8gT?Gzy,~@!9[H`(53()S`|9L+' );
define( 'SECURE_AUTH_SALT', '@^z3LMs-{|Zis^HY)Q74%mwB M07DKC `NDd*5(k~-IaQnApwwjoCkbh;[/=,TrU' );
define( 'LOGGED_IN_SALT',   'nRVHxM&V{XIy1.6P!eJzttE_rKn13P`+sYZUzUXBly:iIK-t0Utq_1Cm8$+_+: *' );
define( 'NONCE_SALT',       '~UFi0nhA#{}4gg)@C<s;8C[~1Oe>/.v&0P5;LzTr~WJ,4&b;+OndeSV,WbY(n<3{' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
