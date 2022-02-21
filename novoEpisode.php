<?php
include_once("includes/body.inc.php");
top(GESTAO);

$id = intval($_GET['id']);

?>
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="section-title">
                                    <h4>New Episode </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 ">



                        <form action="confirmarNovoEpisode.php" class="contact-form" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $id ?>" name="id">
                            <div class="row">
                                <div class="col-lg-6 mt-4">
                                    <label style="color: #ffffff;">Name:</label>
                                    <span id="ErroEN"></span>
                                    <input type="text" name="nomeEng" id="nomeEng"
                                           placeholder="Name">
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label style="color: #ffffff;">Episode Number:</label>

                                    <input type="text" name="episodeNumber" id="episodeNumber"
                                           placeholder="Episode Number">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <?php if (isset($_GET['error'])){?>
                                    <p style="color:white"><?=$_GET['error']?></p>
                                    <?php } ?>
                                    <label style="color: #ffffff;">Episode URL:</label>

                                    <input style="color: white" type="file" name="episodeURL"
                                           id="episodeURL">
                                </div>

                                <div class="col-lg-4 mt-3 anime__details__btn">
                                    <button class="follow-btn" style="position: relative; left: 1005px;"
                                            type="submit">Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
bot();
?>
