$(document).ready(function () {

    $("#inscription_form").submit(function (event) {
        //Empêche l'html de se refresh
        event.preventDefault();

        var dataForm = getAllElementsForm("#inscription_form");
        var objectForm = transformThisInObject(dataForm, "#inscription_form");

        if ($("#passwordUser").val() != $("#confirmPasswordUser").val()) {
            $("#motDePasseSame").show();
            return false;
        }
        else {
            $("#motDePasseSame").hide();
        }

        if (checkAllForm(objectForm) === false) {
            return false;
        }
        else {

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
                    else if (response === '"ok"'){
                        window.location.replace('http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/connexion.php');
                    }
                }
            })
                .done(function () {
                    $("#loader").hide();
                    $("#nonComplete").hide();
                });

        }
    });



    $("#connexion_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var dataForm = getAllElementsForm("#connexion_form");
        var objectForm = transformThisInObject(dataForm, "#connexion_form");

        if (checkAllForm(objectForm) === false) {
            //return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/connexionController.php",
            type: "POST",
            data: objectForm,
            datatype: "json",
            success: function (response) {
                if (response === '"mdpPasOk"') {
                    console.log(response);
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

        var test = getAllElementsForm("#ajoutAnimal_form");
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
                if (response === '"Animal deja present."') {
                    $("#animalDeja").show();
                }
                else if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    window.location.replace('http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/nosAnimaux.php');
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
                if (response === '"assocDejaPresente"') {
                    $("#assocDejaPresente").show();
                }
                else if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    window.location.replace('http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/detailsMonAssoc.php');
                }
            }
        });
    });

    $("#modifAssoc_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifAssoc_form");
        var dataForm = getAllElementsFormImg("#modifAssoc_form");
        var objectForm = transformThisInObject(test, "#modifAssoc_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifAssocController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
            }
        });
        location.reload(true);
    });

    $("#modifImgAssoc_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifImgAssoc_form");
        var dataForm = getAllElementsFormImg("#modifImgAssoc_form");
        var objectForm = transformThisInObject(test, "#modifImgAssoc_form");

        dataForm.append('fileAssoc', $('#imageAssocModif')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifImgAssocController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    location.reload(true);
                }
            }
        });
    });

    $("#modifAnimal_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifAnimal_form");
        var dataForm = getAllElementsFormImg("#modifAnimal_form");
        var objectForm = transformThisInObject(test, "#modifAnimal_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifAnimalController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
            }
        });
        location.reload(true);
    });

    $("#modifImgAnimal_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifImgAnimal_form");
        var dataForm = getAllElementsFormImg("#modifImgAnimal_form");
        var objectForm = transformThisInObject(test, "#modifImgAnimal_form");

        dataForm.append('fileAnimal', $('#imageAnimalModif')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifImgAnimalController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    location.reload(true);
                }
            }
        });
    });



    $("#ajoutOffre_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#ajoutOffre_form");
        var dataForm = getAllElementsFormImg("#ajoutOffre_form");
        var objectForm = transformThisInObject(test, "#ajoutOffre_form");

        dataForm.append('fileOffre', $('#imageAnnonceOffre')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/ajoutOffreController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"annonceDejaLa"') {
                    $("#annonceDejaLa").show();
                }
                else if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    window.location.replace('http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/vosAnnonces.php');
                }
            }
        });
    });

    $("#ajoutDemande_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#ajoutDemande_form");
        var dataForm = getAllElementsFormImg("#ajoutDemande_form");
        var objectForm = transformThisInObject(test, "#ajoutDemande_form");

        dataForm.append('fileDemande', $('#imageAnnonceDemande')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        if (document.getElementById("imageAnnonceDemande").files.length == 0) {
            console.log("Pas d'image insérée !");
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/ajoutDemandeController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"demandeDejaLa"') {
                    $("#demandeDejaLa").show();
                }
                else if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    window.location.replace('http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/vosDemandes.php');
                }
            }
        });
    });

    $("#modifImgOffre_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifImgOffre_form");
        var dataForm = getAllElementsFormImg("#modifImgOffre_form");
        var objectForm = transformThisInObject(test, "#modifImgOffre_form");

        dataForm.append('fileOffreModif', $('#imageAnnonceOffreModif')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifImgOffreController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    location.reload(true);
                }
            }
        });
    });


    $("#modifOffre_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifOffre_form");
        var dataForm = getAllElementsFormImg("#modifOffre_form");
        var objectForm = transformThisInObject(test, "#modifOffre_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifOffreController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
            }
        });
        location.reload(true);
    });

    $("#modifOffreSelect_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifOffreSelect_form");
        var dataForm = getAllElementsFormImg("#modifOffreSelect_form");
        var objectForm = transformThisInObject(test, "#modifOffreSelect_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifSelectOffreController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
            }
        });
        location.reload(true);
    });

    $("#modifImgDemande_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifImgDemande_form");
        var dataForm = getAllElementsFormImg("#modifImgDemande_form");
        var objectForm = transformThisInObject(test, "#modifImgDemande_form");

        dataForm.append('fileDemandeModif', $('#imageAnnonceDemandeModif')[0].files[0]);

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifImgDemandeController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"extPasOk"') {
                    $("#extPasOk").show();
                }
                else {
                    location.reload(true);
                }
            }
        });
    });


    $("#modifDemande_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifDemande_form");
        var dataForm = getAllElementsFormImg("#modifDemande_form");
        var objectForm = transformThisInObject(test, "#modifDemande_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifDemandeController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
            }
        });
        location.reload(true);
    });

    $("#modifDemandeSelect_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifDemandeSelect_form");
        var dataForm = getAllElementsFormImg("#modifDemandeSelect_form");
        var objectForm = transformThisInObject(test, "#modifDemandeSelect_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifDemandeSelectController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
            }
        });
        location.reload(true);
    });



    $("#modifAnimalSelect_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifAnimalSelect_form");
        var dataForm = getAllElementsFormImg("#modifAnimalSelect_form");
        var objectForm = transformThisInObject(test, "#modifAnimalSelect_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifAnimalSelectController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
            }
        });
        location.reload(true);
    });

    $("#modifAssocSelect_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#modifAssocSelect_form");
        var dataForm = getAllElementsFormImg("#modifAssocSelect_form");
        var objectForm = transformThisInObject(test, "#modifAssocSelect_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/modifAssocSelectController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
            }
        });
        location.reload(true);
    });

    $("#ajoutMembre_form").submit(function (event) {
        //Empêche l'html de se refresh

        event.preventDefault();

        var test = getAllElementsForm("#ajoutMembre_form");
        var dataForm = getAllElementsFormImg("#ajoutMembre_form");
        var objectForm = transformThisInObject(test, "#ajoutMembre_form");

        if (checkAllForm(objectForm) === false) {
            return false;
        }

        //appel AJAX 
        //Faire la méthode post en ajax pour pouvoir afficher le chargement, si ca à marcher ou si ca a échoué. 
        $.ajax({
            url: "../controller/ajoutMembreAssocController.php",
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === '"UserDejaDansUneAssoc"') {
                    $("#userDejaDansAssoc").show();
                }
                else {
                    $("#userDejaDansAssoc").hide();
                    location.reload(true);
                }
            }
        });
    });

    ////////// NON VALIDATION DE FORMULAIRE /////////////////

    $("#afficherModifAnnonce").click(function () {
        if ($('#afficherModifAnnonce').attr('name') === 'cacherModifAnnonce') {
            $('#modifAnnonce').hide();
            $('#afficherModifAnnonce').attr('name', 'afficherModifAnnonce');
        }
        else {
            $('#modifAnnonce').show();
            $('#afficherModifAnnonce').attr('name', 'cacherModifAnnonce');
        }
    });

    $("#supprimerAnnonce").click(function () {
        $("#supprimerAnnonce").hide();
        $("#supprimerAnnonceDef").show();
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
    } else {
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

/*
function add_to_session(id) {
    e.preventDefault();
    var test = id;
    $.ajax({
        url: "../controller/uneAnnonceController.php",
        type: "POST",
        data: { index: test },
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
        }
    });
}
*/