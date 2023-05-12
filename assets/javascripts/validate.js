/**
* isMaliciousCode
* 
*  @param          value  cadena a chequear
*  @param optional funct  nombre de la funcion a ejecutarse
*  @param optional object objeto con los parametros a utilizarse en funct
*
* funct sin parametros:
*    // funcion a ejecutarse (esto va justo despues de <script type="text/javascript">):
*    var funct = function()
*    {
*        alert('uno: '); 
*    }
*    // chequeo (generalmente dentro de submit):
*    if (isMaliciousCode($(this).val(), funct)) { 
*        return false;
*    }
* 
* funct con parametros:
*    // funcion a ejecutarse (esto va justo despues de <script type="text/javascript">): 
*    var funct = function()
*    {
*       // Los parametros deben especificarse con this:
*       alert('uno: ' + this.uno + ', dos: ' + this.dos);
*    }
*    // objeto con los parametros y sus valores a utilizarse dentro de funct:
*    var params = { uno: 'primero', dos: 'segundo'};
*
*    if (isMaliciousCode($(this).val(), funct, param)) { 
*        return false;
*    }
*/
function validateEmail(value)
{
    var pattern = /^(([^<>()[]\.,;:s@"]+(.[^<>()[]\.,;:s@"]+)*)|(".+"))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
    var result = pattern.test(value);
    return result;

}

function IsNumeric(sText){
    var ValidChars = "0123456789.";
    var IsNumber=true;
    var Char;
    for (i = 0; i < sText.length && IsNumber == true; i++)       {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1)          {
            IsNumber = false;          }
    }
    return IsNumber;
}



function isMaliciousCode(value, funct, object) // <script>alert()</script>  &lt;script&gt;alert('hey')&lt;/script&gt;
{
    value = value.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
	var pattern = /(<.*?(javascript|script|onmouseover|onmousedown|onclick).*?>)/i;
    var result = pattern.test(value);
    if (result && (typeof funct != 'undefined')) { 
        if (typeof object == 'undefined') {
            funct();
        } else {
            funct.call(object);
        }
    }
    return result; 
}

function empty(value)
{
    return (typeof value == 'undefined') || (value == false) || (value == '') || (value == 0);
}

function isCustomComboBox(id)
{
    return ($('#' + id).parents('.ui-widget').find('.custom-combobox-input').val()) ? true : false;
}

function isLetters(value)
{
    var pattern = /^[a-zA-Z]+$/;
    return pattern.test(value);
}

function isEmptyOrLetters(value)
{
    return (typeof value == 'undefined') || (value == '') || isLetters(value);
}

