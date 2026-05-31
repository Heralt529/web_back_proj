<?php

// Выключаем отображение ошибок после отладки.
define('DISPLAY_ERRORS', 1);

// Папки со скриптами и модулями.
define('INCLUDE_PATH', './scripts' . PATH_SEPARATOR . './modules');

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
);

// Определения ресурсов для диспатчера.
$urlconf = array(
  '' => array('module' => 'front'),
);

// Отрубаем кеш.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
// Выдаем кодировку.
header('Content-Type: text/html; charset=' . $conf['charset']);
