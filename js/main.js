$(document).ready(function(){
    console.log('its working !');

    //ANIMACION LOGO
    var imgLogoGrande=$(".imgLogoGrande");
    var aparecerLogo = function () {
        var desplazamientoActual = $(document).scrollTop();
        if(desplazamientoActual>180){
            $(imgLogoGrande[0]).fadeIn(1000);
        }
    };



    //ANIMACION TEXTO
    var titulos = $('h2');
    var textos = $('h5');
    var divisor = $('.featurette-divider');
        if(divisor.length>0) {
            var aparecerTitulos = function () {
                var desplazamientoActual = $(document).scrollTop() + 200;
                var alturaDivisor1 = divisor[0].offsetTop;
                var alturaDivisor2 = divisor[1].offsetTop;
                var alturaDiviosr3 = divisor[2].offsetTop;

                if (divisor.length > 4) {
                    var alturaDivisor4 = divisor[3].offsetTop;
                }
                if (desplazamientoActual > alturaDivisor1) {
                    $(titulos[0]).slideDown(600);
                    $(textos[0]).slideDown(900);
                }
                if (desplazamientoActual > alturaDivisor2) {
                    $(titulos[1]).slideDown(600);
                    $(textos[1]).slideDown(900);
                }
                if (desplazamientoActual > alturaDiviosr3) {
                    $(titulos[2]).slideDown(600);
                    $(textos[2]).slideDown(900);
                }
                if (divisor.length > 4) {
                    if (desplazamientoActual > alturaDivisor4) {
                        $(titulos[3]).slideDown(600);
                        $(textos[3]).slideDown(900);
                    }
                }

            };
            aparecerTitulos();
        }


    $(window).scroll(function(){
        if(divisor.length>0){
        aparecerLogo();
        aparecerTitulos();
        }
    });


    //AJUSTE H1
    var ajusteFontSizeTitulo = function () {

        var textoh1 = $("h1");
        var anchoPantalla=$(window).width();
        anchoPantalla = anchoPantalla/15;
        $(textoh1[0]).css("font-size",anchoPantalla);

    };
    ajusteFontSizeTitulo();

    $(window).resize(function () {
        ajusteFontSizeTitulo();
    });





});