<div class="content-wrapper">
    <!-- Page Intro -->
    <div class="page-intro-box">
        <div class="box-inner">
            <img src="assets/page-intro-bg-2.jpg" alt="page intro box background" class="page-intro-background" />

            <div class="box-content">
                <div class="container">
                    <h2 class="page-title">Toutes nos recettes</h2>

                    <a href="?controller=recipes&action=add" class="btn btn-simplified">
                        <span class="text">Soumettre une recette</span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Recipes -->
    <div class="recipes-page-container">
        <!-- Recipes Filters -->
        <form class="recipes-filters" style="display:none;">
            <div class="container">
                <h4 class="recipes-filters-title primary-font">
                    <span class="text">Filtres</span>
                </h4>


                <div class="row">
                    <div class="col-md-12">
                        <div class="recipes-filters-block">
                            <h5 class="block-title primary-font">Categories</h5>

                            <ul class="clean-list recipe-categories">
                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label>
                                            <input type="checkbox" name="category-meat" class="check-box-input" />
                                            <span class="check-box-title">Viande</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label>
                                            <input type="checkbox" name="category-pizza" class="check-box-input" />
                                            <span class="check-box-title">Pizza</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label class="box-label">
                                            <input type="checkbox" name="category-deserts" class="check-box-input" />
                                            <span class="check-box-title">Desserts</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label class="box-label">
                                            <input type="checkbox" name="category-salads" class="check-box-input" />
                                            <span class="check-box-title">Légumes</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label class="box-label">
                                            <input type="checkbox" name="category-fish" class="check-box-input" />
                                            <span class="check-box-title">Poisson</span>
                                        </label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="recipes-filters-block">
                            <h5 class="block-title primary-font">Temps de préparation (minutes)</h5>

                            <div class="no-ui-slider">
                                <div class="slider" data-min="0" data-max="120" data-start="15" data-stop="45" data-step="5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                      <a href="?controller=recipes&amp;action=all" class="pull-right btn btn-default">
                        <span class="text">Appliquer les filtres</span>
                      </a>
                  </div>

                </div>
            </div>
        </form>

        <!-- Recipes -->
        <div class="container">
            <div class="recipe-articles-block no-margin">
                <div class="row">

                  <?php
                  foreach ($recipes as $key => $recipe) {
                  ?>
                    <div class="col-sm-6 col-md-4">
                        <article class="recipe-article">
                            <div class="recipe-cover">
                                <div class="cover">
                                    <a href="">
                                        <img src="assets/<?php echo $recipe["categories"][0]; ?>.jpg" alt="featured recipe cover" />
                                    </a>
                                </div>
                            </div>

                            <div class="recipe-meta">

                                <p class="categories">
                                    <a href="">-<?php foreach ($recipe["categories"] as $k => $category) {
                                      echo $category."-";
                                    }?></a>
                                </p>

                                <h3 class="recipe-title">
                                    <a href=""><?php echo $recipe["name"] ?></a>
                                </h3>

                                <div class="recipe-footer">
                                <div class="recipe-short-meta">
                                    <span class="date"><?php echo $recipe["date"] ?></span>
                                    <span class="author">par <a href="#no"><?php echo $recipe["author"] ?></a></span>
                                </div>

                                <ul class="clean-list share-recipe social-block">
                                    <li><a href="#facebook"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#google+"><i class="icon-google-plus"></i></a></li>
                                    <li><a href="#twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#instagram"><i class="icon-instagram"></i></a></li>
                                </ul>
                            </div>

                            </div>
                        </article>
                    </div>

                    <?php } ?>


                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <div class="container">
                <ul class="page-numbers">
                    <li>
                        <span class="page-numbers current">1</span>
                    </li>
                    <!-- <li>
                        <a href="#" class="page-numbers">2</a>
                    </li>
                    <li>
                        <a href="#" class="page-numbers">3</a>
                    </li>
                    <li>
                        <a href="#" class="page-numbers">4</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
