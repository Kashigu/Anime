<?php
include_once("includes/body.inc.php");
top(PROCURAR);

if (isset ($_GET['txt'])) {
    $nome = addslashes($_GET['txt']);
} else {
    $nome = '';
}
?>

?>
    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-7 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Animes</h4>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Order by:</p>
                                        <select>
                                            <option value="">Choose Option</option>
                                            <option value="">A-Z</option>
                                            <option value="">Z-A</option>
                                            <option value="">Recently Added</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $sql = "select * from Anime";
                            $resultAnime = mysqli_query($con, $sql);
                            while ($dadosAnime = mysqli_fetch_array($resultAnime)) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="anime-details.php?id=<?php echo $dadosAnime['animeId'] ?>">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                             data-setbg="<?php echo $dadosAnime['animeImagemURL'] ?>">
                                            <?php
                                            $sql1 = "Select count(*) as n from episodios where episodioAnimeId=" . $dadosAnime['animeId'];
                                            $resultadoEpisodios = mysqli_query($con, $sql1);
                                            $dadosEp = mysqli_fetch_array($resultadoEpisodios);
                                            ?>
                                            <div class="ep"><?php echo $dadosEp['n'] ?> /
                                                <?php
                                                $sql = "select * from episodios where episodioAnimeId=" . $dadosAnime['animeId'];
                                                $resultep = mysqli_query($con, $sql);
                                                $dadosip = mysqli_fetch_array($resultep);
                                                if (mysqli_affected_rows($con) == '')
                                                    echo $dadosAnime['animeTotalEpisodes'];
                                                else
                                                    echo $dadosAnime['animeTotalEpisodes'] ?> </div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <?php
                                                $sql = "select * from animeCategorias inner join Anime on categoriaAnimeId = animeId
                                                                inner join Categorias on animeCategoriaId = categoriaId where animeId=" . $dadosAnime['animeId'];
                                                $resultCategorias = mysqli_query($con, $sql);
                                                while ($dadosCategorias = mysqli_fetch_array($resultCategorias)) {
                                                    ?>
                                                    <li><?php echo $dadosCategorias['categoriaName'] ?></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <h5><?php echo $dadosAnime['animeName'] ?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="product__pagination">
                <a href="#" class="current-page">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="product__sidebar">
                <div class="product__sidebar__view">
                    <div class="section-title">
                        <h5>Top Views</h5>
                    </div>
                    <div class="filter__gallery">
                        <?php
                        $sql = "select * from anime";
                        $resultANIMES = mysqli_query($con, $sql);
                        $maximo = 0;
                        while ($dadosANIMES = mysqli_fetch_array($resultANIMES)) {
                            ?>
                            <div class="product__sidebar__view__item set-bg mix day years"
                                 data-setbg="<?php echo $dadosANIMES['animeImagemURL'] ?>">
                                <?php
                                $sql1 = "Select count(*) as n from episodios where episodioAnimeId=" . $dadosANIMES['animeId'];
                                $resultadoEpisodios = mysqli_query($con, $sql1);
                                $dadosEp = mysqli_fetch_array($resultadoEpisodios);
                                ?>
                                <div class="ep"><?php echo $dadosEp['n'] ?> / <?php
                                    $sql = "select * from episodios where episodioAnimeId=" . $dadosANIMES['animeId'];
                                    $resultep = mysqli_query($con, $sql);
                                    $dadosip = mysqli_fetch_array($resultep);
                                    if (mysqli_affected_rows($con) == '')
                                        echo $dadosANIMES['animeTotalEpisodes'];
                                    else
                                        echo $dadosANIMES['animeTotalEpisodes'] ?></div>
                                <div class="view"><i class="fa fa-eye"></i> <?php echo 99999//$dadosANIMES['redeTipe'] ?></div>
                                <h5>
                                    <a href="anime-details.php?id=<?php echo $dadosANIMES['animeId'] ?>"><?php echo $dadosANIMES['animeName'] ?></a>
                                </h5>
                            </div>
                            <?php
                            $maximo++;
                        }
                        ?>
                    </div>
                </div>
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>New Comment</h5>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="img/sidebar/comment-1.jpg" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="img/sidebar/comment-2.jpg" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="img/sidebar/comment-3.jpg" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="img/sidebar/comment-4.jpg" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Monogatari Series: Second Season</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
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