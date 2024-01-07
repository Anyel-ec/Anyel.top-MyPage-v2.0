<?php if (isset($_SESSION['user_name'])) : ?>
            <li>
              <a class="nav-link scrollto" href="#">
                ¡Hola, <?php echo $_SESSION['user_name']; ?>!
              </a>
            </li>
          <?php else : ?>
            <li>
              <a class="nav-link scrollto" href="auth.php">
                Iniciar sesión 
                <!-- <i class="fab fa-google" style="font-size: larger;"> </i>Iniciar sesión -->
              </a>
            </li>
          <?php endif; ?>