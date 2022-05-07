$(function () {
  load(1); // este es el buscador de la variable
});
function load(page) {
  var query = $("#q").val();
  var per_page = 10;
  var parametros = {
    action: "ajax",
    page: page,
    query: query,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/agg_ajax/vista_usuario.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando...");
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
// $("#add_product").submit(function (event) {
//   var parametros = $(this).serialize();
//   $.ajax({
//     type: "POST",
//     url: "ajax/agg_ajax/guardar_producto.php",
//     data: parametros,
//     beforeSend: function (objeto) {
//       $("#resultados").html("Enviando...");
//     },
//     success: function (datos) {
//       $("#resultados").html(datos);
//       load(1);
//       $("#addProductModal").modal("hide");
//     }
//   });
//   event.preventDefault();
// });
$("#editProductModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  
  var nomap = button.data("nomap"); // crea la variable lote_edit
  $("#nomap_edit").val(nomap);

 
  var genero = button.data("genero"); // crea la variable lote_edit
  $("#genero_edit").val(genero);



  var inst = button.data("inst"); // crea la variable lote_edit
  $("#inst_edit").val(inst);
  var link = button.data("link"); // crea la variable lote_edit
  $("#link_edit").val(link);

  var id = button.data("id");
  $("#edit_id").val(id);
});

$("#deleteProductModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("id");
  $("#delete_id").val(id);
});

$("#edit_product").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/agg_ajax/editar_producto.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados").html("Enviando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);
      load(1);
      $("#editProductModal").modal("hide");
    }
  });
  event.preventDefault();
});



$("#delete_product").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/agg_ajax/eliminar_producto.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados").html("Enviando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);
      load(1);
      $("#deleteProductModal").modal("hide");
    }//!aca quite una coma igual que en add y en edit
  });
  event.preventDefault();
});
