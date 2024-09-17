/*
 * Register.js
 * Le mot de passe est visible/non visible
 * register en mode AJAX-POST dans une BD à voir si on fait comme ça ou pas
 */

let lbMotDePasseAffiche = false;
let lbMotDePasseAffiche2 = false;

function initRegister() {
  console.log("--- initInscription ---");

  $("#mdpVisible").on("click", afficherMasquerMotDePasse);
  $("#mdpVisible2").on("click", afficherMasquerMotDePasse2);
  $("#entrer").on("click", valider);

  // En periode de test
  enTest();
} /// initInscription

function enTest() {
  // En periode de test
  $("#nom").val("Neymar");
  $("#prenom").val("Jean");
  $("#adresse").val("1 rue du Test");
  $("#cp").val("59000");
  $("#email").val("jean.neymar@test.fr");
  $("#mdp").val("Mdp12345");
  $("#mdp2").val("Mdp12345");

  /*
   * PSEUDO UNIQUE et EMAIL UNIQUE
   */
  //   let nomUnique = "";
  //   let emailUnique = "";

  //   for (let i = 1; i <= 10; i++) {
  //     let x = Math.floor(Math.random() * 26);
  //     let char = String.fromCharCode(97 + x);
  //     //        console.log(x)
  //     //        console.log(char)
  //     nomUnique += char;
  //   }
  //   emailUnique = nomUnique + "@gmail.com";

  //   $("#inEmail").val(emailUnique);
  //   $("#inNom").val(nomUnique);
  //   $("#inPrenom").val(nomUnique);
} /// enTest

function afficherMasquerMotDePasse() {
  console.log("--- afficherMasquerMotDePasse ---");
  if (lbMotDePasseAffiche) {
    $("#mdp").attr("type", "password");
  } else {
    $("#mdp").attr("type", "text");
  }
  lbMotDePasseAffiche = !lbMotDePasseAffiche;
  // console.log("afficherMasquerMotDePasse : " + lbMotDePasseAffiche);
} /// afficherMasquerMotDePasse

function afficherMasquerMotDePasse2() {
  console.log("--- afficherMasquerMotDePasse2 ---");
  if (lbMotDePasseAffiche2) {
    $("#mdp2").attr("type", "password");
  } else {
    $("#mdp2").attr("type", "text");
  }
  lbMotDePasseAffiche2 = !lbMotDePasseAffiche2;
  // console.log("afficherMasquerMotDePasse2 : " + lbMotDePasseAffiche2);
} /// afficherMasquerMotDePasse2

function valider(event) {
  console.log("*** VALIDER ***");

  event.preventDefault();

  // Initialisation
  let liKO = 0;
  let message = "";

  let nom = $.trim($("#nom").val());
  // console.log("nom : " + $.trim(nom));
  let prenom = $.trim($("#prenom").val());
  // console.log("prenom : " + $.trim(prenom));
  let adresse = $.trim($("#adresse").val());
  // console.log("adresse : " + $.trim(adresse));
  let cp = $.trim($("#cp").val());
  // console.log("cp : " + $.trim(cp));
  let email = $.trim($("#email").val());
  // console.log("email : " + $.trim(email));
  let mdp = $.trim($("#mdp").val());
  // console.log("mdp : " + $.trim(mdp));
  let mdp2 = $.trim($("#mdp2").val());
  // console.log("mdp2 : " + $.trim(mdp2));

  // Controle des valeurs saisies
  /*
   * NOM
   */
  if (nom === "") {
    liKO++;
    $("#nom").addClass("is-invalid");
  } else {
    if (!isNomSansAccent(nom)) {
      liKO++;
      $("#nom").addClass("is-invalid");
    } else {
      $("#nom").addClass("is-valid");
    }
  } //nom

  /*
   * PRENOM
   */
  if (prenom === "") {
    liKO++;
    $("#prenom").addClass("is-invalid");
  } else {
    if (!isNomAvecAccent(prenom)) {
      liKO++;
      $("#prenom").addClass("is-invalid");
    } else {
      $("#prenom").addClass("is-valid");
    }
  } //prenom

  /*
   * ADRESSE
   */
  if (adresse === "") {
    liKO++;
    $("#adresse").addClass("is-invalid");
  } else {
    if (!isAdresse(adresse)) {
      liKO++;
      $("#adresse").addClass("is-invalid");
    } else {
      $("#adresse").addClass("is-valid");
    }
  } //adresse

  /*
   * CP
   */
  if (cp === "") {
    liKO++;
    $("#cp").addClass("is-invalid");
  } else {
    if (!isCPFR(cp)) {
      liKO++;
      $("#cp").addClass("is-invalid");
    } else {
      $("#cp").addClass("is-valid");
    }
  } // cp

  /*
   * EMAIL
   */
  if (email === "") {
    liKO++;
    $("#email").addClass("is-invalid");
  } else {
    if (!isEmail(email)) {
      liKO++;
      $("#email").addClass("is-invalid");
    } else {
      $("#email").addClass("is-valid");
    }
  } //email

  /*
   * MOT DE PASSE
   */
  if (mdp === "") {
    liKO++;
    $("#mdp").addClass("is-invalid");
  }

  if (mdp2 === "") {
    liKO++;
    $("#mdp2").addClass("is-invalid");
  } else {
    if (mdp != mdp2) {
      liKO++;
      $("#mdp").addClass("is-invalid");
      $("#mdp2").addClass("is-invalid");
    } else {
      if (!isMDPFort(mdp)) {
        liKO++;
        $("#mdp").addClass("is-invalid");
        $("#mdp2").addClass("is-invalid");
      } else {
        $("#mdp").addClass("is-valid");
        $("#mdp2").addClass("is-valid");
      }
    }
  } // mot de passe

  console.log("liKO : " + liKO);

  // Test pour permettre d'envoyer le formulaire d'inscription au controlleur
  if (liKO != 0) {
    event.preventDefault();
  } else {
    // CALL fonction inserer...
    insererDansBD(nom, prenom, adresse, cp, email, mdp);
  }
} /// valider

function insererDansBD(nom, prenom, adresse, cp, email, mdp) {
  console.log("*** insererDansBD ***");
  console.log(
    "nom : " +
      nom +
      "prenom : " +
      prenom +
      "adresse : " +
      adresse +
      "cp : " +
      cp +
      "email : " +
      email +
      "mdp : " +
      mdp
  );

  let valider = "1";

  //    let dataToSend = {civilite: data.civilite, nom: data.nom, prenom: data.prenom, dateDeNaissance: data.dateDeNaissance, cv: data.cv, adresse: data.adresse, cp: data.cp, email: data.email, pseudo: data.pseudo, mdp: data.mdp, hobbies: data.hobbies, newsLetter: data.newsLetter}
  //    console.log(dataToSend)
  // Requete AJAX de type POST
  // TODO : passer par ROUTES.php puis UtilisateursCTRL.php ...
  // Les codes PHP doivent être sur le serveur Apache sur le port 80
  let jqXHR = $.post(
    "http://localhost//Crochet_commerce/controllers/registerUtilisateur.php",
    {
      nom: nom,
      prenom: prenom,
      adresse: adresse,
      cp: cp,
      email: email,
      mdp: mdp,
      valider: valider,
    }
  ); /// $.post
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

$(document).ready(initRegister);
