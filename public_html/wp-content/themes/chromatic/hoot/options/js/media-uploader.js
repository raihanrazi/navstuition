window.CHROMATICFWMEDIA = (function(window, document, $, undefined){

	var chromaticoptions_upload;
	var chromaticoptions_selector;

	var chromaticfwMedia = {};

	chromaticfwMedia.add_file = function(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		chromaticoptions_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( chromaticoptions_upload ) {
			chromaticoptions_upload.open();
		} else {
			// Create the media frame.
			chromaticoptions_upload = wp.media.frames.chromaticoptions_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			chromaticoptions_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = chromaticoptions_upload.state().get('selection').first();
				chromaticoptions_upload.close();
				chromaticoptions_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					chromaticoptions_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				chromaticoptions_selector.find('.upload-button').unbind().addClass('remove-file').removeClass('upload-button').val(chromaticoptions_l10n.remove);
				chromaticoptions_selector.find('.chromaticfw-of-background-properties').slideDown();
				chromaticoptions_selector.find('.remove-image, .remove-file').on('click', function() {
					chromaticfwMedia.remove_file( $(this).closest('.section') );
				});
			});

		}

		// Finally, open the modal.
		chromaticoptions_upload.open();
	}

	chromaticfwMedia.remove_file = function(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.chromaticfw-of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button').removeClass('remove-file').val(chromaticoptions_l10n.upload);
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button').remove();
		}
		selector.find('.upload-button').on('click', function(event) {
			chromaticfwMedia.add_file(event, $(this).closest('.section'));
		});
	}

	chromaticfwMedia.init = function(){
		$('.remove-image, .remove-file').on('click', function() {
			chromaticfwMedia.remove_file( $(this).closest('.section') );
		});

		$('.upload-button').click( function( event ) {
			chromaticfwMedia.add_file(event, $(this).closest('.section'));
		});
	}

	$(document).ready(chromaticfwMedia.init);

	return chromaticfwMedia;

})(window, document, jQuery);