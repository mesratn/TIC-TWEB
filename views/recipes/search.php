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
        <form method="post" action="?controller=recipes&action=filter" class="recipes-filters" style="display:block;">
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
                                            <input type="checkbox" name="category[]" value="Viande" class="check-box-input" />
                                            <span class="check-box-title">Viande</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label>
                                            <input type="checkbox" name="category[]" value="Pizza" class="check-box-input" />
                                            <span class="check-box-title">Pizza</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label class="box-label">
                                            <input type="checkbox" name="category[]" value="Dessert" class="check-box-input" />
                                            <span class="check-box-title">Desserts</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label class="box-label">
                                            <input type="checkbox" name="category[]" value="Légume" class="check-box-input" />
                                            <span class="check-box-title">Légumes</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label class="box-label">
                                            <input type="checkbox" name="category[]" value="Poisson" class="check-box-input" />
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
                                <div id="slider" class="slider" name="time" data-min="0" data-max="120" data-start="0" data-stop="120" data-step="5"></div>
                                <input id="minTime" type="hidden" name=minTime value="0">
                                <input id="maxTime" type="hidden" name=maxTime value="120">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="recipes-filters-block">
                            <br><h5 class="block-title primary-font">Difficulté</h5>

                            <ul class="clean-list recipe-categories">
                                <li class="recipe-category">
                                    <div class="check-box">
                                        <label>
                                            <input type="radio" name="difficulty" value="Facile" class="" checked/>
                                            <span class="check-box-title">Facile</span>
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label>
                                            <input type="radio" name="difficulty" value="Intermédiaire" class="" />
                                            <span class="check-box-title">Intermédiaire</span>
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label>
                                            <input type="radio" name="difficulty" value="Difficile" class="" />
                                            <span class="check-box-title">Difficile</span>
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label>
                                            <input type="radio" name="difficulty" value="Expert" class="" />
                                            <span class="check-box-title">Expert</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>


                    <div class="col-md-12"><br>
                      <button onclick="var slider = document.getElementById('slider');var array=slider.noUiSlider.get();$('#minTime').val(array[0]);$('#maxTime').val(array[1]);console.log('submit');" class="pull-right btn btn-default">
                        <span class="text">Appliquer les filtres</span>
                      </button>
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
                                    <a href="?controller=recipes&action=detailRecipe&id=<?php echo $recipe["id"]?>">
                                        <img src="assets/<?php echo $recipe["categories"][0] ?>.jpg" alt="featured recipe cover" />
                                    </a>
                                </div>
                                <ul class="clean-list recipe-details">
                                    <li class="detail">
                                        <i class="icon-time"></i>
                                        <span class="value"><?php echo $recipe["time"]." minutes" ?></span>
                                    </li>

                                    <li class="detail">
                                        <i class="icon-chef"></i>
                                        <span class="value"><?php echo $recipe["difficulty"] ?></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="recipe-meta">

                                <p class="categories">
                                    <a href="">-<?php foreach ($recipe["categories"] as $k => $category) {
                                      echo $category."-";
                                    }?></a>
                                </p>

                                <h3 class="recipe-title">
                                    <a href="?controller=recipes&action=detailRecipe&id=<?php echo $recipe["id"]?>"><?php echo $recipe["name"] ?></a>
                                    <br>
                                    <?php
                                    $note = $recipe['note'];
                                      while($note != 0) {
                                        echo "<i style='background: -webkit-linear-gradient(left,#f58a00 0,#f6d640 100%);-webkit-text-fill-color: transparent;-webkit-background-clip: text; color: #f6c935;' class='icon-star'></i>";
                                        $note--;
                                      }
                                    ?>
                                </h3>

                                <div class="recipe-footer">
                                <div class="recipe-short-meta">
                                    <span class="date"><?php echo $recipe["date"] ?></span>
                                    <span class="author">par <a href=""><?php echo $recipe["author"] ?></a></span>
                                </div>

                                <ul class="clean-list share-recipe social-block">
                                    <li><a href="#facebook"><i class="icon-facebook"></i></a></li>
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
