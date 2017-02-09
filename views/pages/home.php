        <div class="content-wrapper">

            <div class="template-slider main-slider" data-fade="true" data-autoplay="true" data-autoplay-speed="6000" data-pause-on-hover="true" data-dots="true" data-arrows="false" data-infinite="true" data-speed="1200">
                <ul class="clean-list slides-list">

                  <li class="slide">

                      <img src="assets/hero-bg-4.jpg" alt="slide background" class="slide-bg" />
                      <div class="slide-content">
                          <div class="container">
                              <h1 class="slide-title">Patisserie à la mûre</h1>
                              <p class="slide-description">Ce dessert est une vrai merveille !<br> Faites chauffer vos papilles.</p>

                              <div class="slide-buttons">
                                  <a href="?controller=pages&action=error" class="btn btn-default">
                                      <span class="text">En savoir plus</span>
                                  </a>

                                  <a href="?controller=recipes&action=add" class="btn btn-simplified">
                                      <span class="text">Soumettre une recette</span>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </li>
                    <li class="slide">
                        <img src="assets/hero-bg-2.jpg" alt="slide background" class="slide-bg" />
                        <div class="slide-content">
                            <div class="container">
                                <h1 class="slide-title">Saumon à l'échalotte</h1>
                                <p class="slide-description">Cette recette express de saumon fera l'unanimité à coup sûr !<br>Découvrez ou redécouvrez le saumon sous un autre jour.</p>

                                <div class="slide-buttons">
                                    <a href="?controller=pages&action=error" class="btn btn-default">
                                        <span class="text">En savoir plus</span>
                                    </a>

                                    <a href="?controller=recipes&action=add" class="btn btn-simplified">
                                        <span class="text">Soumettre une recette</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <!-- Article & Sidebar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                      <h1 class="section-title">La recette de la semaine</h1>
                        <article class="recipe-article">
                            <div class="recipe-meta">
                                <p class="categories">
                                    <a href="?controller=pages&action=error">- Dessert -</a>
                                </p>

                                <h2 class="recipe-title">
                                    <a href="?controller=pages&action=error">Fraises au sucre</a>
                                </h2>
                            </div>

                            <div class="recipe-cover">
                                <div class="cover">
                                    <a href="?controller=pages&action=error">
                                        <img src="assets/featured-recipe.jpg" alt="featured recipe cover" />
                                    </a>
                                </div>

                                <ul class="clean-list recipe-details">
                                    <li class="detail">
                                        <i class="icon-time"></i>
                                        <span class="value">5 minutes</span>
                                    </li>

                                    <li class="detail">
                                        <i class="icon-chef"></i>
                                        <span class="value">Facile</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="recipe-excerpt">
                              <p>Les fraises au sucre sont très simple à faire, il suffit de quelques fraises et un paquet de sucre en poudre !<br><br>Bon appétit !</p>
                              <a href="?controller=pages&action=error" class="btn btn-simplified">En savoir plus</a>
                            </div>

                            <div class="recipe-footer">
                                <div class="recipe-short-meta">
                                    <span class="date">22 Janvier 2017,</span>
                                    <span class="author">par <a>BabaGuerrier</a></span>
                                </div>

                                <ul class="clean-list share-recipe social-block">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-google-plus"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                                </ul>
                            </div>
                        </article>

                        <div class="recipe-articles-block">
                          <h1 class="section-title">Les recettes au top</h1>
                            <div class="row">

                              <?php
                              foreach ($popularRecipe as $key => $popular) {
                              ?>
                                <div class="col-sm-6 col-md-4">
                                    <article class="recipe-article">
                                        <div class="recipe-cover">
                                            <div class="cover">
                                                <a href="?controller=recipes&action=detailRecipe&id=<?php echo $popular["id"]?>">
                                                    <img src="assets/<?php echo $popular["categories"][0] ?>.jpg" alt="featured recipe cover" />
                                                </a>
                                            </div>
                                            <ul class="clean-list recipe-details">
                                                <li class="detail">
                                                    <i class="icon-time"></i>
                                                    <span class="value"><?php echo $popular["time"]." minutes" ?></span>
                                                </li>

                                                <li class="detail">
                                                    <i class="icon-chef"></i>
                                                    <span class="value"><?php echo $popular["difficulty"] ?></span>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="recipe-meta">

                                            <p class="categories">
                                                <a href="">-<?php foreach ($popular["categories"] as $k => $category) {
                                                  echo $category."-";
                                                }?></a>
                                            </p>

                                            <h3 class="recipe-title">
                                                <a href="?controller=recipes&action=detailRecipe&id=<?php echo $popular["id"]?>"><?php echo $popular["name"] ?></a>
                                                <br>
                                                <?php
                                                $note = $popular['note'];
                                                  while($note != 0) {
                                                    echo "<i style='background: -webkit-linear-gradient(left,#f58a00 0,#f6d640 100%);-webkit-text-fill-color: transparent;-webkit-background-clip: text; color: #f6c935;' class='icon-star'></i>";
                                                    $note--;
                                                  }
                                                ?>
                                            </h3>

                                            <div class="recipe-footer">
                                            <div class="recipe-short-meta">
                                                <span class="date"><?php echo $popular["date"] ?></span>
                                                <span class="author">par <a href=""><?php echo $popular["author"] ?></a></span>
                                            </div>

                                        </div>

                                        </div>
                                    </article>
                                </div>

                                <?php } ?>



                            </div>

                            <div class="align-center btn-wrapper">
                                <a href="?controller=recipes&action=all" class="btn btn-default">
                                    <span class="text">Découvrez toutes nos recettes</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <aside class="main-sidebar">

                            <div class="widget widget_latest_posts">
                                <h5 class="widget-title primary-font">Les dernières recettes</h5>

                                <ul class="posts-list">
                                  <?php
                                  foreach ($lastRecipe as $key => $value) {
                                    echo "<li class='post-item'>
                                        <a href='?controller=recipes&action=detailRecipe&id=".$value['id']."' class='post-cover'>
                                            <img src='assets/".$value['categories'][0].".jpg' alt='latest post' />
                                        </a>
                                        <h5 class='post-title'>
                                            <a href='?controller=recipes&action=detailRecipe&id=".$value['id']."'>".$value['name']."</a>
                                        </h5>
                                        <span class='post-meta'>".$value['date']."</span>
                                    </li>";
                                  }
                                   ?>
                                </ul>
                            </div>


                            <div class="widget widget_recipes_categories">
                                <h5 class="widget-title primary-font">Categories</h5>

                                <ul class="clean-list categories-list">
                                  <?php
                                  foreach ($categories as $key => $value) {
                                    echo "<li class='category' data-category=''><i style='color:#f6c935;font-size:14px;' class='fa fa-cutlery'></i> <a href='?controller=pages&action=error'> ".$value['Nom']."</a> - <span class='nr'>".$value['nbRecipe']."</span></li>";
                                  }
                                   ?>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

    </div>
