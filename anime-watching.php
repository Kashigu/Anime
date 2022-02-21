<?php
include_once("includes/body.inc.php");
top(ANIMES);

if (isset ($_GET['episodioId'])) {
    $episodioId = intval($_GET['episodioId']);
} else {
    $episodioId = -1;
}
$id = intval($_GET['id']);
$sql = "select * from animeCategorias inner join Anime on categoriaAnimeId = animeId
        inner join Categorias on animeCategoriaId = categoriaId where animeId=" . $id;
$resultadoAnime = mysqli_query($con, $sql);
$dadosAnime = mysqli_fetch_array($resultadoAnime);
?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <a href="anime-details.php?id=<?php echo $id ?>">
                                <h3><?php echo $dadosAnime['animeName'] ?></h3></a>
                            <span style="position: absolute; margin-top: 0px"><?php echo $dadosAnime['animeJapaneseName'] ?></span>
                            <?php
                            $sql2 = "Select * from episodios where episodioAnimeId=$id and episodioId=" . $episodioId;
                            $resultadoNomes = mysqli_query($con, $sql2);
                            $dadosNome = mysqli_fetch_array($resultadoNomes);
                            ?>
                            <h5 style="color: white; position: absolute; margin-top: 45px"><?php echo $dadosNome['episodioName'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad mt-3 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player">
                            <source src="<?php echo $dadosNome['episodioURL'] ?>" type="<?php echo $dadosNome['episodioTipe'] ?>"/>
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default/>
                        </video>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Episodes</h5>
                        </div>
                        <?php
                        $sql1 = "Select * from episodios where episodioAnimeId=" . $id;
                        $resultadoEpisodios = mysqli_query($con, $sql1);
                        while ($dadosEpisodios = mysqli_fetch_array($resultadoEpisodios)) {

                            ?>
                        <a href="anime-watching.php?id=<?php echo $id ?>&episodioId=<?php echo $dadosEpisodios['episodioId'] ?>"><?php echo $dadosEpisodios['episodioNr'] ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-2.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-3.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-4.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-5.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-6.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="#">
                            <textarea placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
bot();
?>