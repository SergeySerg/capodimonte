<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'raduke_newcapodimonteua');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ' :WUE*d$6&}}JeMILiqTUZ872_6F$3srZbrol$H.njNN0v/B&#RQEVa6wMKM!0-/');
define('SECURE_AUTH_KEY',  'P7VI[ 3k?7I]h&^*_rE-/k%jz}=2F*XLZXD80+|7OC!FzsJ?^#EyB G)V6rBjHeO');
define('LOGGED_IN_KEY',    '|~XI2-|$d258cI;V;KDB`O,B,20leFyXF$@T^hwR$6W/6g_Gsh %u(J8,BSkyFxS');
define('NONCE_KEY',        'q_HX#X#fMgyD**Rb$zrLC.*t<Rl?)=uzWyS~;|~0gPZ>v:+e+zS[X.aW[@!jK&S)');
define('AUTH_SALT',        '~A0X9^&T`Q*btE>R.^D Njd8;O)xk--@H=)k`x6He#2mb>9_wP|;(1r10~_no.q$');
define('SECURE_AUTH_SALT', 'tI|%70KqFs!jN|d(THMW]3Z9{:r.RQ`.(h>xFU@mH/y#iJu4#aFlRzjB(-.lolJn');
define('LOGGED_IN_SALT',   'QJJ$V~u7<!hyC?v| oQ{]]{ui@5j3][sed$MRN8BMsd`U9Ro<tPIo<S;:6`V,R9}');
define('NONCE_SALT',       'IKzBbZ`@Wu5]ruY{.3GiBA?50P+HF%:-Ssm[n3oACsv?)^}a|)K).:!,U+DObXxV');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
