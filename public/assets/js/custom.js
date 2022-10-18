
	/*--------------------------------------
		menu-toggle
	--------------------------------------*/
	$(function(){
		$(".menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

		$(window).resize(function(e) {
			window_width();
		});

		function window_width(){ 
			if($(window).width() > 1024){
				$("#wrapper").addClass("toggled");
				$(".main-navbar .head .menu-toggle").addClass("d-none"); 
			} else {
				$("#wrapper").removeClass("toggled");
				$(".main-navbar .head .menu-toggle").removeClass("d-none"); 
			}
		}
		
		window_width();
	});

	/*--------------------------------------
		Scroll To Top
	--------------------------------------*/
	$(".scroll-to-top").click(function(){ 
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});

	/*--------------------------------------
		validation
	--------------------------------------*/ 
	(function() {

		var html_dir = $("html").data("dir");
		
		//validation

		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
		
		//tooltip
		$('[data-toggle="tooltip"]').tooltip();

		//popover
		$('[data-toggle="popover"]').popover(); 
		$('body').on('click', function (e) {
			$('[data-toggle="popover"]').each(function () {
				if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
					$(this).popover('hide');
				}
			});
		});

		//tagsinput
		$(".tagsinput").tagsinput({
			confirmKeys: [13, 188]
		});
		$('.bootstrap-tagsinput input').keydown(function( event ) {
			if ( event.which == 13 ) {
				$(this).blur();
				$(this).focus();
				return false;
			}
		})

		$("input").attr("autocomplete", "off");

		//selectpicker
		$('select').selectpicker(); 

		//datepicker
		if(html_dir == "rtl"){
			var language = "ar";
		} else {
			var language = "en";
		}

		$('.date-picker').datepicker({
			format: "yyyy-mm-dd", 
			language: language,
			autoclose: true
		});
		
		//toastr
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-left",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		
		//DataTable
		$(document).ready(function() {
			
			if(html_dir == "rtl"){
				var url = "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json";
			} else {
				var url = "";
			}
			$('#table').DataTable({ 
				searching: false,
				//paging: false,
				info: false,
				orderd: false,
				responsive: true, 
				"oLanguage": {
					"sUrl": url 
				},
				"fnDrawCallback": function(oSettings){
					if ($('#table tr').length < 11) {
						$('.dataTables_paginate').hide();
					}
				},
				rowReorder: {
					selector: 'td .sort-btn'
				}
			}); 
		});
		
		$('.textarea-editor').each(function(e){
			CKEDITOR.replace( this.id, { 
				extraPlugins: 'uploadimage,youtube',
				language: language, 
				toolbar: [{
						name: 'document',
						groups: []
					},
					{
						name: 'clipboard',
						groups: [],
						items: []
					},
					{
						name: 'editing',
						groups: [],
						items: []
					}, 
					{
						name: 'basicstyles',
						groups: ['basicstyles', 'cleanup'],
						items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
					},
					{
						name: 'paragraph',
						groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
						items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']
					},
					{
						name: 'links',
						items: ['Link', 'Unlink']
					},
					{
						name: 'insert',
						items: ['Image', 'Table', 'Youtube']
					},

					{
						name: 'styles',
						items: ['Styles']
					},
					{
						name: 'tools',
						items: ['Maximize']
					}
				]
			});
		});
	})();

	// form submit 
	$('form').submit(function(e) {
		var form = $(this);
		e.preventDefault();  
		if (form[0].checkValidity() === false) {
			e.stopPropagation();
		} else {
			toastr["success"]("Done");
			toastr["error"]("Error");
			Swal.fire("done !!", "save data is done", "success");
			// Swal.fire("error !!", "save data is not done", "error");
		}
	});
	
	/*----------------------------------------
		Change Pic User From Profile
	----------------------------------------*/
	
	function readURL(input, class_box) { 
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.'+class_box).attr('src', e.target.result).addClass("img-fluid");
			};
			reader.readAsDataURL(input.files[0]);
		}
	} 
	function removePic(class_box){
		$("#"+class_box).val('');
		$('.'+class_box).attr('src','assets/img/no-image.png');
	}  