<?php

// Обработчик запросов методом GET.
function front_get($request) {
  // Возвращаем HTML-форму
  ob_start();
  ?>
  <!DOCTYPE html>
  <html lang="ru">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Новогодние мероприятия - Форма регистрации</title>
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
              line-height: 1.6;
              color: #333;
              background-color: #ffce85;
              padding: 40px 20px;
          }
          
          .container {
              width: 100%;
              max-width: 800px;
              margin: 0 auto;
              padding: 0 15px;
          }
          
          .form-container {
              background-color: #fff;
              border-radius: 8px;
              padding: 40px;
              box-shadow: 0 5px 15px rgba(0,0,0,0.1);
          }
          
          h1 {
              text-align: center;
              color: crimson;
              margin-bottom: 30px;
          }
          
          .form-group {
              margin-bottom: 20px;
          }
          
          .form-group label {
              display: block;
              margin-bottom: 8px;
              font-weight: 500;
          }
          
          .form-control {
              width: 100%;
              padding: 12px 15px;
              border: 1px solid #ddd;
              border-radius: 4px;
              font-family: 'Montserrat', sans-serif;
              font-size: 16px;
          }
          
          .form-control:focus {
              outline: none;
              border-color: #ff9900;
          }
          
          .error-text {
              color: red;
              font-size: 14px;
              margin-top: 5px;
          }
          
          .success-text {
              color: green;
              font-size: 14px;
              margin-top: 5px;
          }
          
          .btn {
              display: inline-block;
              background-color: crimson;
              color: #fff;
              padding: 14px 30px;
              border-radius: 30px;
              text-decoration: none;
              font-weight: 600;
              transition: background-color 0.3s;
              border: none;
              cursor: pointer;
              font-size: 16px;
              width: 100%;
          }
          
          .btn:hover {
              background-color: #e68a00;
          }
          
          .radio-group {
              display: flex;
              gap: 20px;
              margin-top: 10px;
          }
          
          .radio-group label {
              display: flex;
              align-items: center;
              gap: 5px;
          }
          
          .radio-group input {
              width: auto;
          }
          
          .checkbox-group {
              margin-top: 10px;
          }
          
          .checkbox-group label {
              display: flex;
              align-items: center;
              gap: 10px;
          }
          
          .checkbox-group input {
              width: auto;
          }
          
          fieldset {
              border: 1px solid #ddd;
              padding: 15px;
              border-radius: 4px;
              margin-bottom: 20px;
          }
          
          legend {
              padding: 0 10px;
              font-weight: 500;
          }
          
          .message {
              padding: 15px;
              border-radius: 4px;
              margin-bottom: 20px;
              text-align: center;
          }
          
          .message.success {
              background-color: #d4edda;
              color: #155724;
          }
          
          .message.error {
              background-color: #f8d7da;
              color: #721c24;
          }
          
          .message.info {
              background-color: #d1ecf1;
              color: #0c5460;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <div class="form-container">
              <h1>Регистрация на новогодние мероприятия</h1>
              
              <?php
              // Выводим сообщения из cookies если есть
              if (!empty($_COOKIE['save'])) {
                  echo '<div class="message success">Результаты сохранены.</div>';
                  if (!empty($_COOKIE['login']) && !empty($_COOKIE['pass'])) {
                      echo '<div class="message info">Можно войти с логином <strong>' . htmlspecialchars($_COOKIE['login']) . '</strong> и паролем <strong>' . htmlspecialchars($_COOKIE['pass']) . '</strong></div>';
                  }
                  setcookie('save', '', time() - 3600);
                  setcookie('login', '', time() - 3600);
                  setcookie('pass', '', time() - 3600);
              }
              
              // Выводим ошибки
              $error_fields = ['name', 'phone', 'email', 'birthdate', 'sex', 'languages', 'contract'];
              foreach ($error_fields as $field) {
                  if (!empty($_COOKIE[$field . '_error'])) {
                      echo '<div class="message error">' . getErrorMessage($field) . '</div>';
                      setcookie($field . '_error', '', time() - 3600);
                  }
              }
              
              // Восстанавливаем значения
              $values = [
                  'name' => $_COOKIE['name_value'] ?? '',
                  'phone' => $_COOKIE['phone_value'] ?? '',
                  'email' => $_COOKIE['email_value'] ?? '',
                  'birthdate' => $_COOKIE['birthdate_value'] ?? '',
                  'sex' => $_COOKIE['sex_value'] ?? '',
                  'languages' => isset($_COOKIE['languages_value']) ? explode('|', $_COOKIE['languages_value']) : [],
                  'contract' => $_COOKIE['contract_value'] ?? '',
                  'biography' => $_COOKIE['biography_value'] ?? ''
              ];
              ?>
              
              <form action="" method="POST" id="mainForm">
                  <div class="form-group">
                      <label for="name">ФИО *</label>
                      <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($values['name']); ?>" required>
                  </div>
                  
                  <div class="form-group">
                      <label for="phone">Телефон</label>
                      <input type="tel" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($values['phone']); ?>">
                  </div>
                  
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($values['email']); ?>">
                  </div>
                  
                  <div class="form-group">
                      <label for="birthdate">Дата рождения</label>
                      <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?php echo htmlspecialchars($values['birthdate']); ?>">
                  </div>
                  
                  <div class="form-group">
                      <label>Пол *</label>
                      <div class="radio-group">
                          <label>
                              <input type="radio" name="sex" value="male" <?php echo $values['sex'] == 'male' ? 'checked' : ''; ?>> Мужской
                          </label>
                          <label>
                              <input type="radio" name="sex" value="female" <?php echo $values['sex'] == 'female' ? 'checked' : ''; ?>> Женский
                          </label>
                      </div>
                  </div>
                  
                  <fieldset>
                      <legend>Любимые языки программирования *</legend>
                      <?php
                      $all_languages = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
                      foreach ($all_languages as $lang) {
                          $checked = in_array($lang, $values['languages']) ? 'checked' : '';
                          echo '<div class="checkbox-group">';
                          echo '<label>';
                          echo '<input type="checkbox" name="languages[]" value="' . htmlspecialchars($lang) . '" ' . $checked . '> ' . htmlspecialchars($lang);
                          echo '</label>';
                          echo '</div>';
                      }
                      ?>
                  </fieldset>
                  
                  <div class="form-group">
                      <label for="biography">Биография</label>
                      <textarea id="biography" name="biography" class="form-control" rows="5"><?php echo htmlspecialchars($values['biography']); ?></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label>
                          <input type="checkbox" name="contract" value="1" <?php echo $values['contract'] == '1' ? 'checked' : ''; ?>> Ознакомлен с условиями *
                      </label>
                  </div>
                  
                  <button type="submit" class="btn">Отправить</button>
              </form>
          </div>
      </div>
      
      <script>
          // Убираем сообщения через 5 секунд
          setTimeout(function() {
              const messages = document.querySelectorAll('.message');
              messages.forEach(msg => {
                  msg.style.display = 'none';
              });
          }, 5000);
      </script>
  </body>
  </html>
  <?php
  return ob_get_clean();
}

// Обработчик запросов методом POST (фоллбек без JS)
function front_post($request) {
  // Здесь будет логика сохранения данных
  // Пока просто редирект обратно
  return redirect('');
}

function getErrorMessage($field) {
  $messages = [
      'name' => 'Введите корректное имя.',
      'phone' => 'Введите корректный номер телефона.',
      'email' => 'Введите корректный email.',
      'birthdate' => 'Введите корректную дату рождения.',
      'sex' => 'Выберите пол.',
      'languages' => 'Выберите хотя бы один язык программирования.',
      'contract' => 'Подтвердите ознакомление с условиями.'
  ];
  return $messages[$field] ?? 'Неизвестная ошибка.';
}
