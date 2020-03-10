$(document).ready(function () {

    $("#ajoutAssoc_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var dataForm = getAllElementsForm("#ajoutAssoc_form");

        dataForm.append('fileAssoc', $('#imageAssoc')[0].files[0]);
        var res = check_form("nomAssoc");
        res = check_form("adresseAssoc") && res;
        res = check_form("emailAssoc") && res;
        res = check_form("telAssoc") && res;
        res = check_form("siteAssoc") && res;
        res = check_form("descAssoc") && res;
        res = check_form("facebookAssoc") && res;
        res = check_form("instagramAssoc") && res;
        res = check_form("placesQuarantaineAssoc") && res;
        res = check_form("placesReglesAssoc") && res;
        res = check_form("imageAssoc") && res;
        if (!res) return;

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/ajoutAssocController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response === '"mdpPasOk"') {
                }
                else {
                }
            }
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
    if ($("#passwordUserChange").val() !== $("#confirmPasswordUserChange").val()) {
        $("#motDePasseSame").show();
        return false;
    }

    $("#motDePasseSame").hide();
    return true;
}

//Récupération de tous les champs du formulaire + value
function getAllElementsForm(form) {
    //On créé un array qui stockera tout
    data = new FormData();
    //On parcour chaque champs input du form
    $(form + " :input").each(function () {
        //On balance toutes les infos relative à l'input dans un array
        data.append($(this).attr("id"), $(this).val());
    })
    return data;
}
