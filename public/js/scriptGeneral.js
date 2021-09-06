/* Inicio Script de Blog */
//Boton de Agregar POST (Aparece y Desaparece el Formulario)
$(document).ready(function(){ 
   //
        $.get("verBlog", function(htmlexterno){
        $("#mensaje").html(htmlexterno);
      });

           $("#btnAgregarFormPost").on('click', function(e){
     
      $.get("verBlog", function(htmlexterno){
        $("#mensaje").html(htmlexterno);
      });
   });
   //
       enviarDatos();
});

function enviarDatos(){

   $("#parrafos").on("submit", function(e){
      e.preventDefault();
      $.ajax({
         "method" : "POST",
         "url" : "agregarParrafos",
         "data" : $(this).serialize()
      }).done(function(info){
         //$("#mensaje").addClass("mostrar");
         $("#mensaje").html(info);
      });
      $.get("verBlog", function(htmlexterno){
        $("#mensaje").html(htmlexterno);
      });
   });
}
/* Fin Script de Blog */

/* Inicio Script Agregar Venta
        $(document).ready(function(){
        var i = 1;
        $('#agregarmas').click(function () {
            i++;
            var valorfact = document.getElementById('valorfact').value;
            var fecha_ventas = document.getElementById('fecha_venta').value;
            $('.productos_tecnologia').append(
            '<input type="hidden" name="valorfact[]" value="'+valorfact+'">'+
            '<input type="hidden" name="fecha_venta[]" value="'+fecha_ventas+'">'+
            '<div class="col-sm-12 col-md-4 text-center input_producto repetido'+i+'"><input id="code" type="text" name="codigo[]" placeholder="Codigo Producto"></div>'+
            '<div class="col-sm-12 col-md-4 text-center input_producto repetido'+i+'"><input type="number" id="cantidad" name="cantidad[]" placeholder="Cantidad"></div>'+
            '<div class="col-sm-12 col-md-4 text-center repetido'+i+'"><a type="button" name="remove" id="'+i+'" class=" btn_remove btn btn-danger" style="color:white;">X</a></div>'
            );
        });
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
           $('.repetido'+ id).remove();
        });
    });
 Fin Script Agregar Venta*/

/* Inicio Script Agregar Producto*/
        $(document).ready(function(){
        var i = 1;
        $('#agregar_producto').click(function () {
            i++;
            var cantidadEx = document.getElementById('cantidad_Ex').value;
            $('.add_productos').append(
                '<input type="hidden" class="input_productos delete'+i+'" name="cantidad_Ex[]" value="'+cantidadEx+'">'+  
                '<div class="col-12 text-center input_productos delete'+i+'"><input type="text" name="codigo[]" placeholder="Codigo del Producto"></div>'+
                '<div class="col-12 text-center input_productos delete'+i+'"><input type="text" name="descripcion[]" placeholder="Descripcion"></div>'+
                '<div class="col-12 text-center input_productos delete'+i+'"><input type="number" name="vneto[]" placeholder="Valor Neto"></div>'+
                '<div class="col-12 text-center input_productos delete'+i+'"><input type="number" name="vunitario[]" placeholder="Valor Unitario"></div>'+
                '<div class="col-12 text-center input_productos delete'+i+'"><a type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="color:white;">X</a></div><br class="delete'+i+'">'
             );
        });
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
           $('.delete'+id).remove();
        });
    });
/* Fin Script Agregar Producto */