$(document).ready(function () {

    $("#inscription_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var dataForm = getAllElementsForm("#inscription_form");
        var objectForm = transformThisInObject(dataForm, "#inscription_form");

        var res = check_form("pseudoUser");
        res = check_form("mailUser") && res;
        res = check_form("passwordUser") && res;
        res = check_form("confirmPasswordUser") && res;
        res = check_form("check1") && res;
        if (!res) return;


        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $("#loader").show();
        $.ajax({
            url: "../controller/inscriptionController.php",
            type: "POST",
            data: objectForm,
            datatype: "json",
            success : function(response) {
                if(response === '"mailPseudoPasOk"'){
                    $("#mailPasOk").show();
                    $("#pseudoPasOk").show();
                    $("#echecMailOuPseudo").show();
                    $("#success").hide();
                }
                else if(response ==='"mailPasOk"'){
                    $("#mailPasOk").show();
                    $("#echecMailOuPseudo").show();
                    $("#success").hide();
                    $("#pseudoPasOk").hide();
                }
                else if(response === '"pseudoPasOk"'){
                    $("#pseudoPasOk").show();
                    $("#echecMailOuPseudo").show();
                    $("#success").hide();
                    $("#mailPasOk").hide();
                }
                else{
                    $("#mailPasOk").hide();
                    $("#pseudoPasOk").hide();
                    $("#echecMailOuPseudo").hide();
                    $("#success").show();
                }
            }
        })
            //Si la requête fonctionne on affiche un petit message en bas de la page
            .done(function () {
                $("#loader").hide();
                $("#nonComplete").hide();

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

    if ($("#" + id_input).length === 0)
        return false;

    if ($("#" + id_input).attr("type") === "checkbox" && $("#" + id_input).attr("required") === "required") {
        if ($("#" + id_input).is(":checked") === false) {
            $("#caseNonCheck").show();
            return false;
        }
        else {
            $("#caseNonCheck").hide();
        }
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

    //Vérifie si le champs est de type mail
    if ($("#" + id_input).attr("type") === "email") {
        //Vérifie que la valeur entrée est bien un mail
        if (validateEmail($("#" + id_input).val()) === false) {
            $("#" + id_input).next(".form_error").fadeIn().text("Veuillez entrer un email valide");
            return false;
        }
    }
    if ($("#passwordUser").val() !== $("#confirmPasswordUser").val()) {
        $("#motDePasseSame").show();
        return false;
    }

    $("#motDePasseSame").hide();
    return true;
}

//On check si le mail est bien composer comme tout mail le devrait 
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
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