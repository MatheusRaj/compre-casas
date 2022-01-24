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

    <div class="site-section" id="properties-section">
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
          <?php include('pages/houseList.php') ?>
        </div>
      </div>
    </div>

    <section class="site-section bg-light bg-image" id="add-house-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Adicionar Nova Casa</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">
          <form id="form" class="add-house__form mb-3" method="post" action="api/addHouseForm.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input name="title" type="text" class="form-control" placeholder="Título" required=""
                          oninvalid="this.setCustomValidity('Insira o título da casa.')"
                          oninput="setCustomValidity('')"
                        >
                    </div>
                    <div class="col-md-6 form-group">
                        <input name="details" type="text" class="form-control" placeholder="Detalhes" required=""
                          oninvalid="this.setCustomValidity('Insira seu email.')"
                          oninput="setCustomValidity('')"
                        >
                    </div>
                    <div class="col-md-6 form-group">
                        <input name="image" id="image" type="file" class="form-control" accept="image/*" placeholder="Imagens" multiple>
                    </div>
                    <div class="col-md-6 form-group">
                        <input name="price" type="text" class="form-control" placeholder="Preço">
                    </div>
                    <div class="col-12 form-group">
                        <textarea name="description" class="form-control" rows="3" placeholder="Descrição" required=""
                          oninvalid="this.setCustomValidity('Insira sua mensagem.')"
                          oninput="setCustomValidity('')"
                        ></textarea>
                    </div>
                    <div class="col-12">
                        <input name="submit" type="submit" class="btn btn-primary" value="Enviar Mensagem">
                    </div>
                </div>
            </form>
             <div class="row">
                <div class="col-12">
                    <div class="alert alert-success add-house__msg" style="display: none" role="alert">
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
  <?php include('pages/editModal.php') ?>

  <script src="packages/jquery-3.3.1.min.js"></script>
  <script src="packages/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="packages/popper.min.js"></script>
  <script src="packages/bootstrap.min.js"></script>
  <script src="packages/owl.carousel.min.js"></script>
  <script src="packages/jquery.stellar.min.js"></script>
  <script src="packages/jquery.countdown.min.js"></script>
  <script src="packages/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="packages/aos.js"></script>
  <script src="packages/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
  <script src="js/contactForm.js"></script>
  <script src="js/addHouseForm.js"></script>
  </body>
</html>