<?php
include_once("includes/body.inc.php");
top(GESTAO);

$id = intval($_GET['id']);

?>
<link href="summernote.css" rel="stylesheet">
<script src='js/tinymce/tinymce.min.js'></script>

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
                              enctype="multipart/form-data" id="frmFazer">
                            <input type="hidden" value="<?php //echo $id ?>" name="id">
                            <div class="row">
                                <div class="col-lg-6 mt-4">
                                    <label style="color: #ffffff;">Name in English:</label>
                                    <span id="ErroEN"></span>
                                    <input type="text" name="nomeEng" id="nomeEng"
                                           placeholder="Name in English">
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label style="color: #ffffff;">Name in Japanese:</label>

                                    <input type="text" name="nomeJap" id="nomeJap"
                                           placeholder="Name in Japanese">
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label style="color: #ffffff;">Episode URL:</label>

                                    <input style="margin-left: 26px" type="text" name="episodeURL" id="episodeURL"
                                           placeholder="Episode URL">
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label style="color: #ffffff;">Episode Tipe:</label>

                                    <input style="margin-left: 41px" type="text" name="episodeTipe" id="episodeTipe"
                                           placeholder="Episode Tipe">
                                </div>
                                <div class="col-lg-4 mt-3 anime__details__btn">
                                    <button class="follow-btn" style="position: relative; left: 1005px;" name="save"
                                            type="submit">Create
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 ">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>

<?php
bot();
?>
