/*
 * Inscription.js
 * La liste des villes est remplie à partir d'un fichier JSON GET
 * Le mot de passe est visible/non visible
 * Inscription en mode AJAX-POST dans une BD
 */
let lbMotDePasseAffiche = false;
let lbMotDePasseAffiche2 = false;

/**
 *
 * @returns {undefined}
 */
function initInscription() {
  console.log("--- initInscription ---");

  remplirListeVilles();

  $("#mdpVisible").on("click", afficherMasquerMotDePasse);
  $("#mdpVisible2").on("click", afficherMasquerMotDePasse2);
  $("#btValider").on("click", valider);

  // En periode de test
  enTest();
} /// initInscription

function enTest() {
  // En periode de test
  $("#inNom").val("Reporter");
  // $("#inPrenom").val("Reporter");
  // $("#inEmail").val("tintin@free.fr");
  $("#inMDP").val("Mdp12345");
  $("#inMDP2").val("Mdp12345");
  $("#inTelephone").val("0700000000");
  $("#inAdresse").val("333, rue du fg st Antoine");

  /*
   * PSEUDO UNIQUE et EMAIL UNIQUE
   */
  let nomUnique = "";
  let emailUnique = "";

  for (let i = 1; i <= 10; i++) {
    let x = Math.floor(Math.random() * 26);
    let char = String.fromCharCode(97 + x);
    //        console.log(x)
    //        console.log(char)
    nomUnique += char;
  }
  emailUnique = nomUnique + "@gmail.com";

  $("#inEmail").val(emailUnique);
  $("#inNom").val(nomUnique);
  $("#inPrenom").val(nomUnique);
} /// enTest

function valider(event) {
  console.log("*** VALIDER ***");

  event.preventDefault();

  // Initialisation
  let liKO = 0;
  let message = "";

  let nom = $("#inNom").val().trim();
  //   console.log("nom : " + nom);
  let prenom = $("#inPrenom").val().trim();
  //   console.log("prenom : " + prenom);
  let email = $("#inEmail").val().trim();
  //   console.log("email : " + email);
  let mdp = $("#inMDP").val().trim();
  //   console.log("mdp : " + mdp);
  let mdp2 = $("#inMDP2").val().trim();
  //   console.log("mdp2 : " + mdp2);
  let telephone = $("#inTelephone").val().trim();
  //   console.log("telephone : " + telephone);
  let adresse = $("#inAdresse").val().trim();
  //   console.log("adresse : " + adresse);
  let ville = $("#slctVille").val().trim();
  //   console.log("ville : " + ville);

  // Controle des valeurs saisies
  /*
   * NOM
   */
  if (nom === "") {
    liKO++;
    $("#inNom").css("backgroundColor", "#FF0000");
    message += "Nom vide !<br>";
  } else {
    if (!isNomSansAccent(nom)) {
      liKO++;
      $("#inNom").css("backgroundColor", "#FF0000");
      message += "Nom invalide !<br>";
    } else {
      $("#inNom").removeAttr("style");
    }
    message += nom + "<br>";
  }

  /*
   * PRENOM
   */
  if (prenom === "") {
    liKO++;
    $("#inPrenom").css("backgroundColor", "#FF0000");
    message += "Prenom vide !<br>";
  } else {
    if (!isNomAvecAccent(prenom)) {
      liKO++;
      $("#inPrenom").css("backgroundColor", "#FF0000");
      message += "Nom invalide !<br>";
    } else {
      $("#inPrenom").removeAttr("style");
    }
    message += prenom + "<br>";
  }

  /*
   * EMAIL
   */
  if (email === "") {
    liKO++;
    $("#inEmail").css("backgroundColor", "#FF0000");
    message += "Email vide !<br>";
  } else {
    if (!isEmail(email)) {
      liKO++;
      $("#inEmail").css("backgroundColor", "#FF0000");
      message += "Email invalide !<br>";
    } else {
      $("#inEmail").removeAttr("style");
    }
    message += email + "<br>";
  }

  /*
   * MOT DE PASSE
   */
  if (mdp === "") {
    liKO++;
    $("#inMDP").css("backgroundColor", "#FF0000");
    message += "MDP1 vide !<br>";
  }

  if (mdp2 === "") {
    liKO++;
    $("#inMDP2").css("backgroundColor", "#FF0000");
    message += "MDP2 vide !<br>";
  } else {
    if (mdp != mdp2) {
      liKO++;
      $("#inMDP").css("backgroundColor", "#FF0000");
      $("#inMDP2").css("backgroundColor", "#FF0000");
      message += "Les deux MDP doivent être identiques<br>";
    } else {
      if (!isMDPFort(mdp)) {
        liKO++;
        $("#inMDP").css("backgroundColor", "#FF0000");
        $("#inMDP2").css("backgroundColor", "#FF0000");
        message +=
          "Les MDP doivent comprendre entre 6 et 10 caractères, 1 minuscule, 1 majuscule et 1 chiffre.<br>";
      } else {
        $("#inMDP").removeAttr("style");
        $("#inMDP2").removeAttr("style");
      }
    }
    message += mdp + "<br>";
  }

  /*
   * TELEPHONE
   */
  if (telephone === "") {
    liKO++;
    $("#inTelephone").css("backgroundColor", "#FF0000");
    message += "Telephone vide !<br>";
  } else {
    if (!isTelephoneFR(telephone)) {
      liKO++;
      $("#inTelephone").css("backgroundColor", "#FF0000");
      message += "Telephone invalide !<br>";
    } else {
      $("#inTelephone").removeAttr("style");
    }
    message += telephone + "<br>";
  }

  /*
   * ADRESSE
   */
  if (adresse === "") {
    liKO++;
    $("#inAdresse").css("backgroundColor", "#FF0000");
    message += "Adresse vide !<br>";
  } else {
    if (!isAdresse(adresse)) {
      liKO++;
      $("#inAdresse").css("backgroundColor", "#FF0000");
      message += "Adresse invalide !<br>";
    } else {
      $("#inAdresse").removeAttr("style");
    }
    message += adresse + "<br>";
  }

  /*
   * VILLE
   */
  if (ville == 0) {
    liKO++;
    $("#slctVille").css("backgroundColor", "#FF0000");
    message += "Pas de ville selectionnée !<br>";
  } else {
    $("#slctVille").removeAttr("style");
    message += ville + "<br>";
  }

  console.log("liKO : " + liKO);

  // Test pour permettre d'envoyer le formulaire d'inscription au controlleur
  if (liKO != 0) {
    event.preventDefault();
    // $("#lblMessage").html(message);
  } else {
    // CALL fonction inserer...
    insererDansBD(nom, prenom, email, mdp, telephone, adresse, ville);
  }
} /// afficher

