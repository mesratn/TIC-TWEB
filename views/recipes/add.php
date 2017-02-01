<div class="content-wrapper">

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



  <div style="margin-bottom:10%;"class="container">
    <form class="contact-form">
        <h1 class="form-title">Alors vous êtes fin cuisinier ?</h1>
        <p class="form-subtitle">Laissez nous votre nom ainsi que votre e-mail afin que nous puissions vous prévenir de la validation de votre recettes. </p>
        <div class="input-line">
            <input type="text" class="form-input check-value" />
            <span class="input-placeholder">Nom</span>
        </div>

        <div class="input-line">
            <input type="text" class="form-input check-value" />
            <span class="input-placeholder">Email</span>
        </div>

        <div class="input-line">
            <input type="text" class="form-input check-value" />
            <span class="input-placeholder">Titre de la recette</span>
        </div>
        <div class="row">
          <legend>Ingredients:</legend>
          <fieldset>
            <div id="dynamicInput">
              <div class="form-group">
                <div class="col-md-3">
                  <input id="textinput" name="noms[]" type="text" placeholder="Nom" class="form-control input-md">
                </div>
                <div class="col-md-3">
                  <input id="textinput" name="quantites[]" type="text" placeholder="Quantité" class="form-control input-md">
                </div>
                <div class="col-md-3">
                  <select id="selectbasic" name="unites[]" class="form-control">
                    <option value="g">g</option>
                    <option value="mL">mL</option>
                    <option value="L">L</option>
                    <option value="Cuil. Soupe">Cuil. Soupe</option>
                    <option value="Cuil. Café">Cuil. Café</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-primary" type="button" onClick="addInput('dynamicInput');">Add</button>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="row">
          <legend>Etapes:</legend>
          <fieldset>
            <div id="dynamicSteps">
              <div class="form-group">
                <div class="input-line col-md-10">
                    <textarea class="form-input check-value"></textarea>
                </div>
                <div class="col-md-2" style="margin-left: 10%; margin-top: 5%;">
                  <button class="btn btn-primary" type="button" onClick="addStep('dynamicSteps');">Add</button>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <span class="btn-wrapper align-center">
            <button class="submit-button btn btn-default">
                <span class="text">Send message</span>
            </button>
        </span>
    </form>
  </div>

</div>
