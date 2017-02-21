<header class="main-header">
    <div class="main-header-content">
        <div class="row">
            <div class="col-xs-4">
                <form method="post" action="index.php?controller=recipes&action=searchRecipe" class="main-search-form">
                    <select class="form-control" id="type" name="Type" style="width:60%;">
                        <option value="ingredient">Ingredient</option>
                        <option value="categorie">Categorie</option>
                    </select>
                    <input name="search" style="width:99%;" type="text" placeholder="Votre recherche" class="form-input check-value" />
                      <button class="form-submit">
                        <i class="icon-magnifier"></i>
                    </button>
                </form>
            </div>

            <div class="col-xs-4">
                <div class="indentity-wrapper">
                    <a href="?controller=pages&action=home">
                        <img style="margin-bottom:10%;" src="logo.svg" alt="site identity" />
                    </a>
                </div>
            </div>

            <div class="col-xs-4">
                <nav class="header-nav">
                    <ul>
                        <li>
                            <a href="?controller=pages&action=home">Accueil</a>
                        </li>
                        <li>
                            <a href="?controller=recipes&action=all">Recettes</a>
                        </li>
                        <li>
                            <a href="?controller=pages&action=error">X</a>
                        </li>

                    </ul>

                    <!-- <span class="side-menu-toggle">
                        <i class="icon-menu2"></i>
                    </span> -->
                </nav>

            </div>
        </div>
    </div>
</header>
