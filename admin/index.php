<?php
include_once("../includes/body.inc.php");
topadmin(HOME)
?>
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
                                    <h4>Site Management</h4>
                                </div>
                            </div>
                            <div class="col-lg-5 ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="product__item">
                                <div class="product__item">
                                    <a style="color: #ffffff;font-weight: 700;line-height: 26px;" href="animes.php">
                                        <div class="product__item__pic set-bg"
                                             data-setbg="../imagens/animes.jpg">
                                            <?php

                                            $sql2 = "Select count(*) as n
                                                     from anime";
                                            $resultado = mysqli_query($con, $sql2);
                                            $dados = mysqli_fetch_assoc($resultado);
                                            ?>
                                            <div class="ep"><?php echo $dados['n'] ?></div>
                                        </div>
                                        <h5 class="mt-2">
                                            Animes</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="product__item">
                                <div class="product__item">
                                    <a style="color: #ffffff;font-weight: 700;line-height: 26px;" href="categorias.php">
                                        <div class="product__item__pic set-bg"
                                             data-setbg="../imagens/categorias.jpg">
                                            <?php

                                            $sql2 = "Select count(*) as n
                                                     from categorias";
                                            $resultado = mysqli_query($con, $sql2);
                                            $dados = mysqli_fetch_assoc($resultado);
                                            ?>
                                            <div class="ep"><?php echo $dados['n'] ?></div>
                                        </div>
                                        <h5 class="mt-2">
                                            Genres</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="product__item">
                                <div class="product__item">
                                    <a style="color: #ffffff;font-weight: 700;line-height: 26px;"
                                       href="utilizadores.php">
                                        <div class="product__item__pic set-bg"
                                             data-setbg="../imagens/animecommu.jpg">
                                            <?php

                                            $sql2 = "Select count(*) as n
                                                     from users";
                                            $resultado = mysqli_query($con, $sql2);
                                            $dados = mysqli_fetch_assoc($resultado);
                                            ?>
                                            <div class="ep"><?php echo $dados['n'] ?></div>
                                        </div>
                                        <h5 class="mt-2">
                                            Community</a>
                                    </h5>
                                </div>
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