function afficherMasquerMotDePasse() {
  console.log("--- afficherMasquerMotDePasse ---");
  if (lbMotDePasseAffiche) {
    $("#inMDP").attr("type", "password");
  } else {
    $("#inMDP").attr("type", "text");
  }
  lbMotDePasseAffiche = !lbMotDePasseAffiche;
  console.log("afficherMasquerMotDePasse : " + lbMotDePasseAffiche);
} /// afficherMasquerMotDePasse

function afficherMasquerMotDePasse2() {
  console.log("--- afficherMasquerMotDePasse2 ---");
  if (lbMotDePasseAffiche2) {
    $("#inMDP2").attr("type", "password");
  } else {
    $("#inMDP2").attr("type", "text");
  }
  lbMotDePasseAffiche2 = !lbMotDePasseAffiche2;
  console.log("afficherMasquerMotDePasse2 : " + lbMotDePasseAffiche2);
} /// afficherMasquerMotDePasse2

function remplirListeVilles() {
  // On crée un élément <option>
  let opt = $("<option>");
  // On met "0" dans la value de l'option
  opt.val("0");
  // Le texte dans l'<option>
  opt.html("--- Sélectionnez une ville test---");
  // Ajout de l'option au <select>
  $("#slctVille").append(opt);

  let xhr = $.get(
    "https://geo.api.gouv.fr/departements/59/communes",
    "json" // requête vers la ressource .json
  ); //get

  xhr.done(
    (data) => {
      for (let i = 0; i < data.length; i++) {
        // console.log("data.cp : " + data[i].code);
        // boucle sur le tableau d'objets json
        let option = $("<option>"); // Création de l'élément Option de chaque ville
        option.val(data[i].codesPostaux[0]); // assignation de l'ID à la value de l'élement option
        option.html(data[i].nom); // assignation du nom de la ville dans le html de l'élément option
        $("#slctVille").append(option); // ajout de l'élément Option dans le select
      } // for
    } // function data
  ); // getJson.done

  xhr.fail(() => {
    $("#lblMessage").html("Erreur de chargement du fichier");
  });
} /// remplirListeVilles

function insererDansBD(nom, prenom, email, mdp, telephone, adresse, cp) {
  console.log("*** insererDansBD ***");
  console.log(
    "nom : " +
      nom +
      "prenom : " +
      prenom +
      "email : " +
      email +
      "mdp : " +
      mdp +
      "telephone : " +
      telephone +
      "adresse : " +
      adresse +
      "cp : " +
      cp
  );

  let valider = "1";

  //    let dataToSend = {civilite: data.civilite, nom: data.nom, prenom: data.prenom, dateDeNaissance: data.dateDeNaissance, cv: data.cv, adresse: data.adresse, cp: data.cp, email: data.email, pseudo: data.pseudo, mdp: data.mdp, hobbies: data.hobbies, newsLetter: data.newsLetter}
  //    console.log(dataToSend)
  // Requete AJAX de type POST
  // TODO : passer par ROUTES.php puis UtilisateursCTRL.php ...
  // Les codes PHP doivent être sur le serveur Apache sur le port 80
  let jqXHR = $.post("http://localhost//AppBackECF/CTRL/inscription.php", {
    nom: nom,
    prenom: prenom,
    email: email,
    mdp: mdp,
    telephone: telephone,
    adresse: adresse,
    cp: cp,
    valider: valider,
  }); /// $.post
  jqXHR.done((data) => {
    //
    console.log("data dans done");
    console.log("data : " + data);
    let message = "";
    if (data == "1") {
      message = "Ajout réussi";
    } else {
      message = "Ajout raté";
    }
    console.log("message" + message);
    $("#lblMessage").html(message);
  });

  jqXHR.fail((xhr, statut, erreur) => {
    console.log(xhr);
    $("#lblMessage").html("Erreur : " + xhr.status + "-" + xhr.statusText);
  });
} /// insererDansBD

/*
 * MAIN
 */

$(document).ready(initInscription);
