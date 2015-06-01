    $(document).ready(function(){
                                    
            var consulta;

                                                                                                        
            //comprobamos si se pulsa una tecla
            $("#buscar").keyup(function(e){
                                         
                  //obtenemos el texto introducido en el campo de búsqueda
                  consulta = $("#buscar").val();
                                                                               
                  //hace la búsqueda
                                                                                      
                  $.ajax({
                        type: "POST",
                        url: "busca.php",
                        data: "b="+consulta,
                        dataType: "html",

                        error: function(){
                              alert("error petición ajax");
                        },
                        success: function(data){                                                   
                              $("#resultados").empty();
                              $("#resultados").append(data);
                                                                 
                        }
                  });
                                                                                      
                                                                               
            });
                                                                       
    });