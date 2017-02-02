(function( $ ) {
	"use strict";

	/*** Setup Widget ***/

	$.fn.chromaticfwSetupWidget = function() {

		var setupAdd = function( $container, widgetClass, dynamic ){
			// Add Group Item
			$container.find('.chromaticfw-widget-field-group-add').each( function() {
				var $addGroup   = $(this),
					$itemList   = $addGroup.siblings('.chromaticfw-widget-field-group-items'),
					groupID     = $addGroup.parent('.chromaticfw-widget-field-group').data('id'),
					newItemHtml = window.chromaticfw_widget_helper[widgetClass][groupID];

				$addGroup.on( "click", function() {
					var iterator = parseInt( $(this).data('iterator') );
					iterator++;
					$(this).data('iterator', iterator);
					var newItem = newItemHtml.trim().replace(/975318642/g, iterator);

					var $newItem = $(newItem);
					setupToggle( $newItem );
					setupRemove( $newItem );
					$newItem.find('.chromaticfw-of-icon').chromaticfwWidgetIconPicker();
					//init( $newItem, widgetClass, true ); //@todo
					$itemList.append($newItem);
				});
			});
		};

		var setupToggle = function( $container ) {
			// Make groups collapsible
			$container.find('.chromaticfw-widget-field-group-item-top').on( "click", function() {
				$(this).siblings('.chromaticfw-widget-field-group-item-form').toggle();
			});
		};

		var setupRemove = function( $container ) {
			// Make group items removable
			$container.find('.chromaticfw-widget-field-remove').on( "click", function() {
				$(this).closest('.chromaticfw-widget-field-group-item').remove();
			});
		};

		return this.each( function(i, el) {
			var $self       = $(el),
				widgetClass = $self.data('class');

			// Skip this if we've already set up the form, or if template widget
			if ( $('body').hasClass('widgets-php') ) {
				if ( $self.data('chromaticfw-form-setup') === true ) return true;
				//if ( $self.closest('.widget').attr('id').indexOf("__i__") > -1 ) return true;
				//if ( $self.closest('#widgets-left').length > 0 ) return true;
				if ( !$self.is(':visible') ) return true;
			}

			$self.find('.chromaticfw-of-icon').chromaticfwWidgetIconPicker();

			setupAdd( $self, widgetClass, false );
			setupToggle( $self );
			setupRemove( $self );

			// All done.
			$self.trigger('chromaticfwwidgetformsetup').data('chromaticfw-form-setup', true);
		});

	};

	// Initialize existing chromaticfw forms
	$('.chromaticfw-widget-form').chromaticfwSetupWidget();

	// When we click on a widget top
	$('.widgets-holder-wrap').on('click', '.widget:has(.chromaticfw-widget-form) .widget-top', function(){
		var $$ = $(this).closest('.widget').find('.chromaticfw-widget-form');
		setTimeout( function(){ $$.chromaticfwSetupWidget(); }, 200);
	});

	/*** Icon Picker ***/

	$.fn.chromaticfwWidgetIconPicker = function() {
		return this.each(function() {

			var $self       = $(this),
				$picker_box = $self.siblings('.chromaticfw-of-icon-picker-box'),
				$button     = $self.siblings('.chromaticfw-of-icon-picked'),
				$preview    = $button.children('i'),
				$icons      = $picker_box.find('i');

			$button.on( "click", function() {
				$picker_box.toggle();
			});

			$icons.on( "click", function() {
				var iconvalue = $(this).data('value');
				$icons.removeClass('selected');
				var selected = ( ! $(this).hasClass('cmb-icon-none') ) ? 'selected' : '';
				$(this).addClass(selected);
				$preview.removeClass().addClass('fa ' + selected + ' ' + iconvalue );
				$self.val(iconvalue);
				$picker_box.toggle();
			});

		});
	};
	$(document).on('click', function(event) {
		// If this is not inside .chromaticfw-of-icon-picker-box or .chromaticfw-of-icon-picked
		if (!$(event.target).closest('.chromaticfw-of-icon-picker-box').length
			&&
			!$(event.target).closest('.chromaticfw-of-icon-picked').length ) {
			$('.chromaticfw-of-icon-picker-box').hide();
		}
	});

}(jQuery));