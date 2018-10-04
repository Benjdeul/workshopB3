<!DOCTYPE html>
<html class="has-navbar-fixed-top">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">-->
        <title>Campus HEP Lyon Vaise</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!-- Bulma Version 0.7.1-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/bulma-modal-fx/dist/css/modal-fx.min.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.svg.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/chatbot.js"></script>
        <script type="text/javascript">
        $(function(){
          $("#navbar li").click(function(){
            for (var i = 1; i <= $("#navbar li").length; i++) {
               if($("#navbar li:nth-child("+i+")").text() == $(this).text()){
                  $("#navbar li:nth-child("+i+")").addClass("is-active");
               }
               else{
                  $("#navbar li:nth-child("+i+")").removeClass("is-active");
               }
            }
          });
          function activateModal(img){
            $('#modalplan').addClass('is-active');
            $("#imgplan").load(img);
          }
          function showPoint(etage, bat){
            $.getJSON("school.json", function(json) {
              var tbPos = [];
              for(var i=0; i<json.school.length; i++){
                if(json.school[i].etage == etage && json.school[i].pos.substr(0,1) == bat){
                  tbPos.push(json.school[i].pos);
                }
              }
              for(var i=0; i<json.lieu.length; i++){
                if(json.school[i].etage == etage && json.school[i].pos.substr(0,1) == bat){
                  tbPos.push(json.school[i].pos);
                }
              }
              for(var i=0; i<8; i++){
                if(!tbPos.includes(bat + i)){
                  switch (bat + i){
                  case "B0":
                    setTimeout(function(){$('#B0').hide();}, 30);
                    break;
                  case "B1":
                    setTimeout(function(){$('#B1').hide();}, 30);
                    break;
                  case "B2":
                    setTimeout(function(){$('#B2').hide();}, 30);
                    break;
                  case "B3":
                    setTimeout(function(){$('#B3').hide();}, 30);
                    break;
                  case "B4":
                    setTimeout(function(){$('#B4').hide();}, 30);
                    break;
                  case "B5":
                    setTimeout(function(){$('#B5').hide();}, 30);
                    break;
                  case "L0":
                    setTimeout(function(){$('#L0').hide();}, 30);
                    break;
                  case "L1":
                    setTimeout(function(){$('#L1').hide();}, 30);
                    break;
                  case "L2":
                    setTimeout(function(){$('#L2').hide();}, 30);
                    break;
                  case "L3":
                    setTimeout(function(){$('#L3').hide();}, 30);
                    break;
                  case "L4":
                    setTimeout(function(){$('#L4').hide();}, 30);
                    break;
                  }
                }
              }
            });
          }
          $("#XMLID_1_LECLAIR").click(function(){
            activateModal('svg/leclair_detail.svg');
            showPoint(2,"L");
          });
          $("#XMLID_2_LECLAIR").click(function(){
            activateModal('svg/leclair_detail.svg');
            showPoint(3,"L");
          });
          $("#XMLID_3_LECLAIR").click(function(){
            activateModal('svg/leclair_detail.svg');
            showPoint(4,"L");
          });
          $("#XMLID_4_LECLAIR").click(function(){
            activateModal('svg/leclair_detail.svg');
            showPoint(5,"L");
          });
          $("#XMLID_5_LECLAIR").click(function(){
            activateModal('svg/leclair_detail.svg');
            showPoint(0,"L");
          });
          $("#XMLID_1_CASSIN").click(function(){
            activateModal('svg/berthet_detail.svg');
            showPoint(0,"B");
          });
          $("#XMLID_2_CASSIN").click(function(){
            activateModal('svg/berthet_detail.svg');
            showPoint(1,"B");
          });
          $("#XMLID_3_CASSIN").click(function(){
            activateModal('svg/berthet_detail.svg');
            showPoint(2,"B");
          });
          $("#XMLID_4_CASSIN").click(function(){
            activateModal('svg/berthet_detail.svg');
            showPoint(3,"B");
          });
          $("#XMLID_5_CASSIN").click(function(){
            activateModal('svg/berthet_detail.svg');
            showPoint(4,"B");
          });
          $("#XMLID_6_CASSIN").click(function(){
            activateModal('svg/berthet_detail.svg');
            showPoint(5,"B");
          });
          function verifChamps(champs)
          {
            var exp = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
            var tmp = false;
            champs.forEach(function(e){
              if(e.val() == "" || e.val() == null){
                if(e.is('select')){
                  e.parent("div").parent("div").parent("div").children('.help').remove();
                  e.parents('div').removeClass("is-danger");
                  e.parent("div").parent("div").after('<p style="font-weight: bold;" class="help is-danger">Champ vide</p>');
                  e.parents('div').addClass("is-danger");
                }
                else{
                  e.removeClass("is-danger");
                  e.parent('div').parent('div').children('.help').remove();
                  e.addClass("is-danger");
                  e.parent("div").after('<p style="font-weight: bold;" class="help is-danger">Champ vide</p>');
                }
                tmp = true;
              }
              else{
                if (e.is('[type=email]') && !exp.test(e.val())) {
                  e.removeClass("is-danger");
                  e.parent('div').parent('div').children('.help').remove();
                  $("#email").addClass("is-danger");
                  $("#email").parent("div").after('<p id="danger-msg" style="font-weight: bold;" class="help is-danger">Email invalide</p>');
                }
                else{
                  e.removeClass("is-danger");
                  e.parent('div').parent('div').children('.help').remove();
                  e.parent("div").parent("div").parent("div").children('.help').remove();
                  e.parents('div').removeClass("is-danger");
                }
              }
            });
            if(tmp == true){
              return false;
            }
            return true;
          }
          $("#submitcontact").click(function(e){
                e.preventDefault();
                var champs = [$('#nom'), $('#email'), $("#subject"), $("#message")];
                if(!verifChamps(champs)){
                  return null;
                }
                $("#notifenvoi").css('visibility', 'visible');
                $("#notifenvoi").append('Message bien envoyé');
                $('#nom').val('');
                $('#email').val('');
                $('#subject').val('');
                $('#message').val('');
                setTimeout(function() {
                  $("#notifenvoi").css('visibility', 'hidden');
                  $("#notifenvoi").text('');
                }, 3000);
            });
        });
        </script>
    </head>
    <body>
        <div id="notifenvoi" style="visibility: hidden; position: fixed; width: 100%; z-index: 30" class=" has-text-centered notification is-primary">      
        </div>
        <div id="modalplan" class="modal">
          <div class="modal-background"></div>
          <div class="modal-content">
              <div id="imgplan"></div>
          </div>
          <button class="modal-close is-large" aria-label="close" onclick="$('#modalplan').removeClass('is-active');"></button>
        </div>
        <nav id="navbar" class="navbar hero is-link is-fixed-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item image" href="" style="width: 100px; padding: 0;"><img src="img/logo-help.png" alt="Logo" style="max-height: 100%;"></a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">
                        <div class="tabs is-right">
                            <ul>
                                <li class="is-active"><a href="#anchorhome">Accueil</a></li>
                                <li><a href="#anchorplan">Plan</a></li>
                                <li><a href="#anchorchatbot">Chatbot</a></li>
                                <li><a href="#anchorecoles">Les écoles</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <section id="home" class="hero has-bg-img is-medium is-bold">
          <div id="anchorhome" style="visibility: hidden; top: -50px; position: relative;"></div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title has-text-white">
                    Bienvenue au CAMPUS HEP Lyon - René Cassin
                    </h1>
                    <h2 class="subtitle has-text-white">
                    Acteur incontournable de la région Auvergne-Rhône-Alpes en matière de formation, le CAMPUS HEP Lyon - René Cassin est le lieu fédérant la plus grande diversité d'écoles et de centres de formation de la région avec 13 filières de compétences métiers.
                    </h2>
                </div>
            </div>
        </section>
        <section id="plan" class="hero has-background-white is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title has-text-info">
                    Plans intéractif bâtiment René Cassin
                    </h1>
                    <h2 class="subtitle has-text-info">
                      <?php echo file_get_contents('img/maquette_renecassin.svg'); ?>
                      <!--<object id="svg-renecassin" data="img/maquette_renecassin.svg" type="image/svg+xml"></object>-->
                    </h2>
                </div>
                <br>
                <br>
                <div class="container has-text-centered">
                    <h1 class="title has-text-info">
                    Plans intéractif bâtiment Leclair
                    </h1>
                    <h2 class="subtitle has-text-info">
                      <?php echo file_get_contents('img/maquette_leclerc.svg'); ?>
                      <!--<object id="svg-leclair" data="img/maquette_leclerc.svg" type="image/svg+xml"></object>-->
                    </h2>
                </div>
            </div>
        </section>
        <section id="chatbot" class="hero has-background-info is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                   <h1 class="title has-text-white">
                    The new standard in &lt;insert industry here&gt;
                    </h1>
                    <h2 class="subtitle has-text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </h2>
                  </div>
            </div>
        </section>
        <section id="ecole" class="hero has-background-white is-bold">
            <div id="anchorecole" style="visibility: hidden; top: -50px; position: relative;"></div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title has-text-info">
                    Les écoles du campus HEP-Education Lyon
                    </h1>
                </div>
                <br>
                <?php include('schools.php') ?>
            </div>
        </section>
        <section id="contact" class="hero is-bold" style="background-color: #003366;">
            <div class="hero-body">
                <div class="container">
                  <form id="contactform">
                    <h1 class="title has-text-info">
                    Contactez nous!
                    </h1>
                    <div id="nomblock" class="field">
                      <label class="label">Nom</label>
                      <div class="control has-icons-left has-icons-right">
                        <input id="nom" class="input" type="text" placeholder="Votre nom">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>
          
                    <div id="emailblock" class="field">
                      <label class="label">Email</label>
                      <div class="control has-icons-left has-icons-right">
                        <input id="email" class="input" type="email" placeholder="Votre email">
                        <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </div>
                    </div>
                    
                    <div id="subjectblock" class="field">
                      <label class="label">Sujet</label>
                      <div class="control">
                        <div class="select">
                          <select id="subject">
                            <option value="" disabled selected hidden>Sujet de votre demande</option>
                            <option value="collective">La Collective HEP EDUCATION</option>
                            <option value="school">Les écoles et centres de formation membres de la Collective HEP EDUCATION</option>
                            <option value="presse">Les Relations Presse</option>
                            <option value="entreprise">Les Relations Entreprise</option>
                            <option value="other">Autre</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div id="messageblock" class="field">
                      <label class="label">Message</label>
                      <div class="control">
                        <textarea id="message" class="textarea" placeholder="Votre message"></textarea>
                      </div>
                    </div>
                    <div class="field is-grouped">
                      <div class="control">
                        <button class="button is-link" id="submitcontact">Submit</button>
                      </div>
                    </div>
                </div>
              </form>
            </div>
        </section>
        <script src="js/bulma.js"></script>
        <script src="js/jquery.svg.min.js"></script>
    </body>
</html>
