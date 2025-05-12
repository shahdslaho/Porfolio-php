<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Portfolio</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="header-content">
        <a href="#home" class="logo"></a>
        <nav>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <section class="hero" id="home">
    <div class="container hero-content">
      <div class="hero-text">
        <h2>Hello, I'm Shahd</h2>
        <p>A Front-End Developer passionate about clean & creative design.</p>
        <a href="#projects" class="btn">View My Work</a>
      </div>
      <div class="hero-image">
        <img src="img/shahd.png" alt="Shahd's Photo" />
      </div>
    </div>
  </section>
  <section class="projects" id="projects">
    <div class="container">
      <h2 class="section-title">My Projects</h2>
      <?php
      require_once 'config/db.php';
      
      try {
          $stmt = $pdo->query("SELECT * FROM projects ORDER BY order_number");
          while($project = $stmt->fetch()) {
      ?>
          <div class="project-card">
              <img src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
              <div class="project-content">
                  <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                  <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                  <a href="<?php echo htmlspecialchars($project['project_url']); ?>" class="btn" target="_blank">View Project</a>
              </div>
          </div>
      <?php
          }
      } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      ?>
    </div>
  </section>
  <section class="skills" id="skills">
    <div class="container">
        <h2 class="section-title">My Skills</h2>
        <div class="skills-container">
            <div class="skill-category">
                <h3>Frontend Development</h3>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fab fa-html5"></i>
                        <span class="skill-name">HTML5</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 95%"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fab fa-css3-alt"></i>
                        <span class="skill-name">CSS3</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 90%"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fab fa-js"></i>
                        <span class="skill-name">JavaScript</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 85%"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fab fa-react"></i>
                        <span class="skill-name">React</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 80%"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3>Design Skills</h3>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fas fa-pencil-ruler"></i>
                        <span class="skill-name">UI/UX Design</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 90%"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fas fa-mobile-alt"></i>
                        <span class="skill-name">Responsive Design</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 88%"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-header">
                        <i class="fas fa-magic"></i>
                        <span class="skill-name">Web Animation</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="contact">
  <div class="contact-container">
    <h2 class="section-title">Let's Work Together</h2>
    <div class="contact-text">
      <p>Whether you have a question or just want to say hi, feel free to reach out!</p>
    </div>
    <div class="social-links">
      <a href="tel:+6238159979459" class="social-item">
        <div class="social-icon"><i class="fas fa-phone"></i></div>
        <div class="social-label">
          <h4>Phone</h4>
          <span>+6238159979459</span>
        </div>
      </a>

      <a href="https://t.me/ShahdSlaho" target="_blank" class="social-item">
        <div class="social-icon"><i class="fab fa-telegram"></i></div>
        <div class="social-label">
          <h4>Telegram</h4>
          <span>@ShahdSlaho</span>
        </div>
      </a>

      <a href="https://www.facebook.com/share/1GoR96QXM3/" target="_blank" class="social-item">
        <div class="social-icon"><i class="fab fa-facebook-f"></i></div>
        <div class="social-label">
          <h4>Facebook</h4>
          <span>Shahd Slaho</span>
        </div>
      </a>

      <a href="https://github.com/shahdslaho" target="_blank" class="social-item">
        <div class="social-icon"><i class="fab fa-github"></i></div>
        <div class="social-label">
          <h4>GitHub</h4>
          <span>@shahdslaho</span>
        </div>
      </a>

      <a href="https://www.instagram.com/shahdsalaho" target="_blank" class="social-item">
        <div class="social-icon"><i class="fab fa-instagram"></i></div>
        <div class="social-label">
          <h4>Instagram</h4>
          <span>@shahdsalaho</span>
        </div>
      </a>

      <a href="mailto:shahdslaho00@gmail.com" class="social-item">
        <div class="social-icon"><i class="fas fa-envelope"></i></div>
        <div class="social-label">
          <h4>Email</h4>
          <span>shahdslaho00@gmail.com</span>
        </div>
      </a>
    </div>
  </div>
</section>
</body>
</html>
