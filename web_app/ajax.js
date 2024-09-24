setInterval(function(){ 
	//Funcões para os pedidos assincronos
    myfunction('humidade', 'valor', 'js-humidade');
	myfunction('humidade', 'hora', 'js-hora-humidade');
	myfunction('temperatura', 'valor', 'js-temperatura');
	myfunction('temperatura', 'hora', 'js-hora-temperatura');
	myfunction('incapacitados', 'valor', 'js-incapacitados');
	myfunction('incapacitados', 'hora', 'js-hora-incapacitados');
	myfunction('lugares', 'valor', 'js-lugares');
	myfunction('lugares', 'hora', 'js-hora-lugares');
	myfunction('movimento', 'valor', 'js-movimento');
	myfunction('movimento', 'hora', 'js-hora-movimento');
	//##########################################################
	myfunction('alarme', 'valor', 'js-alarme');
	myfunction('alarme', 'hora', 'js-hora-alarme');
	myfunction('AC', 'valor', 'js-AC');
	myfunction('AC', 'hora', 'js-hora-AC');
	myfunction('led', 'valor', 'js-led');
	myfunction('led', 'hora', 'js-hora-led');
	myfunction('LCD', 'valor', 'js-LCD');
	myfunction('LCD', 'hora', 'js-hora-LCD');



	   
}, 1000);

//fazer funcao com pedido ajax e no sucesso fazer em loop

function myfunction(param,ficheiro, classElem){
  var save_result = jQuery.ajax({
                url: "api/api.php",
                data: {
				'nome': param,
				'ficheiro': ficheiro
				},
                type: 'GET',
                datatype: 'text/html',
                success: function(data, status) {
                      console.log("dados: ", data);
					  $("." + classElem).html(data);
                }, // End success
                error: function (xhr, ajaxOptions, thrownError) {
                    
                  }
       }); // End load the supplement list
}

//pedido para devolver conteudo todo no json