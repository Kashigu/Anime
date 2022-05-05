<?php
include_once("includes/body.inc.php");
top(ANIMES);
$id = intval($_GET['id']);
$max = 0;
$sql = "select * from users where userid=" . $id;
$resultadoAnime = mysqli_query($con, $sql);
$dadosAnime = mysqli_fetch_array($resultadoAnime);
?>
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" style="width: 300px; height: 300px"
                             data-setbg="<?php echo $dadosAnime['userImageURL'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-8" style="margin-left: 50px">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?php echo $dadosAnime['userName'] ?></h3>
                            </div>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='watching'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Watching:</span> <?php echo $dados['n'] ?></li>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='completed'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Completed:</span> <?php echo $dados['n'] ?></li>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='onhold'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>On Hold:</span> <?php echo $dados['n'] ?></li>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='dropped'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Dropped:</span> <?php echo $dados['n'] ?></li>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='plan'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Plan to Watch:</span> <?php echo $dados['n'] ?></li>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='like'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Liked:</span> <?php echo $dados['n'] ?></li>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='favorite'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Favorite:</span> <?php echo $dados['n'] ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <?php
                                            $sql = "Select count(*) as n from users inner join redes on redeUserId=userId
		                                            inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe!='favorite' and redeTipe!='like'";
                                            $resultado = mysqli_query($con, $sql);
                                            $dados = mysqli_fetch_array($resultado);
                                            ?>
                                            <li><span>Total Animes:</span> <?php echo $dados['n'] ?></li>
                                            <li><span>Rating:</span> media de rank dado</li>
                                        </ul>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['id'])){
                                        if ($_SESSION['id'] == $id) {
                                            ?>
                                            <div class="anime__details__btn" style="margin-left: 500px">
                                                <a href="DefPerfil.php?id=<?php echo $dadosAnime['userId'] ?>"
                                                   class="follow-btn">Settings</a>
                                                <a href="#" data-toggle="modal"
                                                   data-target="#sair" class="follow-btn">Logout</a>
                                            </div>
                                            <?php
                                        }
                                    }elseif(!isset($_SESSION['id'])){
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comments</h5>
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
                            <button type="submit"><i class="fa fa-location-arrow"></i> Comment</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5><a style="color: white"
                                   href="perfil-details.php?id=<?php echo $dadosAnime['userId'] ?>"> Favorite Animes</a>
                            </h5>
                        </div>
                        <?php
                        $sql = "select * from users inner join redes on redeUserId=userId
		                        inner join Anime on redeAnimeId=animeId where userid=" . $id . " and redeTipe='favorite'";
                        $resultadoAnime = mysqli_query($con, $sql);
                        while ($dadosAnime = mysqli_fetch_array($resultadoAnime) and $max < 4) {
                            $max++;
                            ?>
                            <div class="product__sidebar__view__item set-bg"
                                 data-setbg="<?php echo $dadosAnime['animeImagemURL'] ?> ">
                                <h5>
                                    <a href="anime-details.php?id=<?php echo $dadosAnime['animeId'] ?>"><?php echo $dadosAnime['animeName'] ?></a>
                                </h5>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
bot();
?>