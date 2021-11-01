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
                        <h5 style="color: white" class="mt-2">Name of Genres</h5>
                        <input style="margin-right:10px; width:500px; height: 50px; color: white; background-color: #0b0c2a;"
                               type="text" id="search">
                    </div>
                    <button class="follow-btn" style="position: relative; left: 1036px;" type="submit">Back</button>
                </form>
            </div>
            <div class="col-lg-12 mt-3" id="tableContent">
            </div>
        </div>
    </div>
</section>

<!-- Modal do Adicionar -->
<div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="adicionarlabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #0b0c2a">
            <form class=contact-form method=post enctype=multipart/form-data>

                <div class="modal-header">
                    <h5 style="color: white" class="modal-title" id="adicionarlabel">Add New Genre</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: red" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6 mt-3 meio">

                            <input type=text id="nomeCategoria" name="nomeCategoria" placeholder='Add New Genre'><br>

                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-3">
                        <button onclick="addTableCategorias();" type="button" id="salvar" class="btn btn-primary">
                            Add
                        </button>
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
        <div class="modal-content" style="background: #0b0c2a">
            <form method="post" enctype="multipart/form-data" class="contact-form">

                <div class="modal-header">
                    <h5 style="color: white" class="modal-title" id="staticBackdropLabel">Delete Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: red" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <span style="color: white" id="idCategoria"></span>


                </div>
                <div class="modal-footer">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-3">
                        <button onclick="DeleteTableCategorias();" type="button" class="btn btn-danger">Delete
                        </button>
                    </div>
                </div>
                <input type="hidden" id="CategoriaID">
            </form>
        </div>
    </div>
</div>


<!-- Modal do Editar-->
<div style="" class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarlabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #0b0c2a">
            <form action="confirmaEditaCategoria.php" class="contact-form" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 style="color: white" class="modal-title" id="editarlabel">Edit Genre</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: red" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="col-lg-6 mt-3 meio">
                            <input type="text" id="categoriaName" name="categoriaName">
                        </div>
                        <input type="hidden" id="categoriaId" name="categoriaId">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-3">
                        <button onclick="EditarTableCategorias();" type="button" class="btn btn-danger">Change
                        </button>
                        <!-- onclick="EditarTableCategorias();"-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
botadmin(CATEGORIAS);
?>
