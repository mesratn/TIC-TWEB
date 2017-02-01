var counter = 1;
function addInput(divName){
	var newdiv = document.createElement('div');
	newdiv.innerHTML = ' <div class="form-group"><div class="col-md-3"><input id="textinput" name="noms[]" type="text" placeholder="Nom" class="form-control input-md"></div><div class="col-md-3"><input id="textinput" name="quantites[]" type="text" placeholder="Quantité" class="form-control input-md"></div><div class="col-md-3"><select id="selectbasic" name="unites[]" class="form-control"><option value="g">g</option><option value="mL">mL</option><option value="L">L</option><option value="Cuil. Soupe">Cuil. Soupe</option><option value="Cuil. Café">Cuil. Café</option></select></div><div class="col-md-3"><button class="btn btn-primary" type="button" onClick="addInput(\'dynamicInput\');">Add</button></div></div>';
	document.getElementById(divName).appendChild(newdiv);
	counter++;
}

function addStep(divName){
  var newdiv = document.createElement('div');
  newdiv.innerHTML = ' <div class="form-group"><div class="input-line col-md-10"><textarea class="form-input check-value"></textarea></div><div class="col-md-2" style="margin-left: 10%; margin-top: 5%;"><button class="btn btn-primary" type="button" onClick="addStep(\'dynamicSteps\');">Add</button></div></div>';
  document.getElementById(divName).appendChild(newdiv);
  counter++; 
}