function mostrarSearch() {
    $('#Search').toggle();
}

function fillTableAnimes(txt = '') {

    $.ajax({
        url: "../AJAX/AJAXFillAnimes.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}
//-------------------------------------------- Categorias ---------------------------------------------------------//
function fillTableCategorias(txt = '') {

    $.ajax({
        url: "../AJAX/AJAXFillCategorias.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });
}

function eliminaCategorias(id) {  // abre o modal e injecta o ID
    $("#CategoriaID").html(id);
    $.ajax({
        url: "../AJAX/AJAXGetNameCategorias.php",
        type: "post",
        data: {
            idCategoria: id
        },
        success: function (result) {

            $("#idCategoria").html('Are you sure you want to Delete: ' + result + ' ?');

            $("#staticBackdropDele").modal("toggle");
            //fillTableCategorias();
        }
    })
}

function DeleteTableCategorias() {
    $('#staticBackdropDele').modal('toggle');
    $.ajax({
        url: "../AJAX/AJAXDeleteCategorias.php",
        type: "post",
        data: {
            categoria: parseInt($('#CategoriaID').html())
        },
        success: function (result) {
            fillTableCategorias();
        }
    });
}

function addTableCategorias(txt = '') {
    $('#adicionar').modal('toggle');
    $.ajax({
        url: "../AJAX/AJAXAddCategorias.php",
        type: "post",
        data: {
            categoria: $('#nomeCategoria').val()
        },
        success: function (result) {
            fillTableCategorias();
        }
    });
}

function editaCategorias(id) {  // abre o modal e injecta o ID

    /* precisas de ir buscar os dados do distrito para poder escrever no modal*/
    $.ajax({
        url: "../AJAX/AJAXGetNameCategorias.php",
        type: "post",
        data: {
            idCategoria: id
        },
        success: function (result) {
            $("#categoriaName").val(result);
        }
    });
    $("#idCategoria").val(id);
    $("#editar").modal("toggle");
}

function EditarTableCategorias() {
    $('#editar').modal('toggle');
    $.ajax({
        url: "../AJAX/AJAXEditCategorias.php",
        type: "post",
        data: {
            categoria: $("#idCategoria").val(),
            categoriaName: $('#categoriaName').val()
        },
        success: function (result) {
            fillTableCategorias();
        }
    });


}

function eliminaAnime(id) {  // abre o modal e injecta o ID
    $("#AnimeID").html(id);
    $.ajax({
        url: "../AJAX/AJAXGetNameAnimes.php",
        type: "post",
        data: {
            idAnime: id
        },
        success: function (result) {

            $("#idAnime").html('Are you sure you want to Delete: ' + result + ' ?');

            $("#staticBackdropDele").modal("toggle");
            //fillTableCategorias();
        }
    })
}


function DeleteTableAnime() {
    $('#staticBackdropDele').modal('toggle');
    $.ajax({
        url: "../AJAX/AJAXDeleteAnime.php",
        type: "post",
        data: {
            anime: parseInt($('#AnimeID').html())
        },
        success: function (result) {
            fillTableAnimes();
        }
    });

}