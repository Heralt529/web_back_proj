<?php

// Обработчик запросов методом GET.
function front_get($request) {
  // Возвращаем HTML-контент вместо массива
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
        ' . file_get_contents('style.css') . '
    </style>
</head>
<body>
    <header class="header">
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source src="video.mp4" type="video/mp4">
                Видео не поддерживается в вашем браузере
            </video>
            <div class="video-overlay"></div>
        </div>

        <nav class="nav">
            <a href="#" class="logo">НОВОГОДНИЕ ПРАЗДНИКИ и МЕРОПРИЯТИЯ</a>
            
            <ul class="nav-links">
                <li><a href="#home">Главная</a></li>
                <li>
                    <a href="#projects">Проекты</a>
                    <div class="dropdown-menu">
                        <a href="#project-5">Утренники</a>
                        <a href="#project-2">Корпоративы</a>
                        <a href="#project-3">Квесты</a>
                        <a href="#project-1">Мастер-классы</a>
                        <a href="#project-4">Балы и концерты</a>
                    </div>
                </li>
                <li><a href="#slider">Архив мероприятий</a></li>
                <li><a href="#form">Контакты</a></li>
            </ul>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
        <div class="mobile-menu" id="mobileMenu">
            <button class="mobile-menu-close" id="mobileMenuClose">
                <i class="fas fa-times"></i>
            </button>
            <ul class="mobile-menu-links">
                <li><a href="#home">Главная</a></li>
                <li><a href="#projects">Проекты</a></li>
                <li><a href="#slider">Архив</a></li>
                <li><a href="#form">Контакты</a></li>
            </ul>
        </div>
        
        <section class="hero" id="home">
            <div class="hero-content">
                <h1 style="color: crimson;">ОРГАНИЗАЦИЯ НОВОГОДНИХ МЕРОПРИЯТИЙ</h1>
                <p style="text-shadow: 1px 1px 2px crimson, 0 0 1em black, 0 0 0.2em black;">Планирование и проведение новогодних праздников любого масштаба с профессиональной командой и современным оборудованием!</p>
            </div>
        </section>
    </header>

    <section class="projects" id="projects">
        <div class="container">
            <h2 class="section-title">Наши проекты</h2>
            <div class="projects-grid">
                <div class="projects-card" id="project-1">
                    <div class="projects-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Мастер-классы</h3>
                    <p>Уроки рукоделия от мастеров своего дела</p>
                </div>

                <div class="projects-card" id="project-2">
                    <div class="projects-icon">
                        <i class="fas fa-beer"></i>
                    </div>
                    <h3>Корпоративы</h3>
                    <p>Интересные конкурсы и необычные форматы помогут отдохнуть от рабочих будней</p>
                </div>

                <div class="projects-card" id="project-3">
                    <div class="projects-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Квесты</h3>
                    <p>Интересные приключения с веселыми головоломками</p>
                </div>

                <div class="projects-card" id="project-4">
                    <div class="projects-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3>Балы и концерты</h3>
                    <p>Классика и новые форматы для культурного обогащения</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="projects-card" id="project-5">
                <div class="projects-icon">
                    <i class="fas fa-child"></i>
                </div>
                <h3>Утренники</h3>
                <p>Веселый праздник для самых маленьких</p>
            </div>
        </div>        
    </section>

    <section class="slider-section" id="slider">
        <div class="container">
            <h2 class="section-title">Архив мероприятий</h2>
            <div class="slider-container">
                <div class="slider-wrapper">
                    <div class="slider" id="jquery-slider">
                        <div class="slide">
                            <div class="slide-content">
                                <img src="image1.png" alt="Концерт">
                                <h3>Концерт в театре "Мастерская" г.Санкт-Петербург</h3>
                                <p>Гости отлично провели время наслаждаясь композициями всемирно известных русских классиков</p>
                                <p>Дата проведения: 30.12.2020</p>
                            </div>
                        </div>
                        
                        <div class="slide">
                            <div class="slide-content">
                                <img src="image2.png" alt="Мастер-класс">
                                <h3>Мастер-класс по изготовлению украшений г.Краснодар</h3>
                                <p>Студенты научились новому и наполнили коридоры вуза новогодним настроением</p>
                                <p>Дата проведения: 15.12.2022</p>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide-content">
                                <img src="image3.png" alt="Утренник">
                                <h3>Утренник в младшей школе Г.Анапа</h3>
                                <p>Дата проведения: 29.12.2022</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="slider-nav">
                    <button class="slider-btn" id="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-btn" id="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <div class="slider-dots" id="sliderDots"></div>
            </div>
        </div>
    </section>  

    <section class="form-section" id="form">
        <div class="container">
            <div class="form-container">
                <h2 class="form-title">Оставить заявку</h2>
                <div class="form-message" id="formMessage"></div>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Ваше имя *</label>
                        <input type="text" id="name" class="form-control" required placeholder="Имя Фамилия">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Телефон *</label>
                        <input type="tel" id="phone" class="form-control" required placeholder="+7 (777) 777-77-77">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" class="form-control" required placeholder="email@gmail.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea id="message" class="form-control" rows="4" placeholder="Напишите ваше сообщение и мы обязательно его прочитаем"></textarea>
                    </div>
                    
                    <button type="submit" class="btn" style="width: 100%;" id="submitBtn">
                        <span id="submitText">Отправить</span>
                        <span id="submitSpinner" style="display: none;">
                            <i class="fas fa-spinner fa-spin"></i> Отправка...
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>НОВОГОДНИЕ МЕРОПРИЯТИЯ</h3>
                    <p>Планирование и проведение новогодних праздников любого масштаба с профессиональной командой и современным оборудованием.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> г. Санкт-Петербург, ул. Новогодняя, 26</li>
                        <li><i class="fas fa-phone"></i> +7 (918) 063-00-19</li>
                        <li><i class="fas fa-envelope"></i> info@newYearProjects.ru</li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Ссылки</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Главная</a></li>
                        <li><a href="#projects">Проекты</a></li>
                        <li><a href="#slider">Архив</a></li>
                        <li><a href="#form">Контакты</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 НОВОГОДНИЕ МЕРОПРИЯТИЯ. Абсолютно все права максимально защищены.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        ' . file_get_contents('script.js') . '
    </script>
</body>
</html>';
}

// Обработчик запросов методом POST (фоллбек для отключенного JS)
function front_post($request) {
  // Возвращаем ту же страницу с сообщением
  return front_get($request);
}
