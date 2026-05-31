<?php

// Выключаем отображение ошибок после отладки.
define('DISPLAY_ERRORS', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

// По возможности кладём скрипты и включаемые файлы выше
// публично доступной директории из соображений безопасности.

// Папки со скриптами и модулями.
define('INCLUDE_PATH', './includes' . PATH_SEPARATOR . './modules');

// Храним настройки в массиве чтоб легче было смотреть (print_r),
// хранить (serialize), оверрайдить и не плодить глобалов.
$conf = array(
  'sitename' => 'Demo Framework',
  'theme' => './theme',
  'charset' => 'UTF-8',
  'clean_urls' => TRUE,
  'display_errors' => 1,
  'date_format' => 'Y.m.d',
  'date_format_2' => 'Y.m.d H:i',
  'date_format_3' => 'd.m.Y',
  'basedir' => '/',
  'login' => 'admin',
  'password' => '123',
  'admin_mail' => 'sin@kubsu.ru',
  // Добавляем настройки БД
  'db_host' => 'localhost',
  'db_name' => 'u82197',  // ваша БД
  'db_user' => 'u82197',  // ваш пользователь
  'db_psw' => '6410666',   // ваш пароль
);

// Определения ресурсов для диспатчера.
$urlconf = array(
  '' => array('module' => 'front'),  // главная страница
  '/^api\/form$/' => array('module' => 'api'),  // POST для создания
  '/^api\/form\/(\d+)$/' => array('module' => 'api', 'auth' => 'auth_basic'),  // GET/PUT для редактирования
);

// Отрубаем кеш.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
// Выдаем кодировку.
header('Content-Type: text/html; charset=' . $conf['charset']);
