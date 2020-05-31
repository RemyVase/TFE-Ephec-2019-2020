<?php
session_start();
$currentPage = "messagerie";
include '../controller/listeConversationsController.php';
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area_connexion">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Messagerie</h2>
                        <div class="page_link">
                            <p style="color : white;">Retrouvez tous vos messages ici</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->

    <!------ Include the above in your HEAD tag ---------->

    <style>
        .container {
            max-width: 1030px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }

        .top_spac {
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 550px;
            overflow-y: scroll;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>
    <div class="container">
        <h3 class=" text-center">Messages</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Conversations</h4>
                        </div>

                    </div>

                    <div class="inbox_chat">
                        <?php foreach ($recupAllConversation as $conv) : ?>

                            <?php
                            $annee = date('Y', strtotime($conv{
                                'date_message'}));
                            $mois = date('m', strtotime($conv{
                                'date_message'}));
                            $jour = date('d', strtotime($conv{
                                'date_message'}));
                            $date = $jour . '/' . $mois . '/' . $annee;
                            ?>
                            <?php if ($conv{
                                'lu_destinataire'} === "0") : ?>
                                <?php $checkUserIntoAssoc = $db->callProcedure('checkUserIntoAssoc', [$conv{
                                    'id_user'}]) ?>
                                <?php if ($conv{
                                    'id_envoyeur'} === $_SESSION['id']) : ?>
                                    <div name="conversation" id="<?= $conv{
                                                                        'id_convers'} ?>" onclick="changementMessage(<?= (!empty($_SESSION['idAssoc']) ? $conv{
                                                                                                                            'id_convers'} : $conv{
                                                                                                                            'id_convers'} . ",'" . $conv{
                                                                                                                            'nom_assoc'} . "'"); ?>)" style="cursor: pointer;" class="chat_list">

                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <?php if (!empty($_SESSION['idAssoc'])) : ?>
                                                    <?php $recupPseudoConv = $db->callProcedure('messagePseudoConvAssoc', [$conv{
                                                        'id_convers'}, $_SESSION['idAssoc']]); ?>
                                                    <?php $recupPseudoUser = $db->callProcedure('messageRecupPseudoUser', [$conv{
                                                        'id_convers'}]); ?>
                                                    <?php $checkUser = $db->callProcedure('messageCheckUser', [$conv{
                                                        'id_convers'}]); ?>
                                                    <?php if (!empty($checkUser)) : ?>
                                                        <h5><?= $recupPseudoUser[0]{
                                                                'pseudo_user'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                    <?php else : ?>
                                                        <h5><?= $recupPseudoConv[0]{
                                                                'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                    <?php endif ?>
                                                <?php else : ?>
                                                    <h5><?= $conv{
                                                            'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                <?php endif ?>
                                                <p><?= substr($conv{
                                                        'contenu_message'},0,15) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($checkUserIntoAssoc[0]{
                                    'id_assoc'} === $_SESSION['idAssoc'] && $_SESSION['idAssoc'] !== NULL) : ?>
                                    <div name="conversation" id="<?= $conv{
                                                                        'id_convers'} ?>" onclick="changementMessage(<?= (!empty($_SESSION['idAssoc']) ? $conv{
                                                                                                                            'id_convers'} : $conv{
                                                                                                                            'id_convers'} . ",'" . $conv{
                                                                                                                            'nom_assoc'} . "'"); ?>)" style="cursor: pointer;" class="chat_list">

                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <?php if (!empty($_SESSION['idAssoc'])) : ?>
                                                    <?php $recupPseudoConv = $db->callProcedure('messagePseudoConvAssoc', [$conv{
                                                        'id_convers'}, $_SESSION['idAssoc']]); ?>
                                                    <?php $recupPseudoUser = $db->callProcedure('messageRecupPseudoUser', [$conv{
                                                        'id_convers'}]); ?>
                                                    <?php $checkUser = $db->callProcedure('messageCheckUser', [$conv{
                                                        'id_convers'}]); ?>
                                                    <?php if (!empty($checkUser)) : ?>
                                                        <h5><?= $recupPseudoUser[0]{
                                                                'pseudo_user'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                    <?php else : ?>
                                                        <h5><?= $recupPseudoConv[0]{
                                                                'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                    <?php endif ?>
                                                <?php else : ?>
                                                    <h5><?= $conv{
                                                            'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                <?php endif ?>
                                                <p><?= substr($conv{
                                                        'contenu_message'},0,15) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div name="conversation" id="<?= $conv{
                                                                        'id_convers'} ?>" onclick="changementMessage(<?= (!empty($_SESSION['idAssoc']) ? $conv{
                                                                                                                            'id_convers'} : $conv{
                                                                                                                            'id_convers'} . ",'" . $conv{
                                                                                                                            'nom_assoc'} . "'"); ?>)" style="cursor: pointer;" class="chat_list active_chat">

                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <?php if (!empty($_SESSION['idAssoc'])) : ?>
                                                    <?php $recupPseudoConv = $db->callProcedure('messagePseudoConvAssoc', [$conv{
                                                        'id_convers'}, $_SESSION['idAssoc']]); ?>
                                                    <?php $recupPseudoUser = $db->callProcedure('messageRecupPseudoUser', [$conv{
                                                        'id_convers'}]); ?>
                                                    <?php $checkUser = $db->callProcedure('messageCheckUser', [$conv{
                                                        'id_convers'}]); ?>
                                                    <?php if (!empty($checkUser)) : ?>
                                                        <h5><?= $recupPseudoUser[0]{
                                                                'pseudo_user'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                    <?php else : ?>
                                                        <h5><?= $recupPseudoConv[0]{
                                                                'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                    <?php endif ?>
                                                <?php else : ?>
                                                    <h5><?= $conv{
                                                            'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                <?php endif ?>
                                                <p><?= substr($conv{
                                                        'contenu_message'},0,15) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <div name="conversation" id="<?= $conv{
                                                                    'id_convers'} ?>" onclick="changementMessage(<?= (!empty($_SESSION['idAssoc']) ? $conv{
                                                                                                                        'id_convers'} : $conv{
                                                                                                                        'id_convers'} . ",'" . $conv{
                                                                                                                        'nom_assoc'} . "'"); ?>)" style="cursor: pointer;" class="chat_list">

                                    <div class="chat_people">
                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="chat_ib">
                                            <?php if (!empty($_SESSION['idAssoc'])) : ?>
                                                <?php $recupPseudoConv = $db->callProcedure('messagePseudoConvAssoc', [$conv{
                                                    'id_convers'}, $_SESSION['idAssoc']]); ?>
                                                <?php $recupPseudoUser = $db->callProcedure('messageRecupPseudoUser', [$conv{
                                                    'id_convers'}]); ?>
                                                <?php $checkUser = $db->callProcedure('messageCheckUser', [$conv{
                                                    'id_convers'}]); ?>
                                                <?php if (!empty($checkUser)) : ?>
                                                    <h5><?= $recupPseudoUser[0]{
                                                            'pseudo_user'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                <?php else : ?>
                                                    <h5><?= $recupPseudoConv[0]{
                                                            'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <h5><?= $conv{
                                                        'nom_assoc'} ?><span class="chat_date"><?= $date ?></span></h5>
                                            <?php endif ?>
                                            <p><?= substr($conv{
                                                        'contenu_message'},0,15) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history" id="endroitMessages">

                    </div>
                    <div class="type_msg">

                        <div class="input_msg_write">
                            <form id="formMessage">
                                <input id="messageMessagerie" type="text" class="write_msg" placeholder="Type a message" />
                                <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
                                <button class="msg_send_btn" type="button" onclick="envoiMessage(<?= $_SESSION['id'] ?>,$('#messageMessagerie').val(), '<?= $_SESSION['token']; ?>') "><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                <form>
                        </div>

                    </div>
                </div>
            </div>


            <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>

        </div>
    </div>
    <!--================Contact Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
    <script>
        var idConvers;

        function changementMessage(id, nomAssoc = "") {
            idConvers = id;
            $.ajax({
                url: "../controller/listeMessagesController.php",
                type: "POST",
                data: {
                    "data": id
                },
                success: function(response) {
                    if (response === '"fraude"') {
                        $('.msg_history').empty();
                        ret = '<h1 style="color:red">Ces messages ne sont pas les vôtres !</h1>';
                    } else {
                        var month = new Array();
                        month[0] = "janvier";
                        month[1] = "février";
                        month[2] = "mars";
                        month[3] = "avril";
                        month[4] = "mai";
                        month[5] = "juin";
                        month[6] = "juillet";
                        month[7] = "aout";
                        month[8] = "septembre";
                        month[9] = "octobre";
                        month[10] = "novembre";
                        month[11] = "décembre";
                        var tab = JSON.parse(response);
                        var ret = "";
                        $('.msg_history').empty();
                        for (i = 0; i < tab.length; i++) {
                            var date = "";
                            var datefull = new Date(tab[i]['date_message']);
                            if ((datefull).getMinutes() < 10) {
                                minutes = '0' + (datefull).getMinutes();
                            } else {
                                minutes = (datefull).getMinutes();
                            }
                            var date = (datefull).getDate() + " " + (month[(datefull).getMonth()]) + " " + (datefull).getFullYear();
                            var heure = (datefull).getHours() + 'h' + minutes;
                            if (tab[i]['id_envoyeur'] != <?= $_SESSION['id'] ?>) {
                                ret += '<div class="incoming_msg">';
                                ret += '<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>';
                                ret += '<div class="received_msg">';
                                ret += '<div class="received_withd_msg">';
                                ret += '<span class="time_date">' + ((nomAssoc) ? nomAssoc + ' - ' : '') + tab[i]['pseudo_user'] + '</span>';
                                ret += '<p>' + tab[i]['contenu_message'] + '</p>';
                                ret += '<span class="time_date">' + date + " " + heure + '</span>';
                                ret += '</div>';
                                ret += '</div>';
                                ret += '</div>';
                            } else {
                                ret += '<div class="outgoing_msg">';
                                ret += '<div class="sent_msg">';
                                ret += '<span class="time_date">' + tab[i]['pseudo_user'] + '</span>';
                                ret += '<p>' + tab[i]['contenu_message'] + '</p>';
                                ret += '<span class="time_date">' + date + " " + heure + '</span>';
                                ret += '</div>';
                                ret += '</div>';
                            }
                        }
                    }
                    $('#' + id).removeClass("active_chat");
                    $('.msg_history').append(ret);
                    let element = document.getElementById('endroitMessages');
                    element.scrollTop = element.scrollHeight;
                }
            });

        }

        function envoiMessage(idUser, message,token) {
            $.ajax({
                url: "../controller/envoieMessageMessagerieController.php",
                type: "POST",
                data: {
                    "idConv": idConvers,
                    "idUser": idUser,
                    "message": message,
                    "token": token
                },
                success: function(response) {
                    changementMessage(idConvers);
                    $("#formMessage").trigger("reset");

                }
            });
        }

        window.setInterval(function() {
            changementMessage(idConvers);
            let element = document.getElementById('endroitMessages');
            element.scrollTop = element.scrollHeight;
        }, 5000);
    </script>
</body>

</html>