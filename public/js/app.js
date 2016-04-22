$.fn.inputDefaultText = function(options)
	{
	options = $.extend({
		text: ''
	}, options);

	return this
		.val(options.text)
		.bind('focus', function(){ if(this.value == options.text) this.value = ''; })
		.bind('blur', function(){ if(this.value == '') this.value = options.text; });
};

$.support.placeholder = (function(){
	var i = document.createElement('input');
	return 'placeholder' in i;
})();

/*******************************************************
	APP
********************************************************/
var App =
{
	options: {

	},

	run: function(options)
	{
		var app = this;

		app.options = $.extend(true, app.options, options);

		/* **************** placeholder *************** */
		if( !$.support.placeholder ){
			$('input[placeholder]').each(function(){
				$(this).inputDefaultText({text: $(this).attr('placeholder')});
			});
		}

	}
};
