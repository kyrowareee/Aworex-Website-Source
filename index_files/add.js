$( document ).ready(function() {

    $('.burgerLink').on('click touch', function(){
        mobileMenu = $('.mobile_bar');
        if(mobileMenu.hasClass('active')){
            mobileMenu.removeClass('active');
        }
        else{
            mobileMenu.addClass('active');
        }
    });
    $('.mobile_bar-close').on('click touch', function(){
        mobileMenu = $('.mobile_bar');
        if(mobileMenu.hasClass('active')){
            mobileMenu.removeClass('active');
        }
    });
    $('.mobile_bar-out').on('click touch', function(){
        mobileMenu = $('.mobile_bar');
        if(mobileMenu.hasClass('active')){
            mobileMenu.removeClass('active');
        }
    });

    SVGInject(document.getElementsByClassName('js-inject'));

    $('.payment_selector').on('change', function() {
      valchange = this.value;
      newhref = $(this).parent().find('.buynow_link').attr('href').split('&type')[0];
      $(this).parent().find('.buynow_link').attr('href', newhref+'&type='+valchange);
    });

    $('input[type="tel"]').inputmask("79999999999");

    $('.mailInput').keyup(function(){
        if($('.phoneNumber').length){
            newBuyHref = $('.paymentBtn').attr('href').split('&mail')[0]+'&mail='+$('.mailInput').val()+'&phone='+$('.phoneNumber').val();
            $('.paymentBtn').attr('href', newBuyHref);
            if($('.phoneNumber').val().length == 11){
                if($('.mailInput').val().length > 5){
                    $('.paymentBtn').removeClass('disabled');
                }
                else {
                    if(!$('.paymentBtn').hasClass('disabled')){
                        $('.paymentBtn').addClass('disabled');
                    }
                }
            }
            else {
                if(!$('.paymentBtn').hasClass('disabled')){
                    $('.paymentBtn').addClass('disabled');
                }
            }
        }
        else {
            newBuyHref = $('.paymentBtn').attr('href').split('&mail')[0]+'&mail='+$('.mailInput').val();
            $('.paymentBtn').attr('href', newBuyHref);
            if($('.mailInput').val().length > 5){
                $('.paymentBtn').removeClass('disabled');
            }
            else {
                if(!$('.paymentBtn').hasClass('disabled')){
                    $('.paymentBtn').addClass('disabled');
                }
            }  
        }
    });
      
    $('.phoneNumber').keyup(function(){
        if($('.mailInput').length){
            newBuyHref = $('.paymentBtn').attr('href').split('&mail')[0]+'&mail='+$('.mailInput').val()+'&phone='+$('.phoneNumber').val();
            $('.paymentBtn').attr('href', newBuyHref);
            if($('.mailInput').val().length > 5){
                if($('.phoneNumber').val().length == 11){
                    $('.paymentBtn').removeClass('disabled');

                }
                else {
                    if(!$('.paymentBtn').hasClass('disabled')){
                        $('.paymentBtn').addClass('disabled');
                    }
                }
            }
            else {
                if(!$('.paymentBtn').hasClass('disabled')){
                    $('.paymentBtn').addClass('disabled');
                }
            }
        }
        else {
            newBuyHref = $('.paymentBtn').attr('href').split('&mail')[0]+'&mail=&phone='+$('.phoneNumber').val();
            $('.paymentBtn').attr('href', newBuyHref);
            if($('.phoneNumber').val().length == 11){
                $('.paymentBtn').removeClass('disabled');
            }
            else {
                if(!$('.paymentBtn').hasClass('disabled')){
                    $('.paymentBtn').addClass('disabled');
                }
            }  
        }
    });
    
	console.log('1');
	$('.sub__button').on('click touch', function(){
		dataTab = $(this).data('tab');
		$('.sub__button').removeClass('sub__button-active');
		$(this).addClass('sub__button-active');
		$('.sub_tabs .sub_tab').removeClass('active');
		$('.sub_tabs .sub_tab[data-tab="'+dataTab+'"]').addClass('active');
	});

	$('.searchBtn').on('click touch', function(){
		$('#searchmodal').modal({
		  fadeDuration: 100
		});
	});

    $('.instructionRun').on('click touch', function(){
        $('#instructionModal').modal({
          fadeDuration: 100
        });
    });

    $('.instructionEnRun').on('click touch', function(){
        $('#instructionModalEn').modal({
          fadeDuration: 100
        });
    });

    $('.select__start').on('click touch', function(){
        $('.new__select-wrapper .select__wrapper').animate({scrollLeft: 0}, 500);
    });
    $('.select__end').on('click touch', function(){
        
        scrollLeftNow = $('.new__select-wrapper .select__wrapper').scrollLeft() + $('.new__select-wrapper .select__wrapper').width();
        $('.new__select-wrapper .select__wrapper').animate({scrollLeft: scrollLeftNow}, 500);
    });

	$('.translateRu').on('click touch', function(){
       $.ajax({
            url: '/ajax/lang',
			data: {
                lang: 'ru',
            },
            success: function(data){
                if(data.success){
                    setTimeout(function(){
                    	location.reload();
                    },300);
                }
                else {
                    alertify.error('#1 Error changing LANG');
                }
            },
            type: "POST", dataType: "json"
        });
	});
	$('.translateEn').on('click touch', function(){
       $.ajax({
            url: '/ajax/lang',
			data: {
                lang: 'en',
            },
            success: function(data){
                if(data.success){
                    setTimeout(function(){
                    	location.reload();
                    },300);
                }
                else {
                    alertify.error('#1 Error changing LANG');
                }
            },
            type: "POST", dataType: "json"
        });
	});
});