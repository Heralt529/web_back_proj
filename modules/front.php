<?php

// Обработчик запросов методом GET.
function front_get($request) {
  // Просто возвращаем HTML строку
  return '<!DOCTYPE html>
  <html lang="ru">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Новогодние мероприятия</title>
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
              font-family: "Montserrat", sans-serif;
              background: #ffce85;
              padding: 40px 20px;
          }
          .container {
              max-width: 800px;
              margin: 0 auto;
              background: white;
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
          label {
              display: block;
              margin-bottom: 8px;
              font-weight: 500;
          }
          input, select, textarea {
              width: 100%;
              padding: 12px 15px;
              border: 1px solid #ddd;
              border-radius: 4px;
              font-family: inherit;
              font-size: 16px;
          }
          button {
              background: crimson;
              color: white;
              padding: 14px 30px;
              border: none;
              border-radius: 30px;
              font-size: 16px;
              font-weight: 600;
              cursor: pointer;
              width: 100%;
          }
          button:hover {
              background: #e68a00;
          }
          .radio-group {
              display: flex;
              gap: 20px;
          }
          .radio-group input {
              width: auto;
          }
          .message {
              padding: 15px;
              border-radius: 4px;
              margin-bottom: 20px;
          }
          .message.success {
              background: #d4edda;
              color: #155724;
          }
          .message.error {
              background: #f8d7da;
              color: #721c24;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <h1>Регистрация на новогодние мероприятия</h1>
          <form action="" method="POST">
              <div class="form-group">
                  <label>ФИО *</label>
                  <input type="text" name="name" required>
              </div>
              <div class="form-group">
                  <label>Телефон</label>
                  <input type="tel" name="phone">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email">
              </div>
              <div class="form-group">
                  <label>Дата рождения</label>
                  <input type="date" name="birthdate">
              </div>
              <div class="form-group">
                  <label>Пол *</label>
                  <div class="radio-group">
                      <label><input type="radio" name="sex" value="male"> Мужской</label>
                      <label><input type="radio" name="sex" value="female"> Женский</label>
                  </div>
              </div>
              <div class="form-group">
                  <label>Биография</label>
                  <textarea name="biography" rows="4"></textarea>
              </div>
              <div class="form-group">
                  <label><input type="checkbox" name="contract" value="1"> Ознакомлен с условиями *</label>
              </div>
              <button type="submit">Отправить</button>
          </form>
      </div>
  </body>
  </html>';
}

// Обработчик запросов методом POST.
function front_post($request) {
  // Временно просто показываем полученные данные
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  echo '<a href="/">Назад</a>';
  return '';
}
