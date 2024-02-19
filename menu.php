                  <!DOCTYPE html>
                  <html lang="en">
                  <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Asotaecommerce</title>

                    <!--
                      - favicon
                    -->
                    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

                    <!--
                      - custom css link
                    -->
                    <link rel="stylesheet" href="./assets/css/style-prefix.css">

                    <!--
                      - google font link
                    -->
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
                      rel="stylesheet">

                  </head>

                  <body>
                    <div class="overlay" data-overlay></div>

                    <header>

                   

                      <div class="container header-main">

                        <div class="container">

                          <a href="index.php" class="header-logo">
                            <img src="imgss\aso.png" alt="Anon's logo" width="50" height="50">
                          </a>

                          <div class="header-search-container">
                          <form action="index.php?modulo=resultados" method="GET">
                          <input type="search" name="nombre" class="search-field" placeholder="Buscar productos...">
                          <button class="search-btn">
                              <ion-icon name="search-outline"></ion-icon>
                          </button>
                      </form>


                          </div>
                          <li class="nav-item dropdown action-btn">
                            
                            <a class="" data-toggle="dropdown" href="#">
                            <i class="fa fa-user"  aria-hidden="true"></i>

                               

                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <?php
                                if (isset($_SESSION['idCliente']) == false) {
                                ?>
                                    <a href="login.php" class="dropdown-item">
                                        <i class="fas fa-door-open mr-2 text-primary"></i>Loguearse
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="registro.php" class="dropdown-item">
                                        <i class="fas fa-sign-in-alt mr-2 text-primary"></i>Registrarse
                                    </a>
                                <?php
                                } else {
                                ?>
                                   <a href="index.php?modulo=usuario&id=<?php echo $_SESSION['idCliente']; ?>" class="dropdown-item">
                                        <i class="fas fa-user text-primary mr-2"></i>Hola <?php echo $_SESSION['nombreCliente']; ?>
                                    </a>

                                    <form action="index.php" method="post">
                                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                                        <i class="fas fa-door-closed text-danger mr-2"></i>Cerrar sesion
                                        </button>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                        <li>Mi cuenta</li>

                          <div class="header-user-actions">

                          
                          <li class="nav-itema" style="color: red;">
                                <span>|</span>
                            </li>
                  
                              <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
                                <i class="fas fa-cart-plus" aria-hidden="true"></i>
                                <span class="badge badge-danger navbar-badge" id="badgeProducto" style="font-size: 8px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">

                            </div>
                        </li>
                        <li>Mis compras</li>
                      
                            

                          </div>

                        </div>

                      </div>

                      <nav class="desktop-navigation-menu">

                        <div class="container">

                          <ul class="desktop-menu-category-list">

                            <li class="menu-category">
                              <a href="index.php" class="menu-title">Inicio</a>
                            </li>

                            <li class="menu-category">
                              <a href="#" class="menu-title">Categorias</a>

                              <div class="dropdown-panel">

                                <ul class="dropdown-panel-list">

                                  <li class="menu-title">
                                    <a href="#">Categoria</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="index.php?modulo=hombre">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="">Mujer</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Niños</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Por temporada</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Escolar</a>
                                  </li>

                                 
                                  
                                  <li class="panel-list-item">
                                    <a href="#">
                                     
                                    </a>
                                  </li>

                               

                                </ul>

                                <ul class="dropdown-panel-list">

                                  <li class="menu-title">
                                    <a href="index.php?modulo=mujer">Mujer</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="index.php?modulo=mujer">Mujer</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                        
                                  <li class="panel-list-item">
                                    <a href="#">
                                     
                                    </a>
                                  </li>

                                </ul>

                                <ul class="dropdown-panel-list">

                                  <li class="menu-title">
                                    <a href="index.php?modulo=niño">Niños</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                 
                                  <li class="panel-list-item">
                                    <a href="#">
                                     
                                    </a>
                                  </li>

                                </ul>
                                

                                <ul class="dropdown-panel-list">

                                  <li class="menu-title">
                                    <a href="#">De temporada</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">Hombre</a>
                                  </li>

                                  <li class="panel-list-item">
                                    <a href="#">
                                     
                                    </a>
                                  </li>

                                </ul>

                                

                              </div>
                            </li>

                            <li class="menu-category">
                              <a href="index.php?modulo=hombre" class="menu-title">Hombre</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                              </ul>
                            </li>

                            <li class="menu-category">
                              <a href="index.php?modulo=mujer" class="menu-title">Mujer</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                              </ul>
                            </li>

                            <li class="menu-category">
                              <a href="index.php?modulo=niño" class="menu-title">Niños</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                              </ul>
                            </li>
                            <li class="menu-category">
                              <a href="index.php?modulo=estudiante" class="menu-title">Escolar</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                              </ul>
                            </li>

                            <li class="menu-category">
                              <a href="index.php?modulo=temporada" class="menu-title">Temporada</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                              </ul>
                            </li>
                            <li class="menu-category">
                              <a href="index.php?modulo=deportivo" class="menu-title">Deportivo</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="#">Hombre</a>
                                </li>

                              </ul>
                            </li>
                            <li class="menu-category">
                              <a href="index.php?modulo=informacion" class="menu-title">Quienes somos</a>
                              </li>
                            <li class="menu-category">
                              <a href="" class="menu-title">Ver tallas</a>

                              <ul class="dropdown-list">

                                <li class="dropdown-item">
                                  <a href="tallas\tallacamisahombres.jpg">Hombre</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="tallas\tallapantalonmujer.jpg">Mujer</a>
                                </li>

                                <li class="dropdown-item">
                                  <a href="tallas\tallaniños.jpg">Niño</a>
                                </li>


                              </ul>
                            </li>

                          </ul>

                        </div>

                      </nav>

                      <div class="mobile-bottom-navigation">

                        <button class="action-btn" data-mobile-menu-open-btn>
                          <ion-icon name="menu-outline"></ion-icon>
                        </button>
                        

                        <a href="index.php?modulo=carrito"  class="action-btn">
                          <ion-icon name="bag-handle-outline"></ion-icon>

                          <span class="badge badge-danger navbar-badge" id="badgeProducto" style="font-size: 8px;"></span>
                        </a>

                        <a href="index.php" class="action-btn">
                          <ion-icon name="home-outline"></ion-icon>
                        </a>


                        <button class="action-btn">
                          <ion-icon name="heart-outline"></ion-icon>

                          <span class="count">0</span>
                        </button>

                        <button class="action-btn" data-mobile-menu-open-btn>
                          <ion-icon name="grid-outline"></ion-icon>
                        </button>

                      </div>

                      <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

                        <div class="menu-top">
                          <h2 class="menu-title">Menu</h2>

                          <button class="menu-close-btn" data-mobile-menu-close-btn>
                            <ion-icon name="close-outline"></ion-icon>
                          </button>
                        </div>

                        <ul class="mobile-menu-category-list">

                          <li class="menu-category">
                            <a href="#" class="menu-title">Hombre</a>
                          </li>

                          <li class="menu-category">

                            <button class="accordion-menu" data-accordion-btn>
                              <p class="menu-title">Hombre</p>

                              <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                              </div>
                            </button>

                            <ul class="submenu-category-list" data-accordion>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Hombre</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Hombre</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Hombre</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Hombre</a>
                              </li>

                            </ul>

                          </li>

                          <li class="menu-category">

                            <button class="accordion-menu" data-accordion-btn>
                              <p class="menu-title">Women's</p>

                              <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                              </div>
                            </button>

                            <ul class="submenu-category-list" data-accordion>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Dress & Frock</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Earrings</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Necklace</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Makeup Kit</a>
                              </li>

                            </ul>

                          </li>

                          <li class="menu-category">

                            <button class="accordion-menu" data-accordion-btn>
                              <p class="menu-title">Jewelry</p>

                              <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                              </div>
                            </button>

                            <ul class="submenu-category-list" data-accordion>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Earrings</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Couple Rings</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Necklace</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Bracelets</a>
                              </li>

                            </ul>

                          </li>

                          <li class="menu-category">

                            <button class="accordion-menu" data-accordion-btn>
                              <p class="menu-title">Perfume</p>

                              <div>
                                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                              </div>
                            </button>

                            <ul class="submenu-category-list" data-accordion>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Clothes Perfume</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Deodorant</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Flower Fragrance</a>
                              </li>

                              <li class="submenu-category">
                                <a href="#" class="submenu-title">Air Freshener</a>
                              </li>

                            </ul>

                          </li>

                          <li class="menu-category">
                            <a href="#" class="menu-title">Blog</a>
                          </li>

                          <li class="menu-category">
                            <a href="#" class="menu-title">Hot Offers</a>
                          </li>

                        </ul>

                        <div class="menu-bottom">

                          <ul class="menu-category-list">

                            <li class="menu-category">

                              <button class="accordion-menu" data-accordion-btn>
                                <p class="menu-title">Language</p>

                                <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                              </button>

                              <ul class="submenu-category-list" data-accordion>

                                <li class="submenu-category">
                                  <a href="#" class="submenu-title">English</a>
                                </li>

                                <li class="submenu-category">
                                  <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                                </li>

                                <li class="submenu-category">
                                  <a href="#" class="submenu-title">Fren&ccedil;h</a>
                                </li>

                              </ul>

                            </li>

                            <li class="menu-category">
                              <button class="accordion-menu" data-accordion-btn>
                                <p class="menu-title">Currency</p>
                                <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                              </button>

                              <ul class="submenu-category-list" data-accordion>
                                <li class="submenu-category">
                                  <a href="#" class="submenu-title">USD &dollar;</a>
                                </li>

                          
                          </ul>

                          <ul class="menu-social-container">

                            <li>
                              <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                              </a>
                            </li>

                            <li>
                              <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                              </a>
                            </li>

                            <li>
                              <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                              </a>
                            </li>

                            <li>
                              <a href="#" class="social-link">
                                <ion-icon name="logo-linkedin"></ion-icon>
                              </a>
                            </li>

                          </ul>

                        </div>

                      </nav>

                    </header>







                      </div>



                    <!--
                      - custom js link
                    -->
                    <script src="./assets/js/script.js"></script>

                    <!--
                      - ionicon link
                    -->
                    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

                  </body>

                  </html>
                  
                  <script>

                  'use strict';

                  // modal variables
                  const modal = document.querySelector('[data-modal]');
                  const modalCloseBtn = document.querySelector('[data-modal-close]');
                  const modalCloseOverlay = document.querySelector('[data-modal-overlay]');

                  // modal function
                  const modalCloseFunc = function () { modal.classList.add('closed') }

                  // modal eventListener
                  modalCloseOverlay.addEventListener('click', modalCloseFunc);
                  modalCloseBtn.addEventListener('click', modalCloseFunc);





                  // notification toast variables
                  const notificationToast = document.querySelector('[data-toast]');
                  const toastCloseBtn = document.querySelector('[data-toast-close]');

                  // notification toast eventListener
                  toastCloseBtn.addEventListener('click', function () {
                    notificationToast.classList.add('closed');
                  });





                  // mobile menu variables
                  const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
                  const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
                  const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
                  const overlay = document.querySelector('[data-overlay]');

                  for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

                    // mobile menu function
                    const mobileMenuCloseFunc = function () {
                      mobileMenu[i].classList.remove('active');
                      overlay.classList.remove('active');
                    }

                    mobileMenuOpenBtn[i].addEventListener('click', function () {
                      mobileMenu[i].classList.add('active');
                      overlay.classList.add('active');
                    });

                    mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
                    overlay.addEventListener('click', mobileMenuCloseFunc);

                  }






                  // accordion variables
                  const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
                  const accordion = document.querySelectorAll('[data-accordion]');

                  for (let i = 0; i < accordionBtn.length; i++) {

                    accordionBtn[i].addEventListener('click', function () {

                      const clickedBtn = this.nextElementSibling.classList.contains('active');

                      for (let i = 0; i < accordion.length; i++) {

                        if (clickedBtn) break;

                        if (accordion[i].classList.contains('active')) {

                          accordion[i].classList.remove('active');
                          accordionBtn[i].classList.remove('active');

                        }

                      }

                      this.nextElementSibling.classList.toggle('active');
                      this.classList.toggle('active');

                    });

                  }
                  </script>
                  <style type="text/css">
                    @import url(https://fonts.googleapis.com/css?family=Rob

                    <?php
                $mensaje = $_REQUEST['mensaje'] ?? '';
                if ($mensaje) {
                ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <?php echo $mensaje; ?>
                    </div>
                <?php
                }
                ?>