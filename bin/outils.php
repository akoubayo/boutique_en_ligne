<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of outils
 *
 * @author akoubayo
 */
function password($donnees) {
        $donnees .= 'cestpourtonbien' . $donnees;
        $donnees = sha1($donnees);
        $donnees = strtolower($donnees);
        $search = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        $replace = array('25-(5Y', '327)àç(A', '2_è(\'5E', 'DEDE&éà)ç585', '8àçé&)74DDZ', 'K&éDZ&874', 'JHJ&&=)K4558', 'jZ&=àçDj874', 'zdZ&=)D457', 'zdzd&àa8zdDZ', 'zdZ&à&çZDDAASS478', '48à&ç&ç7DEZS', 'DD&ç&çRAS7854', 'ZD&)&à574z', 'EF&)àçz874', 'jiHG85zsd', '548ZDAd', 'KJ58ZS4', 'ZDZ458', '51zdZZD', 'ZDZDqdsd87', 'SDsszDZ', '4588EDFSQ', 'zefze58', 'hgezjyufze-25:;', 'dss584-è_');
        $donnees = str_replace($search, $replace, $donnees);
        $donnees = sha1($donnees);
        return $donnees;
}

function postVerif($donnee) {
        $verif = array();
        foreach ($donnee as $key => $value) {
            $value = stripslashes($value);
            $value = addslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $verif[$key] = $value;
        }
        return $verif;
    }

function postVerifWhitTab($donnee) {
    $verif = array();
    foreach ($donnee as $key => $value) {
        if(!is_array($value))
        {
            $value = stripslashes($value);
            $value = addslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $verif[$key] = $value;
        }
        else
        {
            foreach ($value as $k => $v)
            {
                $value = stripslashes($v);
                $value = addslashes($v);
                $value = strip_tags($v);
                $value = htmlspecialchars($v);
                $verif[$key][$k] = $v;
            }
        }
    }
    return $verif;
}

function convertSemaine($jour) {
        switch ($jour) {
            case 1: $jours = "L ";
                break;
            case 2: $jours = "Ma ";
                break;
            case 3: $jours = "Me ";
                break;
            case 4: $jours = "J ";
                break;
            case 5: $jours = "V ";
                break;
            case 6: $jours = "S ";
                break;
            case 7: $jours = "D ";
                break;

            default: $jours = "Lundi";
                break;
        }
        return $jours;
    }

function convertSemaineFull($jour) {
        switch ($jour) {
            case 1: $jours = "Lundi";
                break;
            case 2: $jours = "Mardi";
                break;
            case 3: $jours = "Mercredi";
                break;
            case 4: $jours = "Jeudi";
                break;
            case 5: $jours = "Vendredi";
                break;
            case 6: $jours = "Samedi";
                break;
            case 7: $jours = "Dimanche";
                break;

            default: $jours = "Lundi";
                break;
        }
        return $jours;
    }

function convertMoisFull($moi) {
        switch ($moi) {
            case 1: $mois = "Janvier";
                break;
            case 2: $mois = "Février";
                break;
            case 3: $mois = "Mars";
                break;
            case 4: $mois = "Avril";
                break;
            case 5: $mois = "Mai";
                break;
            case 6: $mois = "Juin";
                break;
            case 7: $mois = "Juillet";
                break;
            case 8: $mois = "Aout";
                break;
            case 9: $mois = "Septembre";
                break;
            case 10: $mois = "Octobre";
                break;
            case 11: $mois = "Novembre";
                break;
            case 12: $mois = "Décembre";
                break;

            default: $mois = "Aout";
                break;
        }
        return $mois;
    }

function envoieMail($mail, $sujet, $message_txt, $message_html) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }
        $boundary = "-----=" . md5(rand());
        $header = "From: \"Webmeety\"<webmeety@webmeety.com>" . $passage_ligne;
        $header .= "Reply-to: \"Webmeety\" <webmeety@webmeety.com>" . $passage_ligne;
        $header .= "MIME-Version: 1.0" . $passage_ligne;
        $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;


        //=====Création du message.
        $message = $passage_ligne . "--" . $boundary . $passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message.= $passage_ligne . $message_txt . $passage_ligne;
        //==========
        if (!empty($message_html)) {
            $message.= $passage_ligne . "--" . $boundary . $passage_ligne;
            //=====Ajout du message au format HTML
            $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
            $message.= $passage_ligne . $message_html . $passage_ligne;
        }
        //==========
        $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
        $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
        //==========

        mail($mail, $sujet, $message, $header);
    }

function envoieMailPj($mail, $sujet, $message_txt, $message_html, $pj, $nomPj) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui présentent des bogues.
            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }
//=====Lecture et mise en forme de la pièce jointe.
        $fichier = fopen("" . $pj . "", "r");
        $attachement = fread($fichier, filesize("" . $pj . ""));
        $attachement = chunk_split(base64_encode($attachement));
        fclose($fichier);
//==========
//=====Création de la boundary.
        $boundary = "-----=" . md5(rand());
        $boundary_alt = "-----=" . md5(rand());
//==========
//=====Création du header de l'e-mail.
        $header = "From: \"Webmeety\"<dwebmeety@gmail.com>" . $passage_ligne;
        $header.= "Reply-to: \"Webmeety\" <dwebmeety@gmail.com>" . $passage_ligne;
        $header.= "MIME-Version: 1.0" . $passage_ligne;
        $header.= "Content-Type: multipart/mixed;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
//==========
//=====Création du message.
        $message = $passage_ligne . "--" . $boundary . $passage_ligne;
        $message.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary_alt\"" . $passage_ligne;
        $message.= $passage_ligne . "--" . $boundary_alt . $passage_ligne;
//=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message.= $passage_ligne . $message_txt . $passage_ligne;
//==========

        $message.= $passage_ligne . "--" . $boundary_alt . $passage_ligne;

//=====Ajout du message au format HTML.
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message.= $passage_ligne . $message_html . $passage_ligne;
//==========
//=====On ferme la boundary alternative.
        $message.= $passage_ligne . "--" . $boundary_alt . "--" . $passage_ligne;
//==========



        $message.= $passage_ligne . "--" . $boundary . $passage_ligne;

//=====Ajout de la pièce jointe.
        $message.= "Content-Type: application/pdf; name=\"" . $nomPj . "\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: base64" . $passage_ligne;
        $message.= "Content-Disposition: attachment; filename=\"" . $nomPj . "\"" . $passage_ligne;
        $message.= $passage_ligne . $attachement . $passage_ligne . $passage_ligne;
        $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
//========== 
//=====Envoi de l'e-mail.
        mail($mail, $sujet, $message, $header);

//==========
    }
function age($timeNaissance) {
        $age = date('Y') - date('Y', $timeNaissance);

        if (date('md') < date('md', $timeNaissance)) {
            $age--;
        }
        return $age;
    }


