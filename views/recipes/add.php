<script>
  var i = 1;
  var clearList = function() {
    $( "#ingredientList" ).empty();
    i = 1;
    console.log("List deleted");
  }
  var addIngredient = function() {
    if (i <= 10)
      $("#ingredientList").append("<br><div class='col-md-12'><div class='col-md-1'><h4 style='color:#f6c935;'>#"+i+"</h4></div><div class='col-md-6'><input name='ingredientName[]' type='text' placeholder='Nom' class='form-control input-md'></div><div class='col-md-3'><input name='ingredientQte[]' type='number' min=0 placeholder='Quantité'' class='form-control input-md'></div><div class='col-md-2'><select name='ingredientUnit[]' class='form-control'><option value='g'>g</option><option value='mL'>mL</option><option value='L'>L</option><option value='Cuil. Soupe'>Cuil. Soupe</option><option value='Cuil. Café''>Cuil. Café</option></select></div></div>");
    console.log("Ingredient added");
    ++i;
  }
</script>

<div class="content-wrapper" style="background : url(assets/add_recipe_bg.jpg);background-size:cover;" >

  <div class="page-intro-box">
      <div class="box-inner">
          <img src="assets/page-intro-bg-1.jpg" alt="page intro box background" class="page-intro-background" />

          <div class="box-content">
              <div class="container">
                  <h2 class="page-title">Ajout d'une recette</h2>
              </div>
          </div>
      </div>
  </div>

  <div class="container" style="margin-top:-10%;">
    <form method="post" action="index.php?controller=recipes&action=addRecipe" style="margin-bottom:25%;" class="contact-form">

        <h1 class="form-title">Alors vous êtes fin cuisinier ?</h1>
        <p class="form-subtitle">Laissez nous votre nom ainsi que votre e-mail afin que nous puissions vous prévenir de la validation de votre recettes. </p>
        <div class="input-line">
            <input type="text" name="name" class="form-input check-value" required/>
            <span class="input-placeholder">Nom</span>
        </div>

        <div class="input-line">
            <input type="email" name="email" class="form-input check-value" required/>
            <span class="input-placeholder">Adresse e-mail</span>
        </div>

        <div class="input-line">
            <input type="text" name="title" class="form-input check-value" required/>
            <span class="input-placeholder">Titre de la recette</span>
        </div>
        <div class="input-line">
            <textarea type="text" name="description" class="form-input check-value" required></textarea>
            <span class="input-placeholder">Description</span>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="recipes-filters-block">
                    <h4 style="color:white;" class="block-title primary-font">Catégorie(s)</h4>

                    <ul class="clean-list recipe-categories">
                        <li class="recipe-category">
                            <div class="check-box">
                                <label>
                                    <input type="checkbox" name="category-meat" class="check-box-input" />
                                    <span style="color:#f6c935;" class="author check-box-title">Viande</span>
                                </label>
                            </div>
                        </li>

                        <li class="recipe-category">
                            <div class="check-box">
                                <label>
                                    <input type="checkbox" name="category-pizza" class="check-box-input" />
                                    <span style="color:#f6c935;" class="check-box-title">Pizza</span>
                                </label>
                            </div>
                        </li>

                        <li class="recipe-category">
                            <div class="check-box">
                                <label class="box-label">
                                    <input type="checkbox" name="category-deserts" class="check-box-input" />
                                    <span style="color:#f6c935;" class="check-box-title">Desserts</span>
                                </label>
                            </div>
                        </li>

                        <li class="recipe-category">
                            <div class="check-box">
                                <label class="box-label">
                                    <input type="checkbox" name="category-salads" class="check-box-input" />
                                    <span style="color:#f6c935;" class="check-box-title">Légumes</span>
                                </label>
                            </div>
                        </li>

                        <li class="recipe-category">
                            <div class="check-box">
                                <label class="box-label">
                                    <input type="checkbox" name="category-fish" class="check-box-input" />
                                    <span style="color:#f6c935;" class="check-box-title">Poisson</span>
                                </label>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-6">
              <div class="recipes-filters-block">
                  <h4 style="color:white;" class="block-title primary-font">Temps de préparation (minutes)</h4>
                  <input id="timeinput" min = 0 max = 120 name="time" type="number" placeholder="5 minutes" class="form-control input-md" required>
              </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h4 style="color:white;" class="block-title primary-font">Ingrédient(s)</h4>
          <fieldset>
            <button class="btn btn-warning" type="button" onclick="addIngredient();" ><i class="fa fa-plus"></i></button>
            <button class="btn btn-danger" type="button" onclick="clearList();" ><i class="fa fa-trash"></i></button>
            <div id="dynamicInput">
              <div id="ingredientList" class="form-group"></div>
            </div>
          </fieldset>
        </div>
        <br>
        <div class="row">
            <h4 style="color:white;" class="block-title primary-font">Étape(s)</h4>
          <fieldset>
            <div id="dynamicSteps">
              <div class="form-group">
                <div class="input-line col-md-10">
                    <textarea class="form-input check-value"></textarea>
                </div>
                <div class="col-md-2" style="margin-left: 10%; margin-top: 5%;">
                  <button class="btn btn-warning" type="button" onClick="addStep('dynamicSteps');"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <span class="btn-wrapper align-center"><br>
            <button style="background: -webkit-linear-gradient(left,#f58a00 0,#f6d640 100%);" type="submit" class="submit-button btn btn-simplified">
                <span class="text">Ajouter la recette</span>
            </button>
        </span>
    </form>
  </div>

</div>
