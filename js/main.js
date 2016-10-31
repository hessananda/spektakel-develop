$(document).ready(function(){
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
	});

	new WOW().init();   

	$('#slides').superslides({
		play: 8000,
		animation: 'fade',
		animation_speed: 2000,
		pagination: true,
		hashchange: false,
		scrollable: true
	});

	$('#slide_kota').superslides({
		play: false,
		animation: 'fade',
		animation_speed: false,
		pagination: true,
		hashchange: false,
		scrollable: true
	});

	var $formLogin = $('#login-form');
	var $formLost = $('#lost-form');
	var $formRegister = $('#register-form');
	var $divForms = $('#div-forms');
	var $modalAnimateTime = 300;

	$('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
	$('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
	$('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
	$('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
	$('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
	$('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });

	function modalAnimate ($oldForm, $newForm) {
		$oldForm.fadeToggle($modalAnimateTime, function(){
			$divForms.animate($modalAnimateTime, function(){
				$newForm.fadeToggle($modalAnimateTime);
			});
		});
	}

	$('#nav-icon').sidr({
		name: 'sidr-main',
		source: '#navigation'
	});
	
	$('#sidr-id-btn-login-modal').click(function(){
		$.sidr('close', 'sidr-main');
		$('#nav-icon').removeClass('open');
	});

});

$(document).ready(function($){
	$('.cd-bottom').on('click', function(event){
		event.preventDefault();
		$("body, html").animate({
			scrollTop: $("#content").position().top
		});
		$(this).addClass('cd-fade-out');
	});

	$(window).scroll(function(){
		var bscroll = $(window).scrollTop();
		if (bscroll == '0') {
			$('.cd-bottom').removeClass('cd-fade-out');
		} else {
			$('.cd-bottom').addClass('cd-fade-out');
		}
	});
});

$(document).ready(function($){
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.cd-top');

	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
});

$(document).ready(function($){
	// $('.datepicker').datetimepicker({
	// 	format: 'YYYY-MM-DD'
	// });

	$('#input9').datetimepicker({
		format: 'YYYY-MM-DD'
	});

	$('#input10').datetimepicker({
		format: 'YYYY-MM-DD'
	});

	$('#input_birthdate').datetimepicker({
		format: 'YYYY-MM-DD'
	});
		

	$('.timepicker').datetimepicker({
		format: 'HH:mm'
	});

	$.uploadPreview({
		input_field: "#image-upload",
		preview_box: "#image-preview",
		label_field: "#image-label",
		no_label: true
	});

	$("#owl-example").owlCarousel({
		items: 3,
		pagination: false,
		navigation: true,
		navigationText: false
	});

	$('#btn-upload').on('click', function(event){
		var elem = document.getElementById('image-upload');
		if(elem && document.createEvent) {
			var evt = document.createEvent("MouseEvents");
			evt.initEvent("click", true, false);
			elem.dispatchEvent(evt);
		}
	});

	var imagecrop = document.getElementById('imagecrop');
	var options = {
		aspectRatio: 16 / 16,
		crop: function(e) {
			console.log(e.detail.x);
			console.log(e.detail.y);
			console.log(e.detail.width);
			console.log(e.detail.height);
			console.log(e.detail.rotate);
			console.log(e.detail.scaleX);
			console.log(e.detail.scaleY);
		}
	};
	var cropper = new Cropper(imagecrop, options);

	$('#btn-crop').on('click', function(event){
		var image = $(this).attr('data-img');
		if(image == '0'){
			alert("No files selected");
		} else {
			var newimage = $(this).attr('data-img');
			$("#crop-image").show();
			$(".image-user #imagecrop").attr("src", newimage);
			$("#upload-image").hide();
			cropper.destroy();
			cropper = new Cropper(imagecrop, options);
		}
	});

	$('#btn-empty').on('click', function(event){
		$(".image-user #imagecrop").attr("src", "");
		$("#crop-image").hide();
		$("#upload-image").show();
		$("#btn-crop").attr("data-img", "0");
		$("#image-preview").css("background-image", "none");
	});

	$('#btn-template').on('click', function(event){
		$("#box-browse").hide();
		$("#box-template").show();
	});

	$('.img-radio').click(function(e) {
		$('.img-radio').not(this).removeClass('active')
			.siblings('input').prop('checked',false);
		$(this).addClass('active')
			.siblings('input').prop('checked',true);
    });

	$('#btn-back-browse').on('click', function(event){
		$("#box-browse").show();
		$("#box-template").hide();
		$('.img-radio').removeClass('active')
			.siblings('input').prop('checked',false);
	});
});