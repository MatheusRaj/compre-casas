 AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });

jQuery(document).ready(function($) {

	"use strict";

	const user = window.localStorage.getItem('user');
	const path = window.location.pathname;

	if (!!user && path === '/admin.php') {
		document.getElementsByClassName('private__add__container')[0].innerHTML = `
			<input name="submit" type="submit" class="btn btn-primary" value="Enviar Mensagem">
			<progress class="add-house-progress pure-material-progress-circular" style="display: none"></progress>`;

		const editContainer = document.querySelectorAll('.private__edit__container');

		editContainer.forEach(item => {
			item.innerHTML = `
				<input name='submit' type='submit' class='btn btn-primary' value='Editar'>
				<progress class='edit-house-progress pure-material-progress-circular' style='display: none'></progress>`;
		});

		const addImage = document.querySelectorAll('.private__add__image');

		addImage.forEach(item => {
			const houseId = item.children[0].value;
			item.innerHTML = `
				<div class='container'>
					<div class="row">
						<form class='add-image-form' method='post' action='api/addImageForm.php' enctype='multipart/form-data'>
							<label for='add-image'>Selecione a imagem</label>
							<input id='add-image' name='add-image' type='file' accept='image/*'>
							<br></br>
							<input name='html_id' type='text' value='${houseId}' style='visibility:hidden'>
							<input name='submit' type='submit' class='btn btn-primary' value='Adicionar imagem'>
							<progress class='add-image-progress pure-material-progress-circular' style='display: none'></progress>
						</form>
            		    <div class="col-12">
							<br></br>
            		        <div class="alert alert-success add-image__msg" style="display: none" role="alert">
            		          Imagem salva com sucesso!
            		        </div>
							<div class="alert alert-danger error-add-image__msg" style="display: none" role="alert"></div>
            		    </div>
            		</div>
				<div class='container'>`;
		});

		const icons = document.querySelectorAll('.delete-icon');

		icons.forEach(icon => {
			icon.style.display = 'block';
		});
	}

	

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	// sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1000000,
      values: [ 0, 150000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "R$" + ui.values[ 0 ] + " - R$" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "R$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - R$" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	siteSliderRange();


	
	var siteCarousel = function () {
		if ( $('.nonloop-block-13').length > 0 ) {
			$('.nonloop-block-13').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
		    margin: 30,
		    autoplay: true,
		    nav: false,
		    responsive:{
	        600:{
	        	margin: 30,
	        	
	          items: 2
	        },
	        1000:{
	        	margin: 30,
	        	stagePadding: 0,
	        	
	          items: 3
	        },
	        1200:{
	        	margin: 30,
	        	stagePadding: 0,
	        	
	          items: 4
	        }
		    }
			});
		}

		$('.slide-one-item, .with-dots').owlCarousel({
	    center: false,
	    items: 1,
	    loop: true,
			stagePadding: 0,
	    margin: 0,
	    autoplay: true,
	    pauseOnHover: false,
	    nav: false,
	    dots: true,
	    navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
	  });

	  $('.slide-one-item-alt').owlCarousel({
	    center: false,
	    items: 1,
	    loop: true,
			stagePadding: 0,
			smartSpeed: 700,
	    margin: 0,
	    autoplay: true,
	    pauseOnHover: false,

	  });

	  
	  
	  $('.custom-prev1').click(function(e) {
	  	e.preventDefault();
	  	$('.nonloop-block-13').trigger('prev.owl.carousel');
	  });
	  $('.custom-next1').click(function(e) {
	  	e.preventDefault();
	  	$('.nonloop-block-13').trigger('next.owl.carousel');
	  });


	  $('.custom-next').click(function(e) {
	  	e.preventDefault();
	  	$('.slide-one-item-alt').trigger('next.owl.carousel');
	  });
	  $('.custom-prev').click(function(e) {
	  	e.preventDefault();
	  	$('.slide-one-item-alt').trigger('prev.owl.carousel');
	  });
	  
	};
	siteCarousel();

	var siteStellar = function() {
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();

	var siteDatePicker = function() {

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();

	var siteSticky = function() {
		$(".js-sticky-header").sticky({topSpacing:0});
	};
	siteSticky();

	// navigation
  var OnePageNavigation = function() {
    var navToggler = $('.site-menu-toggle');
   	$("body").on("click", ".main-menu li a[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a, a[href='#contact-section']", function(e) {
      e.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        'scrollTop': $(hash).offset().top
      }, 600, 'easeInOutCirc', function(){
        window.location.hash = hash;
      });

    });
  };
  OnePageNavigation();

  var siteScroll = function() {

  	

  	$(window).scroll(function() {

  		var st = $(this).scrollTop();

  		if (st > 100) {
  			$('.js-sticky-header').addClass('shrink');
  		} else {
  			$('.js-sticky-header').removeClass('shrink');
  		}

  	}) 

  };
  siteScroll();

});