function isLetterAndSpace(value)
{
    var pattern = /^[a-zA-ZáéíóúñÁÉÍÓÚÑ ]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrLetterAndSpace(value)
{
    return (typeof value == 'undefined') || (value == '') || isLetterAndSpace(value);  
}

function isAlphaNumeric(value)
{
    var pattern = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑ]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrAlphaNumeric(value)
{
    return (typeof value == 'undefined') || (value == '') || isAlphaNumeric(value);  
}

function isAlphaNumericAndSpace(value)
{
    var pattern = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑ ]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrAlphaNumericAndSpace(value)
{
    return (typeof value == 'undefined') || (value == '') || isAlphaNumericAndSpace(value);  
}

function isNumber(value)
{
	return (Number(value));
}

function isEmptyOrNumber(value)
{
	return (typeof value == 'undefined') || (value == '') || isNumber(value); 
}

function isPositive(value)
{
    return (!isNaN(value) && Number(value) > 0);
}

function isEmptyOrPositive(value)
{
    return (typeof value == 'undefined') || (value == '') || isPositive(value);
}

function isInteger(value)
{
    var pattern = /^-?[0-9]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrInteger(value)
{
    return (typeof value == 'undefined') || (value == '') || isInteger(value);
}

function isCreditCard(value)
{
    var pattern = /^[0-9]{16}$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrCreditCard(value)
{
    return (typeof value == 'undefined') || (value == '') || isCreditCard(value);
}

function isDigits(value, length)
{
    var pattern = /^[0-9]+$/;
    var result = pattern.test(value);
    if (result && length) {
        result = (value.length === length);  
    }
    return result; 
}

function isEmptyOrDigits(value, length)
{
    return (typeof value == 'undefined') || (value == '') || isDigits(value, length); 
}

function isFloat(value)
{
	var pattern = /^(\-)?[0-9]+(\.)?([0-9]+)?$/;
	var result = pattern.test(value);
	return result; 
}

function isEmptyOrFloat(value)
{
	return (typeof value == 'undefined') || (value == '') || isFloat(value); 
}

function isCurrency(value)
{
    var pattern = /^(0\.)?\d+(\.\d{1,2})?$/;
    return pattern.test(value);
}

function isEmptyOrCurrency(value)
{
    return (typeof value == 'undefined') || (value == '') || isCurrency(value);
}

function isZipCode(value)
{
	var pattern = /^[1-9]{1}[0-9]{4}(\-[0-9]{4})?$/;
	var result = pattern.test(value);
	return result; 
}

function isEmptyOrZipCode(value)
{
	return (typeof value == 'undefined') || (value == '') || isZipCode(value); 
}

function isPostalCode(value)
{
	var pattern = /^[0-9a-zA-Z_\s\-]+$/;   // numbers, letters, space, underscore and hyphen
	return pattern.test(value); 
}

function isEmptyOrPostalCode(value)
{
	return (typeof value == 'undefined') || (value == '') || isPostalCode(value); 
}

function isName(value) // alias of isLetterAndSpace
{
    return isLetterAndSpace(value);
}

function isEmptyOrName(value)
{
    return (typeof value == 'undefined') || (value == '') || isName(value);  
}

function isLastName(value)
{
    var pattern = /^[a-zA-ZáéíóúñÁÉÍÓÚÑ \-]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrLastName(value)
{
    return (typeof value == 'undefined') || (value == '') || isLastName(value); 
}

function isNickname(value)
{
    var pattern = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑ_\-]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrNickname(value)
{
    return (typeof value == 'undefined') || (value == '') || isNickname(value); 
}

function isPhoneNumber(value)
{
    var pattern = /^[0-9\(\)\-\. ]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrPhoneNumber(value)
{
	return (typeof value == 'undefined') || (value == '') || isPhoneNumber(value);
}

function isEmail(value)
{
    var pattern = /^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrEmail(value)
{
    return (typeof value == 'undefined') || (value == '') || isEmail(value);
}

function isInstagram(value)
{
	var pattern = /^[a-zA-Z]{1}[0-9a-zA-Z_\-]+$/;
	var result = pattern.test(value);
	return result;
}

function isEmptyOrInstagram(value)
{
	return (typeof value == 'undefined') || (value == '') || isInstagram(value);
}
	
function isAddress(value) // alias of isSafeText plus # and %
{
    var pattern = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑ _,\-\.#\%]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrAddress(value)
{
    return (typeof value == 'undefined') || (value == '') || isAddress(value);
}

function isCity(value)
{
	var pattern = /^[a-zA-ZáéíóúñÁÉÍÓÚÑ _,\-]+$/;
	var result = pattern.test(value);
	return result; 
}

function isEmptyOrCity(value)
{
	return (typeof value == 'undefined') || (value == '') || isCity(value); 
}

function isState(value)
{
    return isCity(value);
}

function isEmptyOrState(value)
{
    return isEmptyOrCity(value)
}

function isCountry(value)
{
    return isCity(value);
}

function isEmptyOrCountry(value)
{
    return isEmptyOrCity(value)
}
	
function isISODate(value) // year month day format
{
    var pattern = /^[0-9]{2,4}(\-|\/)(([1-9])|(0[1-9])|(1[0-2]))(\-|\/)(([1-9])|(0[1-9])|([1-2][0-9])|(3[0-1]))$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrISODate(value) 
{
	return (typeof value == 'undefined') || (value == '') || isISODate(value);
}

function isUSDate(value) //  month day year format
{
    var pattern = /^(([1-9])|(0[1-9])|(1[0-2]))(\-|\/)(([1-9])|([0-2][0-9])|(3[0-1]))(\-|\/)[0-9]{2,4}$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrUSDate(value) 
{
	return (typeof value == 'undefined') || (value == '') || isUSDate(value);
}

function isTime(value) 
{
	var pattern = /^[0-9]{1,2}:[0-9]{2}(:[0-9]{2})?( (am|pm|AM|PM))?$/;
	var result = pattern.test(value);
	return result;	
}

function isEmptyOrTime(value)
{
	return (typeof value == 'undefined') || (value == '') || isTime(value);
}

function isUSDateTime(value)
{
	var arr = value.split(' ');
	return isUSDate(arr[0]) && isTime(arr[1]);
}

function isEmptyOrUSDateTime(value)
{
	var arr = value.split(' ');
	return isEmptyOrUSDate(arr[0]) && isTime(arr[1]);
}

function isISODateTime(value)
{
	var arr = value.split(' ');
	return isISODate(arr[0]) && isTime(arr[1]);
}

function isEmptyOrISODateTime(value)
{
	var arr = value.split(' ');
	return isEmptyOrISODate(arr[0]) && isEmptyOrTime(arr[1]);
}

function isUrl(value)
{
    var pattern = /((ftp|https|http):\/\/)?(www\.)?[a-zA-Z0-9\-\.]{3,}\.[a-z]{2,3}((\/|\?)[_a-zA-Z0-9#!:\.?+=&%@!\-\/]*)*$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrUrl(value)
{
    return (typeof value == 'undefined') || (value == '') || isUrl(value); 
}

function isUrlSegment(value)
{
	var pattern = /^(\/)?[a-zA-Z0-9\-\.\/]+$/;
	var result = pattern.test(value);
	return result; 
}
	
function isEmptyOrUrlSegment(value)
{
	return (typeof value == 'undefined') || (value == '') || isUrlSegment(value); 
}

function isCustomUrlSegment(value)
{
    var pattern = /^[a-zA-Z]{1}[a-zA-Z0-9_\-]+$/;
    var result = pattern.test(value);
    return result;
}

function isEmptyOrCustomUrlSegment(value)
{
    return (typeof value == 'undefined') || (value == '') || isCustomUrlSegment(value);
}

function isSafeIdentifier(value)
{
    return isCustomUrlSegment(value);
}

function isEmptyOrSafeIdentifier(value)
{
    return (typeof value == 'undefined') || (value == '') || isSafeIdentifier(value);
}
	
function isSafeText(value)
{
    var pattern = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑ:;_,@!~# \/\$\[\]\(\)\{\}\-\.]+$/;
    var result = pattern.test(value);
    return result; 
}

function isEmptyOrSafeText(value)
{
    return (typeof value == 'undefined') || (value == '') || isSafeText(value);
}

function isText(value)
{
    return (value != '' && !isMaliciousCode(value));
}

function isEmptyOrText(value)
{
    return (typeof value == 'undefined') || (value == '') || isText(value);
}

function isTinyMceText(editorId)
{
    var value = tinymce.get(editorId).getContent();
    return value != '' && !isMaliciousCode(value);
}

function isEmptyOrTinyMceText(editorId)
{
    var value = tinymce.get(editorId).getContent();
    return (typeof value == 'undefined') || (value == '') || isTinyMceText(editorId);
}

function isIntPercent(value)
{ 
	var pattern = /^(([1-9]{1}[0-9]{0,1})|(100{1}))\s*%{0,1}$/;
	var result = pattern.test(value);
	return result; 
}

function isEmptyOrIntPercent(value)
{
	return (typeof value == 'undefined') || (value == '') || isPercent(value); 
}

function isPassword(value, params)
{
	if (typeof params['minLength'] == 'undefined' || params['minLength'] == null) {
		var passwdLength = 6;
	} else {
		var passwdLength = params['minLength'];
	}
	if (value.length < passwdLength) {
		return 0;
	}
	if (typeof params['forceDigitUpperAndLower'] != 'undefined' && params['forceDigitUpperAndLower'] != null && params['forceDigitUpperAndLower'] != false) {
		params['forceDigit'] = true;
		params['forceUpperAndLower'] = true;
	}
	if (typeof params['forceDigit'] != 'undefined' && params['forceDigit'] != null && params['forceDigit'] != false)
	{
		var pattern = /[0-9]+/;
		var digits = pattern.test(value);
		if (!digits) {
			return 0;
		}
	}
	if (typeof params['forceUpperAndLower'] != 'undefined' && params['forceUpperAndLower'] != null && params['forceUpperAndLower'] != false)
	{
		var pattern = /[a-z]+/;
		var lower = pattern.test(value);
		var pattern = /[A-Z]+/;
		var upper = pattern.test(value);
		if (!lower || !upper) {
			return 0;
		}
	}
	var result = false;
	if (typeof params['forceExtendedChars'] != 'undefined' && params['forceExtendedChars'] != null && params['forceExtendedChars'] != false)
	{
		var pattern = /[_!@#~\$\[\]\*\-]+/;
		var extChars = pattern.test(value);
		if (!extChars) {
			return 0;
		} else {
			result = true;
		}
	}
	if ((typeof params['allowExtendedChars'] != 'undefined' && params['allowExtendedChars'] != null && params['allowExtendedChars'] != false) || result)
	{ 
		var pattern = /^[0-9a-zA-Z_!@#~\$\[\]\*\-]+$/;
		result = pattern.test(value);
	} else {
		result = isAlphaNumeric(value);
	}
	return result; 
}
