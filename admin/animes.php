<?php
include_once("../includes/body.inc.php");
topadmin(HOME)
?>
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 anime__details__btn ">
                <form action="index.php">
                    <div class="col-lg-4 mt-3 ">
                        <h5>Nome das Categorias</h5>
                        <input style="margin-right:10px; width:500px; height: 50px; color: white; background-color: #0b0c2a;"
                               type="text" id="search">
                    </div>
                    <button class="follow-btn" style="position: relative; left: 1000px;" type="submit">Voltar</button>
                </form>
            </div>
            <div class="col-lg-12 mt-3" id="tableContent">
            </div>
        </div>
    </div>
</section>

<!-- Modal do Adicionar -->
<div class="modal fade" id="categoria" tabindex="-1" aria-labelledby="categorialabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="confirmaNovaCategoria.php" class=contact-form method=post enctype=multipart/form-data>

                <div class="modal-header">
                    <h5 class="modal-title" id="categorialabel">Adicionar Nova Categoria</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6 mt-3 meio">

                            <input type=text id="nomeCategoria" name=nomeCategoria placeholder='Nome da Categoria'>

                            <input type=file id="imagem" name="imagem">

                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <div class="col-lg-7 meio">
                        <button type="button" class="btn btn-dark mt-2" data-dismiss="modal">Fechar</button>
                    </div>
                    <div class="col-lg-5 meio">
                        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
                        <!--onclick="addTableCategorias();" -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal do Eliminar -->
<div class="modal fade" id="staticBackdropDele" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="contact-form">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Anime</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <span id="idAnime"></span>


                </div>
                <div class="modal-footer">
                    <div class="col-lg-7 meio">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-5 meio">
                        <button
                        <button onclick="DeleteTableAnime();" type="button" class="btn btn-danger mt-2">Delete
                        </button>
                    </div>
                </div>
        </div>
        <input type="hidden" id="AnimeID">
        </form >
    </div>
</div>


<!-- Modal do Editar-->
<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarlabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="confirmaEditaCategoria.php" class="contact-form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarlabel">Editar Categoria</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6 mt-3 meio">
                            <input type="text" id="categoriaNome" name="categoriaNome">
                        </div>
                        <div class="col-lg-6 mt-3 meio">
                            <input type="file" id="categoriaImagem" name="categoriaImagem">
                        </div>
                        <input type="hidden" id="categoriaId" name="categoriaId">
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <div class="col-lg-7 meio">
                        <button type="button" class="btn btn-dark mt-2" data-dismiss="modal">Fechar</button>
                    </div>
                    <div class="col-lg-5 meio">
                        <button
                        <button type="submit" class="btn btn-danger mt-2">Alterar</button>
                        <!-- onclick="EditarTableCategorias();"-->
                    </div>

            </form>
        </div>
    </div>
</div>


<?php
botadmin(ANIMES);
?>
