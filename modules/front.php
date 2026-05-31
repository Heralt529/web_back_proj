<?php

// Обработчик запросов методом GET.
function front_get($request) {
  // Проверяем, есть ли cookies с данными формы
  $form_data = array();
  $errors = array();
  $message = '';
  
  // Восстанавливаем данные из cookies если есть
  if (isset($_COOKIE['form_data'])) {
    $form_data = json_decode($_COOKIE['form_data'], true);
    setcookie('form_data', '', time() - 3600);
  }
  
  if (isset($_COOKIE['form_errors'])) {
    $errors = json_decode($_COOKIE['form_errors'], true);
    setcookie('form_errors', '', time() - 3600);
  }
  
  if (isset($_COOKIE['form_message'])) {
    $message = $_COOKIE['form_message'];
    setcookie('form_message', '', time() - 3600);
  }
  
  if (isset($_COOKIE['login'])) {
    $message .= ' Сохранено. Логин: ' . $_COOKIE['login'] . ', Пароль: ' . $_COOKIE['pass'];
    setcookie('login', '', time() - 3600);
    setcookie('pass', '', time() - 3600);
  }
  
  // Просто возвращаем HTML форму
  ob_start();
  ?>
  <!DOCTYPE html>
  <html lang="ru">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Регистрационная форма</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <style>
          * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
          }
          body {
              font-family: 'Montserrat', sans-serif;
              background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
              min-height: 100vh;
              padding: 40px 20px;
          }
          .container {
              max-width: 800px;
              margin: 0 auto;
          }
          .form-container {
              background: white;
              border-radius: 10px;
              padding: 40px;
              box-shadow: 0 10px 40px rgba(0,0,0,0.2);
          }
          h1 {
              text-align: center;
              color: #333;
              margin-bottom: 30px;
          }
          .form-group {
              margin-bottom: 20px;
          }
          label {
              display: block;
              margin-bottom: 5px;
              font-weight: 500;
              color: #555;
          }
          .form-control {
              width: 100%;
              padding: 10px;
              border: 1px solid #ddd;
              border-radius: 5px;
              font-size: 16px;
          }
          .form-control.error {
              border-color: red;
          }
          .error-text {
              color: red;
              font-size: 12px;
              margin-top: 5px;
          }
          .success-text {
              color: green;
              font-size: 12px;
              margin-top: 5px;
          }
          fieldset {
              border: 1px solid #ddd;
              padding: 15px;
              margin-bottom: 20px;
              border-radius: 5px;
          }
          legend {
              padding: 0 10px;
              font-weight: 500;
          }
          .checkbox-group {
              margin-bottom: 10px;
          }
          .checkbox-group input {
              margin-right: 10px;
          }
          .btn {
              background: #667eea;
              color: white;
              padding: 12px 30px;
              border: none;
              border-radius: 5px;
              font-size: 16px;
              cursor: pointer;
              width: 100%;
          }
          .btn:hover {
              background: #5a67d8;
          }
          .message {
              padding: 10px;
              margin-bottom: 20px;
              border-radius: 5px;
          }
          .message.success {
              background: #d4edda;
              color: #155724;
              border: 1px solid #c3e6cb;
          }
          .message.error {
              background: #f8d7da;
              color: #721c24;
              border: 1px solid #f5c6cb;
          }
          @media (max-width: 768px) {
              .form-container {
                  padding: 20px;
              }
          }
      </style>
  </head>
  <body>
      <div class="container">
          <div class="form-container">
              <h1>Регистрационная форма</h1>
              
              <?php if ($message): ?>
                  <div class="message success"><?php echo htmlspecialchars($message); ?></div>
              <?php endif; ?>
              
              <form action="" method="POST" id="mainForm">
                  <div class="form-group">
                      <label>ФИО *</label>
                      <input type="text" name="name" class="form-control <?php echo isset($errors['name']) ? 'error' : ''; ?>" 
                             value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>">
                      <?php if (isset($errors['name'])): ?>
                          <div class="error-text"><?php echo $errors['name']; ?></div>
                      <?php endif; ?>
                  </div>
                  
                  <div class="form-group">
                      <label>Телефон</label>
                      <input type="tel" name="phone" class="form-control <?php echo isset($errors['phone']) ? 'error' : ''; ?>" 
                             value="<?php echo htmlspecialchars($form_data['phone'] ?? ''); ?>">
                      <?php if (isset($errors['phone'])): ?>
                          <div class="error-text"><?php echo $errors['phone']; ?></div>
                      <?php endif; ?>
                  </div>
                  
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'error' : ''; ?>" 
                             value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>">
                      <?php if (isset($errors['email'])): ?>
                          <div class="error-text"><?php echo $errors['email']; ?></div>
                      <?php endif; ?>
                  </div>
                  
                  <div class="form-group">
                      <label>Дата рождения</label>
                      <input type="date" name="birthdate" class="form-control <?php echo isset($errors['birthdate']) ? 'error' : ''; ?>" 
                             value="<?php echo htmlspecialchars($form_data['birthdate'] ?? ''); ?>">
                      <?php if (isset($errors['birthdate'])): ?>
                          <div class="error-text"><?php echo $errors['birthdate']; ?></div>
                      <?php endif; ?>
                  </div>
                  
                  <div class="form-group">
                      <label>Пол *</label>
                      <div>
                          <label><input type="radio" name="sex" value="male" <?php echo (isset($form_data['sex']) && $form_data['sex'] == 'male') ? 'checked' : ''; ?>> Мужской</label>
                          <label><input type="radio" name="sex" value="female" <?php echo (isset($form_data['sex']) && $form_data['sex'] == 'female') ? 'checked' : ''; ?>> Женский</label>
                      </div>
                      <?php if (isset($errors['sex'])): ?>
                          <div class="error-text"><?php echo $errors['sex']; ?></div>
                      <?php endif; ?>
                  </div>
                  
                  <fieldset>
                      <legend>Любимые языки программирования *</legend>
                      <?php
                      $languages = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
                      $selected_langs = isset($form_data['languages']) ? (array)$form_data['languages'] : [];
                      foreach ($languages as $lang):
                      ?>
                          <div class="checkbox-group">
                              <label>
                                  <input type="checkbox" name="languages[]" value="<?php echo $lang; ?>" 
                                         <?php echo in_array($lang, $selected_langs) ? 'checked' : ''; ?>>
                                  <?php echo $lang; ?>
                              </label>
                          </div>
                      <?php endforeach; ?>
                      <?php if (isset($errors['languages'])): ?>
                          <div class="error-text"><?php echo $errors['languages']; ?></div>
                      <?php endif; ?>
                  </fieldset>
                  
                  <div class="form-group">
                      <label>Биография</label>
                      <textarea name="biography" class="form-control" rows="4"><?php echo htmlspecialchars($form_data['biography'] ?? ''); ?></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label>
                          <input type="checkbox" name="contract" value="1" <?php echo (isset($form_data['contract']) && $form_data['contract'] == '1') ? 'checked' : ''; ?>>
                          Я ознакомлен с условиями *
                      </label>
                      <?php if (isset($errors['contract'])): ?>
                          <div class="error-text"><?php echo $errors['contract']; ?></div>
                      <?php endif; ?>
                  </div>
                  
                  <button type="submit" class="btn">Отправить</button>
              </form>
          </div>
      </div>
  </body>
  </html>
  <?php
  return ob_get_clean();
}

// Обработчик запросов методом POST.
function front_post($request) {
  // Здесь будет обработка формы при выключенном JS
  return redirect('');
}
