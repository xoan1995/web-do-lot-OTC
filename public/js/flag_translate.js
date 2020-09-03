function getURL(lang)
    {
       // var URL = "http://translate.googleusercontent.com/translate_c?rurl=translate.google.com&sl=en&tl="+lang+"&u=";
       var URL = "http://translate.google.com/translate?hl=en&ie=UTF-8&sl=en&tl="+lang+"&u=";
        var currURL = window.location.href;
        var newURL = URL + currURL;
        var URLXX = "http://translate.google.com/translate?u="+currURL+"&langpair=en|"+lang
        window.location = URLXX;



    }
    function getEnURL(sURL)
    {
        var sURL = sURL.toString();

		if (sURL.indexOf("?") > 0) {
			var arrParams = sURL.split("?");

			var arrURLParams = arrParams[1].split("&");

			//var arrParamNames = new Array(arrURLParams.length);
			//var arrParamValues = new Array(arrURLParams.length);

			var i = 0;
			for (i=0; i < arrURLParams.length; i++) {
				var sParam =  arrURLParams[i].split("=");
                                //arrParamNames[i] = sParam[0];
				if(sParam[0]=="u")
                                    {
                                        var arrParamValues = unescape(sParam[1]);
                                    }
                               /* if (sParam[1] != "")
					arrParamValues[i] = unescape(sParam[1]);
				else
					arrParamValues[i] = "";*/
			}
                        return arrParamValues;

			/*for (i=0; i < arrURLParams.length; i++) {
				return arrParamValues[i];
			}*/
		} else {
			return "http://www.certifiedchinesetranslation.com";
	    }
    }
    function displayURL()
    {
        var varia = getEnURL(window.location.href);
         window.location = varia;
        //alert(varia);
    }

    function divDisplay()
    {
        document.getElementById('allFlags').style.display="block";
    }