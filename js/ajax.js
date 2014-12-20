/**
 * Created with JetBrains WebStorm.
 * User: B1ackRainFlake
 * Author: Liuchenling
 * Date: 12/20/13
 * Time: 16:19
 */
function Ajax() {
    "use strict";
    var aja = {};
    aja.tarUrl = '';
    aja.postString = '';
    aja.createAjax = function () {
        var xmlhttp;
        if (window.XMLHttpRequest) {                      
            xmlhttp = new XMLHttpRequest();
        } else {                                          
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        return xmlhttp;
    }

    aja.xhr = aja.createAjax();
    aja.processHandler = function () {
        if(aja.xhr.readyState == 4) {
            if(aja.xhr.status == 200) {
                aja.resultHandler(aja.xhr.responseText);
            }
        }
    }

    aja.get = function (tarUrl, callbackHandler) {
        aja.tarUrl = tarUrl;
        aja.resultHandler = callbackHandler;
        aja.xhr.onreadystatechange = aja.processHandler;
        aja.xhr.open('get', aja.tarUrl, true);
        aja.xhr.send();

    }

    aja.post = function (tarUrl, postString, callbackHandler) {
        aja.tarUrl = tarUrl;
        aja.postString = postString;
        aja.resultHandler = callbackHandler;
        aja.xhr.onreadystatechange = aja.processHandler;
        aja.xhr.open('post', aja.tarUrl, true);
        aja.xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        aja.xhr.send(aja.postString);
    }
    return aja;
}