$(function() {
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
        url: "ajax/shopping_ajax/vista_usuario.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#loader").html("Cargando...");
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn("slow");
            $("#loader").html("");
        },
    });
}
$("#editProductModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal

    var nomap = button.data("nomap"); // crea la variable lote_edit
    $("#nomap_edit").val(nomap);
    var link = button.data("link"); // crea la variable lote_edit
    $("#link_edit").val(link);
    var disco = button.data("disco"); // crea la variable lote_edit
    $("#disco_edit").val(disco);
    var genero = button.data("genero"); // crea la variable lote_edit
    $("#genero_edit").val(genero);


    var id = button.data("id");
    $("#edit_id").val(id);
});

$("#deleteProductModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data("id");
    $("#delete_id").val(id);
});

$("#edit_product").submit(function(event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "ajax/shopping_ajax/editar_producto.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados").html("Enviando...");
        },
        success: function(datos) {
            $("#resultados").html(datos);
            load(1);
            $("#editProductModal").modal("hide");
        }
    });
    event.preventDefault();
});

$("#add_product").submit(function(event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "ajax/shopping_ajax/guardar_producto.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados").html("Enviando...");
        },
        success: function(datos) {
            $("#resultados").html(datos);
            load(1);
            $("#addProductModal").modal("hide");
        }
    });
    event.preventDefault();
});

$("#delete_product").submit(function(event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "ajax/shopping_ajax/eliminar_producto.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados").html("Enviando...");
        },
        success: function(datos) {
                $("#resultados").html(datos);
                load(1);
                $("#deleteProductModal").modal("hide");
            } //!aca quite una coma igual que en add y en edit
    });
    event.preventDefault();
});