const onSuccess = (googleUser) => {
	const profile = googleUser.getBasicProfile();

	if (profile.getId() !== '110675883096361831260') {

		const message = $('.unauthorized__msg');
		message.fadeIn().removeClass('alert-danger').addClass('alert-warning');
		setTimeout(() => {
			message.fadeOut();
			}, 5000);
		return;
	}

	window.localStorage.setItem('user', profile.getEmail());

	document.getElementsByClassName('private__add__container')[0].innerHTML = `
		<input name="submit" type="submit" class="btn btn-primary" value="Enviar Mensagem">
		<progress class="add-house-progress pure-material-progress-circular" style="display: none"></progress>`;

	const editContainer = document.querySelectorAll('.private__edit__container');

	editContainer.forEach(item => {
		item.innerHTML = `
			<input name='submit' type='submit' class='btn btn-primary' value='Editar'>
			<progress class='edit-house-progress pure-material-progress-circular' style='display: none'></progress>`;
	});

	const addImage = document.querySelectorAll('.private__add__image');

	addImage.forEach(item => {
		item.innerHTML = `
		<input name='submit' type='submit' class='btn btn-primary' value='Adicionar imagem'>
		<progress class='add-image-progress pure-material-progress-circular' style='display: none'></progress>`;
	});

	const icons = document.querySelectorAll('.delete-icon');

	icons.forEach(icon => {
		icon.style.display = 'block';
	});
}

const onFailure = (error) => {
	console.log(error);
}

const deleteImage = (e, html_id, image) => {

	e.preventDefault();

	$('.delete-icon').fadeOut();

    $('.delete-image-progress').fadeIn();

	const item = { html_id, image };

	const formData = new FormData();

	for ( var key in item ) {
	    formData.append(key, item[key]);
	}

	$.ajax({
		url: "api/deleteImageForm.php",
		type: "POST",
		data: formData,
		contentType: false,
		cache: false,
		processData: false,
		success: function (result) {
			const data = !!result.length ? result : JSON.parse(result);
			if (!!data.error) {
			  $('.delete-icon').fadeIn();
			  $('.delete-image-progress').fadeOut();
			  $(".error-delete-image__msg").html(`<p>${data.error.msg}</p>`).fadeIn();
			  setTimeout(function () {
				$(".error-delete-image__msg").fadeOut();
			  }, 5000);
			  $(':input[type="submit"]').prop('disabled', false);
	
			  return;
			}

			const message = $('.delete-image__msg');
			message.fadeIn().removeClass('alert-danger').addClass('alert-success');
			setTimeout(function () {
			message.fadeOut();
			}, 5000);

			$('.delete-image-progress').fadeOut();
			$('.delete-icon').fadeIn();
		}
	});
	  
	return;
}

const startApp = () => {
	gapi.load('auth2', () => {
		auth2 = gapi.auth2.init({
		client_id: '291139686088-5lfuurt88i7b2vjrhfl6vv6mshrt77ot.apps.googleusercontent.com',
		cookiepolicy: 'single_host_origin',
		scope: 'profile email'
		});
		auth2.attachClickHandler(document.getElementById('customBtn'), {}, onSuccess, onFailure);
	});
};

const refreshPage = () => {
	window.location.reload(true);
}

startApp();