rulePattern = {
	'alphanum': /^[a-zA-Z0-9]*$/,
	'alpha': /^[a-zA-Z]*$/,
	'name': /^[\D]*$/,
	'number': /^\s*-?\d*(\.\d*)?\s*$/,
	'numberInt': /^\d+$/,
	'numberFloat': /^\d+(\.\d{1,2})?$/,
	'email': /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/,
	'emailEdit': /^[\S]+\@[\S]+\.[\S]{2,3}$/,
	'phone': /^[0|\+][0-9]+/,
	'phoneEdit': /^[0|\+|(0-9)]+[\)|0-9\s\-]+/,
	'postalCode': /[0-9]{2}[\-][0-9]{3}/,
	'postalCodeEdit': /^[0-9]/,
	'accountNumber': /[A-Za-z0-9]{6}/,
	'invoiceNumber': /^[^-\s][\w\s-]+$/,
	'invoiceAmount': /^[0-9]+\.?[0-9]*$/,
	'validateNull': /^\D+$/,
	'address': /^\D+$/,
	'matchAll': /^.+$/,
	'date': /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/
};

popupValidate = {
	validation: function (string, pattern) {
		var strRegex = rulePattern[pattern];
		if (strRegex.test(string.trim())) {
		   return true
		} else {
		   return false;
		}
	},

	checkEmail: function(email) {
		var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		var valid = emailReg.test(email);
		if (!valid) {
			return false;
		} else {
			return true;
		}
	},

	checkNumber: function(number) {
		var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
		if (numberRegex.test(number)) {
		   return true;
		} else {
			return false;
		}
	},

	checkEmpty: function(cls) {
		var check = 0;
		$('.' + cls).each(function(){
			var val = $(this).val().trim();
			if (val == '') {
				check += 1;
				$(this).addClass('has-error');
			} else {
				$(this).removeClass('has-error');
			}
		});
		if (check > 0) {
			return false;
		} else {
			return true;
		}
	},
	
	
	addClassError: function (cls, check) {
		if (check == false) {
			$('.' + cls).addClass('has-error');
		} else {
			$('.' + cls).removeClass('has-error');
		}
	},

	showMessage: function (msg, popup, check) {
		if (check == false) {
			if (popup == true) {
				$('.validate-form-popup-label').show();
				$('.validate-form-popup-label').html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>  ' + msg + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			} else{
				$('.validate-form-label').show();
				$('.validate-form-label').html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>  ' + msg + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			}
			return false;
		} else {
			if (popup == true) {
				$('.validate-form-popup-label').hide();	
			} else {
				$('.validate-form-label').hide();	
			}
			return true;
		}
	},
	
	checkPackageValue: function (value, min, max, lenght) {
		var strRegex = rulePattern['number']; 
		if (strRegex.test(value)) {
			if(value.indexOf('.') == -1) {
				if(parseFloat(value) >= min && parseFloat(value) <= max) {
					return true;
				} else {
					return false;
				}
			} else {
				if((value.substring(value.indexOf('.')).length > lenght)) {
					return false;
				} else {
					if(parseFloat(value) >= min && parseFloat(value) <= max) {
						return true;
					} else {
						return false;
					}
				}
			}
		} else {
			return false;
		}
	}
};
