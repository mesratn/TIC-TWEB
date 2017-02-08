<div class="content-wrapper">
    <!-- Single Recipe -->
    <article class="recipe-article single-recipe">
        <!-- Introbox -->
        <div class="recipe-intro-box">
            <img src="assets/single-recipe-page.jpg" alt="single recipe background" class="single-recipe-background" />

            <h1 class="recipe-title">
                <div class="container"><?php echo $recipe['name']; ?></div>
            </h1>

            <div class="recipe-details-wrapper">
                <div class="container">
                    <ul class="clean-list recipe-details">
                        <li class="detail">
                            <i class="icon-time"></i>
                            <span class="value"><?php echo $recipe['time']." minutes"; ?></span>
                        </li>

                        <li class="detail">
                            <i class="icon-chef"></i>
                            <span class="value"><?php echo "Difficulté : ".$recipe['difficulty']; ?></span>
                        </li>

                        <li class="detail">
                            <i class="icon-menu"></i>
                            <span class="value"><?php echo "Catégorie : ".$categories[0]; ?></span>
                        </li>

                        <li class="detail">
                            <i class="icon-serves"></i>
                            <span class="value"><?php echo "Nb Pers. : ".$recipe['size'];?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Body -->
        <div class="container">
            <div class="recipe-body">
                <!-- Recipe Nav Block -->
                <div class="recipe-navigation-block">
                    <ul class="clean-list nav-items">
                        <li class="nav-item">
                            <a href="#recipe-intro" class="current">Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#recipe-ingredients">Ingredients</a>
                        </li>
                        <?php
                        foreach ($steps as $key => $value) {
                          $key = $key+1;
                          echo "<li class='nav-item'>
                                <a href='#recipe-step-$key'>Étape $key</a>
                              </li>";
                        }
                         ?>
                    </ul>
                </div>

                <!-- Recipe Share Block -->
                <div class="recipe-share-block">
                    <div class="social-items">
                        <span class="social-items-icon icon-share"></span>

                        <ul class="clean-list social-block big">
                            <li>
                                <a href="https://www.facebook.com/nextgenwp/" target="_blank">
                                    <i class="icon-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/nextgenwp/" target="_blank">
                                    <i class="icon-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/nextgenwp/" target="_blank">
                                    <i class="icon-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2" id="recipe-intro">
                        <p><?php echo $recipe['description']; ?></p>
                        <div class="ingredients-block" id="recipe-ingredients">
                            <div class="block-inner-container">
                                <div class="cover-image">
                                    <img src="assets/recipe-ingredient-1.jpg" class="recipe-image" alt="recipe image" />
                                </div>

                                <div class="ingredients-list-wrapper">
                                    <h5 class="list-title primary-font">
                                        <span class="text">Ingredients</span>
                                    </h5>

                                    <ul class="clean-list ingredients-list">
                                      <?php
                                      foreach ($ingredients as $k => $value) {
                                        echo "<li>
                                                <span class='text'>".$value['Nom'].", ".$value['Quantite']." ".$value['Unite']."</span>
                                              </li>";
                                      }
                                      ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Recipe Steps -->
                        <div class="recipe-steps">
                            <ul class="clean-list recipe-steps-list">
                              <?php
                              foreach ($steps as $key => $value) {
                                $key = $key+1;
                                $instruction = $value['Instructions'];
                                echo "<li class='recipe-step' id='recipe-step-$key'>
                                    <div class='heading'>
                                        <span class='step-value'>step <span class='nr'>$key</span></span>

                                        <div class='images'>
                                            <div class='image'>
                                                <img src='assets/recipe-small-ingredient-1.jpg' alt='recipe step image' />
                                            </div>
                                            <div class='image'>
                                                <img src='assets/recipe-small-ingredient-2.jpg' alt='recipe step image' />
                                            </div>
                                        </div>
                                    </div>

                                    <p>$instruction</p>
                                </li>";
                              }
                               ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="recipe-footer">
            <div class="container">
                <div class="meta-container">
                    <div class="recipe-short-meta">
                        <span class="date"><?php echo $recipe['date']; ?></span>
                        <span class="author">par <a href=""><?php echo $recipe['author']; ?></a></span>
                    </div>

                    <ul class="clean-list share-recipe social-block">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                    </ul>

                    <div class="recipe-tags">
                      <?php foreach ($categories as $key => $value){
                        echo "<a>
                              <span class='text'>".$value."</span>
                              </a>";
                            } ?>
                    </div>
                </div>
            </div>
        </div>

    </article>

    <!-- Comments Area -->
    <div id="comments" class="comments-area">
        <div class="container">
            <h4 class="section-subtitle">Commentaires</h4>

            <ul class="clean-list comments-list">
              <?php
              if($notes != NULL)
              {
              foreach ($notes as $key => $value) {
                echo "<li class='comment'>
                <div class='image'>
                    <img src='assets/comments-avatar-2.jpg' alt='comment image' />
                </div>
                   <div class='comment-heading'>
                       <h5 class='comment-meta primary-font'><span class='name'>".$value['Pseudo']."</span>, ".$value['Date']."</h5>
                       <div class='stars'>";
                       for ($i=0; $i < $value['Note'] ; $i++) {
                         echo "<i class='icon-star'></i>";
                       }
                       if($value['Note'] == 0)
                        echo "<i class='icon-star'> Non noté</i>";
                echo "</div>
                   </div>
                   <p>".$value['Commentaire']."</p>
               </li>";
              }
            }
            else {
              echo "<li class='comment'>
                 <div class='comment-heading'>
                     <h5 class='comment-meta primary-font'><span class='name'>Pas encore de commentaires</span></h5>
                 </div>
                 <p>Soyez le premier à noter cette recette !</p>
             </li>";
            } ?>
            </ul>

            <h4 class="section-subtitle icon-2">Donner votre avis !</h4>

            <form method="post" action="#comments" class="review-form">
                <div class="rating-block">
                    <h5 class="title primary-font">Votre note</h5>

                    <div class="rating-stars-block">
                        <div class="stars-block">
                          <input id="star" style="display:none;" type="checkbox" name="star" checked value="3"/>
                            <div onclick="$('#star').val(1);$('.star1').css('color', '');$('.star2').css('color', '');$('.star3').css('color', '');$('.star4').css('color', '');$('.star5').css('color', '');$('.star1').css('color', '#db3236');" class="single-star-block">
                                <div class="stars">
                                    <i class="star1 icon-star active"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>

                            </div>
                            <div class="single-star-block">
                                <div onclick="$('#star').val(2);$('.star1').css('color', '');$('.star2').css('color', '');$('.star3').css('color', '');$('.star4').css('color', '');$('.star5').css('color', '');$('.star2').css('color', '#db3236');" class="stars">
                                    <i class="star2 icon-star active"></i>
                                    <i class="star2 icon-star active"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                            <div class="single-star-block">
                                <div onclick="$('#star').val(3);$('.star1').css('color', '');$('.star2').css('color', '');$('.star3').css('color', '');$('.star4').css('color', '');$('.star5').css('color', '');$('.star3').css('color', '#db3236');" class="stars">
                                    <i style="color:#db3236;" class="star3 icon-star active"></i>
                                    <i style="color:#db3236;" class="star3 icon-star active"></i>
                                    <i style="color:#db3236;" class="star3 icon-star active"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                            <div class="single-star-block">
                                <div onclick="$('#star').val(4);$('.star1').css('color', '');$('.star2').css('color', '');$('.star3').css('color', '');$('.star4').css('color', '');$('.star5').css('color', '');$('.star4').css('color', '#db3236');" class="stars">
                                    <i class="star4 icon-star active"></i>
                                    <i class="star4 icon-star active"></i>
                                    <i class="star4 icon-star active"></i>
                                    <i class="star4 icon-star active"></i>
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                            <div class="single-star-block">
                                <div onclick="$('#star').val(5);$('.star1').css('color', '');$('.star2').css('color', '');$('.star3').css('color', '');$('.star4').css('color', '');$('.star5').css('color', '');$('.star5').css('color', '#db3236');" class="stars">
                                    <i class="star5 icon-star active"></i>
                                    <i class="star5 icon-star active"></i>
                                    <i class="star5 icon-star active"></i>
                                    <i class="star5 icon-star active"></i>
                                    <i class="star5 icon-star active"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-line">
                    <textarea name="postDescription" class="form-input check-value" required></textarea>
                    <span class="form-placeholder">Commentaire</span>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-line">
                            <input name="postAuthor" type="text" class="form-input check-value" required/>
                            <span class="form-placeholder">Nom</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-line">
                            <input name="postEmail" type="email" class="form-input check-value" required/>
                            <span class="form-placeholder">E-mail</span>
                        </div>
                    </div>

                </div>

                <div class="align-center">
                    <button class="btn btn-default btn-submit">
                        <span class="text">Poster le commentaire</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
