<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'bastien');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5j8$jz[QSH A{z<p|Ig}MQ;@]X)o)9LJc5ebcT)%<5AcMG;aVKTC@])t-VQ9/P[_');
define('SECURE_AUTH_KEY',  'ru*UrUR3tH&ENx,!#5,`/2R-{yJt$ Z1{u<4Isp9ISS=Vj/_v,B{HHB:y9#+Tx-H');
define('LOGGED_IN_KEY',    '8,!6sg8hbW=*c-RZ_dStO>uc+~]uHPYx`.3PvsQLF/<xW_Sc9fGNlt0w-0Y*aNQD');
define('NONCE_KEY',        'gNgKx~<RkQt#*Vxt`Bd}h/&[5kHQJ;Wkc_)l/0-JB:iEA_e0L+dT+#bF?H)ijd:#');
define('AUTH_SALT',        'oU;,R2N{#nQ<2IdpjM(?L]S1HjJt~oGEY_n4CAHqXSZ!U)l0e|Rv0 3XCEfn}CP]');
define('SECURE_AUTH_SALT', 'Or[w=@MKl**mj8V/[/6%ze|^@sT2i`I3q>_}VPvw9.m*qo}1)%>Ji:z9a3~2+:hJ');
define('LOGGED_IN_SALT',   'lh/(V9NB7o-xS43/rz7>;sP]V_dPSl9 GY1e#2`tj^CjDPru)@d#Iem~Hno.g?F?');
define('NONCE_SALT',       'T7W=)~P#fU*V8-SB~>X$E^&G*T5XhqVe69z;!G5Ing`NQv%1[t=<<w_u ed%I=AO');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'xdfs_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* fixer le nombre de révisions */
define('WP_POST_REVISIONS',5);


/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');