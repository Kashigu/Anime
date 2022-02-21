<?php
include_once("includes/body.inc.php");
top(EPISODES);
$id=intval($_GET['id']);
$sql = "Select * from episodios where episodioAnimeId=".$id;



?>

    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 anime__details__btn ">
                    <form action="index.php">
                        <div class="col-lg-4 mt-3 ">
                            <h5 style="color: white" class="mt-2">Name of Episodes</h5>
                            <input style="margin-right:10px; width:500px; height: 50px; color: white; background-color: #0b0c2a;"
                                   type="text" id="search">
                        </div>
                        <button onclick="location.href='anime-details.php?id=<?php echo $id ?>'"class="follow-btn" style="position: relative; left: 1036px;" type="button">Back</button>
                    </form>
                </div>
                <div class="col-lg-12 mt-3" id="tableContent">
                </div>
            </div>
        </div>
    </section>

    <!-- Modal do Eliminar -->
    <div class="modal fade" id="staticBackdropDele" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data" class="contact-form">
                    <input type="hidden" value="<?php echo $id ?>" name="id" id="id">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Episode</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <span id="idEpisodes"></span>


                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-7 meio">
                            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-lg-5 meio">
                            <button onclick="DeleteTableEpisodes();" type="button" class="btn btn-danger mt-2">Delete</button>
                        </div>
                    </div>
            </div>
            <input type="hidden" id="ImagemID">
            </form >
        </div>
    </div>


    <!-- Modal do Editar-->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="confirmaEditaImagem.php" class="contact-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $id ?>" name="id" id="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarlabel">Edit Episode</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="modal-body">
                            <div class="col-lg-6 mt-3 meio">
                                <input type="text" id="imagemNome" name="imagemNome">
                            </div>
                            <div class="col-lg-6 mt-3 meio">
                                <input type="file" id="imagemImagem" name="imagemImagem">
                            </div>
                            <input type="hidden" id="imagemId" name="imagemId">
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <div class="col-lg-7 meio">
                            <button type="button" class="btn btn-dark mt-2" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-lg-5 meio">
                            <button
                            <button  type="submit" class="btn btn-danger mt-2">Change</button>
                            <!-- onclick="EditarTableCategorias();"-->
                        </div>

                </form>
            </div>
        </div>
    </div>
    </div>

<?php
bot(EPISODES,$id);
?>