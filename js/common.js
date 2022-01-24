function mostrarSearch() {
    $('#Search').toggle();
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
//////////////////////////////////////////////////////////// Animes /////////////////////////////////////////////

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


///////////////////////////////////////// Login /////////////////////////////////////

function entrar() {
    let emails = $('#emails').val();
    let password = $('#password').val();
    let erro = false;

    if ($('#password').val() == '') {
        erro = true;

    }
    if ($('#emails').val() == '') {
        erro = true;

    } else {
        $.ajax({
            url: "AJAX/AJAXConfirmaLogin.php",
            type: "post",
            data: {
                email: emails,
                password: password
            },
            success: function (result) {
                if ((result) == 1) {
                    erro = true;
                    $('#frmConfirma').submit();

                } else if (!erro) {

                    alert('Misentered data');
                }
            }
        });
    }
}

//////////////////////////////////////////////// Register //////////////////////////////////////////////////

function valido() {
    let emails = $('#emails').val();
    let erro = false;
    if ($('#password').val() == '' || ($('#password').val() != ($('#Conpassword').val()))) {
        erro = true;
    }
    if ($('#Conpassword').val() == '0' || ($('#Conpassword').val() != ($('#password').val()))) {
        erro = true;
        $('#errorMsgS').html('Wrong Password');
    }
    if ($('#name').val() == '') {
        erro = true;
    }
    if ($('#emails').val() == '') {
        erro = true;
    } else {
        $.ajax({
            url: "AJAX/AJAXVerifyEmail.php",
            type: "post",
            data: {
                txt: emails
            },
            success: function (result) {
                if (parseInt(result) == 1) {
                    erro = true;
                    $('#errorMsg').html('Already Taken');
                } else if (!erro) {

                    $('#frmRegisto').submit();
                }
            }
        });

    }
}

///////////////////////////////////////// Users //////////////////////////////////////////////

function fillTableUtilizador(txt = '') {
    $.ajax({
        url: "../AJAX/AJAXFillUtilizador.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });

}

function DeleteUtilizador(id) {  // abre o modal e injecta o ID
    $("#UserID").html(id);
    $.ajax({
        url: "../AJAX/AJAXGetNameUtilizador.php",
        type: "post",
        data: {
            idUser: id
        },
        success: function (result) {

            $("#idUser").html('Confirma que deseja eliminar o Utilizador: ' + result + '?');

            $("#staticBackdropDele").modal("toggle");
            //fillTableUtilizador();
        }
    })
}

function DeleteTableUtilizador() { // vai buscar o ID injectado e faz o DELETE
    $('#staticBackdropDele').modal('toggle');
    $.ajax({
        url: "../AJAX/AJAXDeleteUser.php",
        type: "post",
        data: {
            user: parseInt($('#UserID').html())
        },
        success: function (result) {
            fillTableUtilizador();
        }
    });
}

/////////////////////////////////////////// EPISODES /////////////////////////////////////////

function fillTableEpisodes(txt = '', id = -1) {

    $.ajax({
        url: "AJAX/AJAXFillEpisodios.php",
        type: "post",
        data: {
            txt: txt,
            id: id
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });

}

function eliminaEpisodes(id) {  // abre o modal e injecta o ID
    $("#EpisodeID").html(id);
    $.ajax({
        url: "AJAX/AJAXGetNameEpisodios.php",
        type: "post",
        data: {
            idEpisode: id
        },
        success: function (result) {

            $("#idEpisode").html('Are you sure you want to Delete: ' + result + '?');

            $("#staticBackdropDele").modal("toggle");
            //fillTableImagens();

        }
    })
}

function DeleteTableEpisodes() {
    $('#staticBackdropDele').modal('toggle');
    $.ajax({
        url: "AJAX/AJAXDeleteEpisodios.php",
        type: "post",
        data: {
            episode: parseInt($('#EpisodeID').html())
        },
        success: function (result) {
            fillTableEpisodes('', result);
        }
    });


}