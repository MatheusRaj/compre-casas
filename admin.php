<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CompreCasas.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <meta name="google-signin-client_id" content="266605183348-r1eppaje3nerl87k32rneqrhbgn70qj0.apps.googleusercontent.com">

    <script src='./script.js'></script>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo m-0 p-0"><a href="index.html" class="mb-0">CompreCasas.com</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Início</a></li>
                <li><a href="#properties-section" class="nav-link">Propriedades</a></li>
                <li><a href="#add-house-section" class="nav-link">Adicionar Casa</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">


      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 mt-lg-5 text-center">
            <h1>Painel Administrativo CompreCasas</h1>
            
          </div>
        </div>
      </div>

      <a href="#properties-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>

    <div id="gSignInWrapper" >
      <div id="customBtn" class="customGPlusSignIn">
        <span class="icon"></span>
        <span class="buttonText">Logar com o Google</span>
      </div>
    </div>
    <div id="name"></div>

    <div class="site-section hidden" id="properties-section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-7 text-left">
            <h2 class="section-title mb-3">Propriedades</h2>
          </div>
          <div class="col-md-5 text-left text-md-right">
            <div class="custom-nav1">
              <a href="#" class="custom-prev1">Anterior</a><span class="mx-3">/</span><a href="#" class="custom-next1">Próximo</a>
            </div>
          </div>
        </div>

        <div class="owl-carousel nonloop-block-13 mb-5">
          <?php include('pages/house_list.php') ?>
        </div>
      </div>
    </div>

    <section class="site-section bg-light bg-image hidden" id="add-house-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Adicionar Nova Casa</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">
            <form class="contact__form mb-3" method="post" action="contact_form.php">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input name="name" type="text" class="form-control" placeholder="Nome" required=""
                          oninvalid="this.setCustomValidity('Insira seu nome.')"
                          oninput="setCustomValidity('')"
                        >
                    </div>
                    <div class="col-md-6 form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email" required=""
                          oninvalid="this.setCustomValidity('Insira seu email.')"
                          oninput="setCustomValidity('')"
                        >
                    </div>
                    <div class="col-md-6 form-group">
                        <input name="phone" type="text" class="form-control" placeholder="Telefone">
                    </div>
                    <div class="col-md-6 form-group">
                        <input name="subject" type="text" class="form-control" placeholder="Assunto">
                    </div>
                    <div class="col-12 form-group">
                        <textarea name="message" class="form-control" rows="3" placeholder="Mensagem" required=""
                          oninvalid="this.setCustomValidity('Insira sua mensagem.')"
                          oninput="setCustomValidity('')"
                        ></textarea>
                    </div>
                    <div class="col-12">
                        <input name="submit" type="submit" class="btn btn-primary" value="Adicionar">
                    </div>
                </div>
            </form>
             <div class="row">
                <div class="col-12">
                    <div class="alert alert-success contact__msg" style="display: none" role="alert">
                      Seu email foi enviado com sucesso. Logo nossos corretores entrarão em contato com você!
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> <!-- .site-wrap -->

  <!-- .modal -->
  <?php include('pages/edit_modal.php') ?>

  <script src="https://apis.google.com/js/api:client.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
  <script src="js/contact_form.js"></script>

  <script>startApp();</script>
  </body>
</html>