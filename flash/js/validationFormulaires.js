$(document).ready(function () {

    $("#inscription_form").submit(function (event) {
        //Empêche l'html de se refresh
        event.preventDefault();

        var dataForm = getAllElementsForm("#inscription_form");
        var objectForm = transformThisInObject(dataForm, "#inscription_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        if ($("#passwordUser").val() != $("#confirmPasswordUser").val()) {
            $("#motDePasseSame").show();
            return false;
        }
        else {
            $("#motDePasseSame").hide();
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 

        $("#loader").show();
        $.ajax({
            url: "../controller/inscriptionController.php",
            type: "POST",
            data: objectForm,
            datatype: "json",
            success: function (response) {
                console.log(response);
                if (response === '"mailPseudoPasOk"') {
                    $("#mailPasOk").show();
                    $("#pseudoPasOk").show();
                    $("#echecMailOuPseudo").show();
                    $("#success").hide();
                }
                else if (response === '"mailPasOk"') {
                    $("#mailPasOk").show();
                    $("#echecMailOuPseudo").show();
                    $("#success").hide();
                    $("#pseudoPasOk").hide();
                }
                else if (response === '"pseudoPasOk"') {
                    $("#pseudoPasOk").show();
                    $("#echecMailOuPseudo").show();
                    $("#success").hide();
                    $("#mailPasOk").hide();
                }
                else {
                    $("#mailPasOk").hide();
                    $("#pseudoPasOk").hide();
                    $("#echecMailOuPseudo").hide();
                    $("#success").show();
                }
            }
        })
            .done(function () {
                $("#loader").hide();
                $("#nonComplete").hide();
            });
    });



    $("#connexion_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var dataForm = getAllElementsForm("#connexion_form");
        var objectForm = transformThisInObject(dataForm, "#connexion_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

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
        });
    });



    $("#gestionCompte").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var dataForm = getAllElementsForm("#gestionCompte");
        var objectForm = transformThisInObject(dataForm, "#gestionCompte");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        if ($("#passwordUserChange").val() != $("#confirmPasswordUserChange").val()) {
            $("#motDePasseSame").show();
            return false;
        }
        else {
            $("#motDePasseSame").hide();
        }


        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/gestionDeCompteController.php",
            type: "POST",
            data: objectForm,
            datatype: "json",
            success: function (response) {
                console.log(response);
                if (response === '"mdpPasOk"') {
                    $("#motDePasseIncorrect").show();
                }
                else {
                    $("#motDePasseIncorrect").hide();
                    $("#success").show();
                }
            }
        });

    });


    $("#ajoutAnimal_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#ajoutAssoc_form");
        var dataForm = getAllElementsFormImg("#ajoutAnimal_form");
        var objectForm = transformThisInObject(test, "#ajoutAnimal_form");

        dataForm.append('fileAnimal', $('#imageAnimal')[0].files[0]);
        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/ajoutAnimalController.php",
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
        });

    });


    $("#ajoutAssoc_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#ajoutAssoc_form");
        var dataForm = getAllElementsFormImg("#ajoutAssoc_form");
        var objectForm = transformThisInObject(test, "#ajoutAssoc_form");

        dataForm.append('fileAssoc', $('#imageAssoc')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

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

    if ($("#" + id_input).length === 0) {
        return false;
    }

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
        data.push($(this));
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


//Boucle pour valider tous les input
function checkAllForm(form) {
    var res = true;
    for (let i = 0; i < Object.keys(form).length - 1; i++) {
        if (check_form(Object.keys(form)[i]) === false) {
            return false;
        }
    }
}


//Récupération de tous les champs du formulaire + value
function getAllElementsFormImg(form) {
    //On créé un array qui stockera tout
    data = new FormData();
    //On parcour chaque champs input du form
    $(form + " :input").each(function () {
        //On balance toutes les infos relative à l'input dans un array
        data.append($(this).attr("id"), $(this).val());
    })
    return data;
}