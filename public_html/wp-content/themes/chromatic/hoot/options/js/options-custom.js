jQuery(document).ready(function($) {

	/*** Loads tabbed sections if they exist ***/

	function chromaticfw_options_tabs() {
		var $navtabs     = $('.nav-tab'),
			$panels      = $('.tab-panel'),
			tabification = function( $navtabs, $panels ) {
							$navtabs.first().addClass('nav-tab-active');
							$panels.first().show();
							$navtabs.each(function() {
								var $self     = $(this),
									$target   = $($self.data('panel'));
								$self.on( "click", function(e) {
									e.preventDefault();
									$panels.hide();
									$target.fadeIn( 'fast' );
									$navtabs.removeClass('nav-tab-active');
									$self.addClass('nav-tab-active');
								});
							});
						};

		// Main Tabs Navigation
		tabification( $navtabs, $panels );

		// Secondary Tabs Navigation
		$panels.each(function(){
			var $navsubtabs  = $(this).find('.nav-subtab'),
				$subpanels   = $(this).find('.subtab-panel');
			if ( $navsubtabs.length > 0 && $subpanels.length > 0 )
				tabification( $navsubtabs, $subpanels );
		});
	}

	if ( $('.nav-tab-wrapper').length > 0 ) {
		chromaticfw_options_tabs();
	}

	/*** Loads the color pickers ***/

	$('.chromaticfw-of-color').wpColorPicker();

	/*** Image Options ***/

	$.fn.chromaticfwRadioImg = function() {
		return this.each(function() {
			var $self      = $(this),
				$radioImgs = $(this).find('.chromaticfw-of-radio-img-img');

			$radioImgs.click(function(){
				$radioImgs.removeClass('chromaticfw-of-radio-img-selected');
				$(this).addClass('chromaticfw-of-radio-img-selected');
				var selector = $(this).data('selector');
				$(this).siblings('#'+selector).trigger('click');
			});

			$radioImgs.show();
			$self.find('.chromaticfw-of-radio-img-label').hide();
			$self.find('.chromaticfw-of-radio-img-radio').hide();
		});
	};
	$('.chromaticfw-of-radio-img-box').chromaticfwRadioImg();

	/*** Show on select ***/

	$.fn.chromaticfwShowOnSelect = function() {
		return this.each(function() {
			var $self = $(this),
				$panels = $self.children('.show-on-select-block'),
				selectortag = $self.data('selector'),
				$selector = $self.siblings('.'+selectortag ).find('input');

			$self.find("."+selectortag+'-'+ $selector.filter(':checked').val() ).show(); //4bg:php

			$selector.change(function(){
				var selectvalue = $(this).val();
				$panels.hide();
				$self.find("."+selectortag+'-'+selectvalue).fadeIn();
			});
		});
	};
	$('.show-on-select').chromaticfwShowOnSelect();

	/*** Sort List ***/

	$.fn.chromaticfwSortList = function() {
		var regexID = new RegExp( $(this).attr('id')+'-', "g" );

		return this.each(function() {
			var $list      = $(this),
				$inputs    = $list.siblings('.chromaticfw-of-sortlist-input'),
				$listItems = $list.children('li'),
				$hideicon  = $list.find('.visibility');

			var updateSortable = function(){
				var positionList = $list.sortable("toArray");//.toString();
				for (var i = 0; i < positionList.length; i++) {
					var itemVal = (i+1) + ',';
					( $listItems.filter('#'+positionList[i]).is('.invisible') ) ? itemVal+='0' : itemVal+='1';
					$inputs.filter('#'+positionList[i]+'-input').val(itemVal);
				}
			};

			$hideicon.on( "click", function() {
				$(this).parent('li').toggleClass('invisible');
				updateSortable();
			});

			$list.sortable({
				stop: function(event, ui) {
					updateSortable();
				},
				cancel: ".visibility",
				placeholder: "ui-sortable-placeholder",
				forcePlaceholderSize: true,
				// containment: "parent"
			});

		});
	};
	$('.chromaticfw-of-sort-list').chromaticfwSortList();

	/*** Icon Picker ***/

	$.fn.chromaticfwIconPicker = function() {
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
	$('.chromaticfw-of-icon').chromaticfwIconPicker();
	$(document).on('click', function(event) {
		// If this is not inside .chromaticfw-of-icon-picker-box or .chromaticfw-of-icon-picked
		if (!$(event.target).closest('.chromaticfw-of-icon-picker-box').length
			&&
			!$(event.target).closest('.chromaticfw-of-icon-picked').length ) {
			$('.chromaticfw-of-icon-picker-box').hide();
		}
	});

	/*** Font Picker ***/

	$.fn.chromaticfwFontFacePicker = function() {
		return this.each(function() {

			var $self       = $(this),
				$picker_box = $self.siblings('.chromaticfw-of-typography-face-picker-box'),
				$button     = $self.siblings('.chromaticfw-of-typography-face-picked'),
				$preview    = $button.children('.chromaticfw-of-typography-face-picked-text'),
				$options    = $picker_box.find('.chromaticfw-of-typography-face-option');

			$button.on( "click", function() {
				$picker_box.toggle();
			});

			$options.on( "click", function() {
				var fontvalue = $(this).data('value');
				$options.removeClass('selected');
				$(this).addClass('selected');
				var fontname = $(this).find('span').html();
				$preview.text(fontname);
				$self.val(fontvalue);
				$picker_box.toggle();
			});

		});
	};
	$('.chromaticfw-of-typography-face').chromaticfwFontFacePicker();
	$(document).on('click', function(event) {
		// If this is not inside .chromaticfw-of-icon-picker-box or .chromaticfw-of-icon-picked
		if (!$(event.target).closest('.chromaticfw-of-typography-face-picker-box').length
			&&
			!$(event.target).closest('.chromaticfw-of-typography-face-picked').length ) {
			$('.chromaticfw-of-typography-face-picker-box').hide();
		}
	});

	/*** Groups ***/

	var setupGroups = function(){
		$('.chromaticfw-of-groups').each(function(){

			var $self         = $(this),
				$add          = $self.siblings('.add-group-button'),
				$toggleGroups = $self.siblings('.chromaticfw-of-group-toggle-all'),
				$groups       = $self.children('.chromaticfw-of-group'),
				groupIndex    = $(this).data('index'),
				newGroupHtml  = (typeof window.chromaticfw_of_helper[groupIndex] == "undefined") ? '' : window.chromaticfw_of_helper[groupIndex];

			$toggleGroups.children('.fa').on('click', function(){
				if($(this).is('.fa-toggle-on'))
					$(this).parent().siblings('.chromaticfw-of-groups').find('.chromaticfw-of-group-content').hide();
				else
					$(this).parent().siblings('.chromaticfw-of-groups').find('.chromaticfw-of-group-content').show();
				$(this).toggleClass('fa-toggle-on');
			})

			var $remove_buttons = $self.find('.remove-group-button');
			if ( $remove_buttons.length == 1 )
				$remove_buttons.addClass('disabled');

			var setupRemove = function( $container ) {
								$container.find('.remove-group-button').on( "click", function(e) {
									e.preventDefault();
									if ( $(this).is('.disabled') )
										return;
									$(this).closest('.chromaticfw-of-group').remove();
									var $remove_buttons = $self.find('.remove-group-button');
									if ( $remove_buttons.length == 1 )
										$remove_buttons.addClass('disabled');
								});
							};

			var setupGroup = function( $container, isNew ) {
								setupRemove($container);
								if ( isNew ) {
									$container.find('.chromaticfw-of-color').wpColorPicker();
									$container.find('.chromaticfw-of-radio-img-box').chromaticfwRadioImg();
									$container.find('.show-on-select').chromaticfwShowOnSelect();
									$container.find('.chromaticfw-of-sort-list').chromaticfwSortList();
									$container.find('.chromaticfw-of-icon').chromaticfwIconPicker();
									$container.find('.chromaticfw-of-typography-face').chromaticfwFontFacePicker();
									$container.find('.remove-image, .remove-file').on('click', function() {
										CHROMATICFWMEDIA.remove_file( $(this).closest('.section') );
									});
									$container.find('.upload-button').click( function( event ) {
										CHROMATICFWMEDIA.add_file(event, $(this).closest('.section'));
									});
								}
								$container.find('.chromaticfw-of-group-toggle').on( "click", function() {
									$(this).parent().siblings('.chromaticfw-of-group-content').toggle();
								});
							}

			$groups.each(function(){
				setupGroup($(this), false);
			});

			if ($self.is('.sortable')) {
				$self.sortable({
					handle: ".chromaticfw-of-group-title",
					placeholder: "ui-sortable-placeholder",
					forcePlaceholderSize: true,
				});
			};

			if ($self.is('.repeatable')) {
				$add.on( "click", function(e) {
					e.preventDefault();
					var $remove_buttons = $self.find('.remove-group-button');
					if ( $remove_buttons.length == 1 )
						$remove_buttons.removeClass('disabled');
					var iterator = parseInt( $(this).data('iterator') );
					iterator++;
					$(this).data('iterator', iterator);
					var newGroup = newGroupHtml.trim().replace(/975318642/g, 'g'+iterator);
					var $newGroup = $(newGroup);
					setupGroup($newGroup, true);
					$self.append($newGroup);
				});
			};

		});
	};
	setupGroups();

});