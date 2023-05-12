
function showMessages(popupmsg)
{
    $('#msg').html(popupmsg);
    $('#privatemessage').modal('show');

}

function showAndGo(popupmsg)
{
    $('#msg').html(popupmsg);
    $('#privatemessage').modal('show');
    window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

}

function removeAllOptions(selectbox)
{
    var i;
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        //selectbox.options.remove(i);
        selectbox.remove(i);
    }
}


function addOption(selectbox, value, text )
{
    var optn = document.createElement("OPTION");
    optn.text = text;
    optn.value = value;

    selectbox.options.add(optn);
}



function Swoop(dURL, width, height)
{
    var desktop = window.open( dURL, "swoop", "toolbar=no,location=no,status=no,menubar=no,scrollbars=no,width=" + width + ",height=" + height + ",resizable=yes" );
}

function SwoopMenu(dURL, width, height)
{
    var desktop = window.open( dURL, "swoop", "toolbar=yes,location=yes,status=no,menubar=no,scrollbars=yes,width=" + width + ",height=" + height + ",resizable=yes" );
}

function SwoopScroll(dURL, width, height)
{
    var desktop = window.open( dURL, "swoop", "toolbar=yes,location=no,status=no,menubar=no,scrollbars=yes,width=" + width + ",height=" + height + ",resizable=yes" );
}

function SwoopHome(dURL, width, height)
{
    var desktop = window.open( dURL, "_blank", "toolbar=no,location=no,status=no,menubar=no,scrollbars=no,width=" + width + ",height=" + height + ",resizable=no" );
}

function AREYOUSURE(SuccessURL, Msg) {
    if (!CHECKMEOUT(Msg)) return;
    window.location.href=SuccessURL;
}

function AREYOUSURESwoop(SuccessURL, Msg) {
    if (!CHECKMEOUT(Msg)) return;
    Swoop(SuccessURL, '600','600');
}


function GoThere(SuccessURL){
    window.location.href=SuccessURL;

}
function AREYOUREALLYSURE(EventID, SuccessURL, Msg) {
    if (!CHECKMEOUT(Msg)) return;
    printcancel(EventID);
    setTimeout("GoThere(SuccessURL)", 8000);

}

function AREYOUSUREVAR(SuccessURL, Msg) {
    var WhoCancel = CHECKMEOUT2(Msg);
    if (!WhoCancel) return;
    window.location.href=SuccessURL + "&Who=" + WhoCancel;
}



function CHECKMEOUT(Msg) {
    return confirm(Msg);
}

function CHECKMEOUT2(Msg) {
    return prompt(Msg, "Who cancelled this event");
}



function chgBGColor(obj,color){
    if (document.all || document.getElementById)
        obj.style.backgroundColor=color;
    else if (document.layers)
        obj.bgColor=color;
}

function chgBg(obj,color){
    if (document.all || document.getElementById)
        obj.style.backgroundColor=color;
    else if (document.layers)
        obj.bgColor=color;
    obj.Color=color2;
}


function Maximize(){

    top.window.moveTo(0,0);
    if (document.all) {
        top.window.resizeTo(screen.availWidth,screen.availHeight);
    }
    else if (document.layers||document.getElementById) {
        if (top.window.outerHeight<screen.availHeight||top.window.outerWidth<screen.availWidth){
            top.window.outerHeight = screen.availHeight;
            top.window.outerWidth = screen.availWidth;
        }
    }


}

function SentenceCase(formobj){

    var strText = formobj.value;
    var MyLen = strText.length;
    var strTemp = "";
    var strNew = "";
    var myflag = 1;

    for (var i=0;i<MyLen;i++)
    {
        strNew = strText.substr(i,1);
        if (strNew == " ") {
            myflag = 0;
        }
        if (myflag > 1) {
            strNew = strNew.toLowerCase();
        }

        if (myflag == 1){
            strNew = strNew.toUpperCase();
        }

        if (myflag ==0){
            strTemp = strTemp + " ";
        }

        strTemp = strTemp + strNew;
        myflag = myflag + 1;
    }

    formobj.value=strTemp;
}

//// end Mike toold

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

