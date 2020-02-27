$(document).ready(function () {

    $("#connexion_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var dataForm = getAllElementsForm("#connexion_form");
        var objectForm = transformThisInObject(dataForm, "#connexion_form");

        var res = check_form("connPseudoUser");
        res = check_form("connPasswordUser") && res;
        if (!res) return;


        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/connexionController.php",
            type: "POST",
            data: objectForm,
            datatype: "json",
            success: function (response) {
                //if(response === '"mailOuPseudoPasOk"'){
                //$("#echecMailOuPseudo").show();
                //}
                if (response === '"mdpPasOk"') {
                    $("#motDePasseIncorrect").show();
                }
                else {
                    window.location.replace('http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/accueil.php');
                }
            }
        })
            //Si la requête fonctionne on affiche un petit message en bas de la page
            .done(function () {

            })

    });
});

/**
 * 
 * @param {ID de l'input a vérifier} id_input 
 */
function check_form(id_input) {
    //On prend la valeur des check si false = non check si true = check
    //Tenter de transformer pour que ca soit générique. Comme pour les input en dessous au final.

    if ($("#" + id_input).length === 0) {
        $("#nonComplete").show();
        return false;
    }
    //Vérifie si le champs n'est pas vide
    if ($("#" + id_input).val() === "") {
        $("#" + id_input).next(".form_error").fadeIn().text("Veuillez remplir ce champ");
        $("#nonComplete").show();
        return false;
    }
    else {
        $("#" + id_input).next(".form_error").fadeIn().text("");
    }
    return true;
}


//Récupération de tous les champs du formulaire + value
function getAllElementsForm(form) {
    //On créé un array qui stockera tout
    data = [];
    //On parcour chaque champs input du form
    $(form + " :input").each(function () {
        //On balance toutes les infos relative à l'input dans un array
        data.push($(this))
    })
    return data;
}

// On transforme les contenu du formulaire en un objet pour pouvoir l'envoyer avec notre requête ajax
function transformThisInObject(test, form) {
    // {} pour object et [] pour array
    object = {};
    var value;
    //On parcour le nombre d'input du formulaire
    for (var i = 0; i < test.length; i++) {
        //On récupère l'id de chaque input du form
        var id = test[i].attr("id");
        //On vérifie si le type de l'input est bien checkbox
        if (test[i].attr("type") === "checkbox") {
            //On change la valeur par oui ou non 
            value = test[i].is(":checked") ? "Oui" : "Non";
        }
        else {
            //On récupère la value de chaque input du form
            value = test[i].val();
        }
        //On les fous en clef valeur dans l'object ou array
        object[id] = value;
    }
    return object;
}