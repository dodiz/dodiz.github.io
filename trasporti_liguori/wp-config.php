<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ulteriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'trasporti_liguori' );

/** Nome utente del database MySQL */
define( 'DB_USER', 'root' );

/** Password del database MySQL */
define( 'DB_PASSWORD', '' );

/** Hostname MySQL  */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'oX/YEzo]xPj1K~r`By!8YMyrMQi-FB*.mm_E@k&*%doopw;;]bg&Y&(r0xzjw7oB' );
define( 'SECURE_AUTH_KEY',  'D9[%_e!| d.g}HCr2hpZ&n)#hTD;us[<Iari|H}-.dn.39YDFNe-`vA<bXF{;ak)' );
define( 'LOGGED_IN_KEY',    'Canq%Ml$;,$rKSshT.yfHbUZ!jrh;R}cRej8Ja%Gj3m8Y5lIu^A#tooC>)/IW8b$' );
define( 'NONCE_KEY',        'kw7X%]-1`57n$,@Noh{|R|f]`<)*5Ek(e+=Cw9iSw6pZz (q$7/Kc0|ucX!sm>p%' );
define( 'AUTH_SALT',        'yi=If^k@)e0ZVHh3lSI-Kr^gy:v*-:U%5UB1fYhXcL*puCu7FSjX!}e/sjZ& )mr' );
define( 'SECURE_AUTH_SALT', ')03MwO|xQB#-/H4i}M(}m#(Z=s[`<N+ilpp9y^Awu8imic53.*[xRHc(>qp:)C* ' );
define( 'LOGGED_IN_SALT',   's(RV_YWncMxOR)R.&<=,(rFN?s0EoFpO[OyFxjs-zZ=,V^^ d#:go*9-^IRLR@5x' );
define( 'NONCE_SALT',       'wv*GlANeI<:>kO!8X`O$4Le#8IPYdCOu1bKdV$hwmya!l0~dmODIm-H29Du7Yyw{' );

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
