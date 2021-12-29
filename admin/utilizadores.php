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
                        <h5 style="color: white" class="mt-2">Name of Users</h5>
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


<!-- Modal do Eliminar -->
<div class="modal fade" id="staticBackdropDele" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #0b0c2a">
            <form class=contact-form method=post enctype=multipart/form-data>

                <div class="modal-header">
                    <h5 style="color: white" class="modal-title" id="staticBackdropLabel">Delete Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: red" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <span style="color: white" id="idUser"></span>

                </div>
                <div class="modal-footer">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-lg-3">
                        <button onclick="DeleteTableUtilizador();" type="button" class="btn btn-danger">Delete
                        </button>
                    </div>
                </div>

                <input type="hidden" id="UserID">
            </form>
        </div>
    </div>
</div>


<?php
botadmin(USERS);
?>
