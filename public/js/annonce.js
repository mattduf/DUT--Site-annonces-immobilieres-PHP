//JS pour faire apparaître le mode d'énergie si "Indivuel" est sélectionné
//Source : https://www.tutorialspoint.com/how-can-i-show-a-hidden-div-when-a-select-option-is-selected-in-javascript
function showEnergie(id, elementValue) {
    document.getElementById(id).style.display = elementValue.value == 'Individuel' ? 'block' : 'none';
}

//JS pour compter le nb de caractères restant pour la description
//Source : https://stackoverflow.com/questions/34453095/javascript-display-remaining-characters-of-text-area/34453262#answer-34453257
function textareaLengthCheck(el) {
    var textArea = el.value.length;
    var charactersLeft = 1099 - textArea;
    var count = document.getElementById('lblRemainingCount');
    count.innerHTML = "(" + charactersLeft + " / 1100)";
}

//JS pour afficher l'aperçu d'une image chargée
//Source : https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
var loadFile = function(event) {
    var imageoutput = document.getElementById('imageoutput');
    imageoutput.src = URL.createObjectURL(event.target.files[0]);
    imageoutput.onload = function() {
        URL.revokeObjectURL(imageoutput.src) // free memory
    }
}