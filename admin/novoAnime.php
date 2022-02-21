<?php
include_once("../includes/body.inc.php");
topadmin(GESTAO)
?>
<link href="../summernote.css" rel="stylesheet">
<script src='../js/tinymce/tinymce.min.js'></script>
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->


<script>

    tinymce.init({
        selector: 'textarea#myTextarea',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
        link_list: [
            {title: 'My page 1', value: 'https://www.codexworld.com'},
            {title: 'My page 2', value: 'https://www.xwebtools.com'}
        ],
        image_list: [
            {title: 'My page 1', value: 'https://www.codexworld.com'},
            {title: 'My page 2', value: 'https://www.xwebtools.com'}
        ],
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Some class', value: 'class-name'}
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {text: 'My text'});
            }
            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {alt: 'My alt text'});
            }
            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg'});
            }
        },
        templates: [
            {
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'},
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
    });
</script>
<!-- Product Section Begin -->
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="section-title">
                                    <h4>New Anime</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="col-lg-12 ">
                                <form action="confirmarNovoAnime.php" class="contact-form" method="post"
                                      enctype="multipart/form-data" id="frmFazer">
                                    <input type="hidden" value="<?php //echo $id ?>" name="id">
                                    <div class="row">
                                        <?php
                                        $sql = "select * from categorias order by categoriaName";
                                        $resultCategorias = mysqli_query($con, $sql);
                                        while ($dadosCategorias = mysqli_fetch_array($resultCategorias)) {
                                            ?>
                                            <div class="col-lg-4 ">

                                                <label name="categoria" class="check" id="categoria"
                                                       style="color: white">
                                                    <input type="checkbox" name="categoria[]"
                                                           value="<?php echo $dadosCategorias['categoriaId'] ?>">
                                                    <span class="checkmark"></span>
                                                    <span type="checkbox"
                                                          name="categoria2[]">  <?php echo $dadosCategorias['categoriaName'] ?>
                                </span> </label>

                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="col-lg-6 mt-4">
                                            <label style="color: #ffffff;">Name in English:</label>
                                            <span id="ErroEN"></span>
                                            <input type="text" name="nomeEng" id="nomeEng"
                                                   placeholder="Name in English">
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label style="color: #ffffff;">Name in Japanese:</label>
                                            <span id="ErroJA"></span>
                                            <input type="text" name="nomeJap" id="nomeJap"
                                                   placeholder="Name in Japanese">
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label style="color: #ffffff;">Anime Image (230x325): </label>
                                            <span id="Eimage"></span>
                                            <input type="file" style="color: white" name="image" id="image">

                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label style="color: #ffffff;">Anime First Page Image (1140x514): </label>
                                            <span id="EFimage"></span>
                                            <input type="file" style="color: white" name="Fimage" id="Fimage">

                                        </div>
                                        <div class="col-lg-12 mt-4">
                                <textarea name="reviewTexto" id="myTextarea"
                                          placeholder="Synopsis"></textarea>
                                        </div>

                                        <div class="col-lg-12 mt-4">
                                            <label style="color: #ffffff;">Total Episodes:</label>
                                            <span id="ErroEP"></span>
                                            <input type="text" name="totalEp" id="totalEp"
                                                   placeholder="Total Episodes">
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
botadmin();
?>