function htmlEntities(str)
{
	return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function isFullyVisible(elem)
{
	var off = elem.offset();
	var et = off.top;
	var el = off.left;
	var eh = elem.height();
	var ew = elem.width();
	var wh = window.innerHeight;
	var ww = window.innerWidth;
	var wx = window.pageXOffset;
	var wy = window.pageYOffset;
	return (et >= wy && el >= wx && et + eh <= wh + wy && el + ew <= ww + wx);  
}

function hasScrollbar()
{
	return $('body').outerHeight() > $(window).height();
}

function USFormatDate(date)
{
    var d = new Date(date);
    var arr = d.toString('MMMM, dd yyyy').split(' ');  //  Wed May 22 2013 00:00:00 GMT-0400 (Eastern Daylight Time)
    return arr[1] + ' ' + arr[2].replace(/^0/, '') + ', ' + arr[3];
}

function DateToUS(date)
{ 
	if (!date) {
		return false;
	}
	if (typeof date == 'string') {
		date = date.split('-');
		date = new Date(date[0], date[1]-1, date[2]);
	}
	var curr_date = date.getDate();
	
	curr_date = '' + curr_date;
	if (curr_date.length == 1) {
	  curr_date = '0' + curr_date;
	}
	var curr_month = date.getMonth() + 1; // Months are zero based
	curr_month = '' + curr_month;
	if (curr_month.length == 1) {
	  curr_month = '0' + curr_month;
	}
	var curr_year = date.getFullYear();
	return curr_month + '/' + curr_date + '/' + curr_year;
}

function DateToMySQL(date)
{ 
	if (!date) {
		return false;
	}
	if (typeof date == 'string') {
		date = new Date(date);
	}
	var curr_date = date.getDate();
	curr_date = '' + curr_date;
	if (curr_date.length == 1) {
	  curr_date = '0' + curr_date;
	}
	var curr_month = date.getMonth() + 1; // Months are zero based
	curr_month = '' + curr_month;
	if (curr_month.length == 1) {
	  curr_month = '0' + curr_month;
	}
	var curr_year = date.getFullYear();
	return curr_year + '-' +  curr_month + '-' + curr_date;
}

function getDateDiffInDays(date1, date2)
{ 
    if (!date1 || !date2) {
        return false;
    }
    if (typeof date1 == 'string') {
        if (date1.indexOf('-') != -1) {
            date1 = date1.split('-');
            date1 = new Date(date1[0], date1[1], date1[2]);      
        } else {
            date1 = new Date(date1);
        }
    }
    if (typeof date2 == 'string') {
        if (date2.indexOf('-') != -1) {
            date2 = date2.split('-');
            date2 = new Date(date2[0], date2[1], date2[2]);      
        } else {
            date2 = new Date(date2);
        }
    }
    return Math.ceil(parseFloat((date2.getTime() - date1.getTime()) / (1000 * 60 * 60 * 24)));
}

function addDaysToDate(date, days)
{ 
    if (!date || !days) {
        return false;
    }
    if (typeof date == 'string') {
        if (date.indexOf('-') != -1) {
            date = date.split('-');
            date = new Date(date[0], date[1]-1, date[2]);       // make it compatible with Safari
        } else {
            date = new Date(date);
        }
        date = new Date(date);
    }
    return new Date(date.getTime() + (1000 * 60 * 60 * 24 * days));
}

function TimeToAmPM(time)
{
	if (typeof time != 'undefined' && time) {
		var arr = time.toString().split(':');
		if (arr[0] > 11) {
			if (arr[0] > 12) {
				arr[0] -= 12;
			}
			ampm = 'pm';
		} else {
			if (arr[0] == 0) {
				arr[0] = 12;
			}
			ampm = 'am';
		}
		return arr[0].toString().replace(/^0/, '') + ':' + arr[1] + ' ' + ampm;	
	} else {
		return '';
	}
}

function spanishmonths(date)
{
    date = date.replace(/Jan\s/, 'Ene ');
    date = date.replace(/Feb\s/, 'Feb ');                   
    date = date.replace(/Apr\s/, 'Abr ');                    
    date = date.replace(/Aug\s/, 'Ago ');                    
    date = date.replace(/Dec\s/, 'Dic ');
    date = date.replace(/January\s/, 'Enero ');                    
    date = date.replace(/February\s/, 'Febrero ');                       
    date = date.replace(/March\s/, 'Marzo ');
    date = date.replace(/April\s/, 'Abril ');                    
    date = date.replace(/May\s/, 'Mayo ');                    
    date = date.replace(/June\s/, 'Junio ');
    date = date.replace(/July\s/, 'Julio ');
    date = date.replace(/August\s/, 'Agosto ');                    
    date = date.replace(/September\s/, 'Septiembre ');                    
    date = date.replace(/October\s/, 'Octubre ');
    date = date.replace(/November\s/, 'Noviembre ');                    
    date = date.replace(/December\s/, 'Diciembre ');

    return date;
}

function cleanResponse(response)
{
    var index = response.indexOf('<');
    if (index < 0) {
        return response;
    } else {
        return response.substring(0, index);
    }
}

function strpos(haystack, needle, offset)
{
    // Finds position of first occurrence of a string within another  
    // 
    // version: 1109.2015
    // discuss at: http://phpjs.org/functions/strpos    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Onno Marsman    
    // +   bugfixed by: Daniel Esteban
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: strpos('Kevin van Zonneveld', 'e', 5);    // *     returns 1: 14
    var i = (haystack + '').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}

function encodeStr(str)   // see EncodeStr() y DecodeStr(str) in library/tools.php
{
    var openpar = /\(/g;
    str = str.replace(openpar, "__OPAR__");
    var closepar = /\)/g;
    str = str.replace(closepar, "__CPAR__");
    var simplecomilla = /'/g;
    str = str.replace(simplecomilla, "__S_COMILL__");
    var doblecomilla = /"/g;
    str = str.replace(doblecomilla, '__D_COMILL__');
    var opencorchete = /\[/g;
    str = str.replace(opencorchete, '__O_CORCH__');
    var closecorchete = /]/g;
    str = str.replace(closecorchete, '__C_CORCH__'); 
    var openllave = /\{/g;
    str = str.replace(openllave, '__O_LLAVE__');
    var closellave = /}/g;
    str = str.replace(closellave, '__C_LLAVE__');
    var coma = /,/g;
    str = str.replace(coma, '__COMA__');
    var dolar = /\$/g;
    str = str.replace(dolar, '__DOLAR__');
    var space = / /g;
    str = str.replace(space, '__SPACE__');
    var linebreak = /<br\/>/g;
    str = str.replace(linebreak, '__BR__');
    var exclam = /\!/g;
    str = str.replace(exclam, '__EXCLAM__');
    var a = /á/g;
    str = str.replace(a, '__A__');
    var e = /é/g;
    str = str.replace(e, '__E__');
    var i = /í/g;
    str = str.replace(i, '__I__');
    var o = /ó/g;
    str = str.replace(o, '__O__');
    var u = /ú/g;
    str = str.replace(u, '__U__');
    var ene = /ñ/g;
    str = str.replace(ene, '__ENE__');
    var forwardslash = /\//g;
    str = str.replace(forwardslash, '__FWSLASH__');
    var at = /@/g;
    str = str.replace(at, '__AT__');
    return str;
}

function decodeStr(str)  // see EncodeStr() y DecodeStr(str) in library/tools.php
{
    var openpar = /__OPAR__/g;
    str = str.replace(openpar, "(");
    var closepar = /__CPAR__/g;
    str = str.replace(closepar, ")");
    var simplecomilla = /__S_COMILL__/g;
    str = str.replace(simplecomilla, "'");
    var doblecomilla = /__D_COMILL__/g;
    str = str.replace(doblecomilla, '"');
    var opencorchete = /__O_CORCH__/g;
    str = str.replace(opencorchete, '[');
    var closecorchete = /__C_CORCH__/g;
    str = str.replace(closecorchete, ']');
    var openllave = /__O_LLAVE__/g;
    str = str.replace(openllave, '{');
    var closellave = /__C_LLAVE__/g;
    str = str.replace(closellave, '}');
    var coma = /__COMA__/g;
    str = str.replace(coma, ',');
    var dolar = /__DOLAR__/g;
    str = str.replace(dolar, '\$');
    var space = /__SPACE__/g;
    str = str.replace(space, ' ');
    var linebreak = /__BR__/g;
    str = str.replace(linebreak, '<br\/>');
    var exclam = /__EXCLAM__/g;
    str = str.replace(exclam, '\!');
    var forwardslash = /__FWSLASH__/g;
    str = str.replace(forwardslash, '\/');
    var at = /__AT__/g;
    str = str.replace(at, '@');
    
    return str;
}

function ExpandUSDate(date)
{
    var d = new Date(date);
    d = d.toDateString();
    var a = d.split(' ');
    return a[1] + ' ' + a[2] + ', ' + a[3];
}

function showPopup(a, b)
{
    $('#'+a).css({
        left: $('#'+b).offset().left + $('#'+b).width() / 2 - $('#'+a).width() / 2 - $(document).scrollLeft(),
        top: $('#'+b).offset().top + $('#'+b).height() / 2 - $('#'+a).height() / 2 - $(document).scrollTop()
    });  
    $('#'+b).fadeTo(300, .3, function(){
        $('#'+a).show();
    });
}

function closePopup(a, b)
{
    $('#'+a).hide();
    $('#'+b).fadeTo(300, 1);
}

function RedirectToNewWindow(pageurl)
{
    window.open(pageurl);
}

function OpenNewWindowToSize(dURL, width, height)
{
    var desktop = window.open( dURL, "_blank", "toolbar=no,location=no,status=no,menubar=no,scrollbars=no,width=" + width + ",height=" + height + ",resizable=yes" );
}

function trim(value)
{
	return value.replace(/^\s+/, '').replace(/\s+$/, '');
}