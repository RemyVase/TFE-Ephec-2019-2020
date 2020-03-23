<?php

class dbAccess
{

    private $pdo = null;

    public function connexionDB()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=tfe;charset=utf8", "root", "root");
        } catch (Exception $e) {
            die("Erreur :" . $e->getMessage());
        }
    }

    public function callProcedure($nomProcedure, $procParams = array())
    {
        $params = array();
        switch ($nomProcedure) {
            case 'checkNbAssoc':
            case 'checkNbAnimaux':
            case 'checkNbOffre':
            case 'checkNbDemande':
                array_push($params);

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
        switch ($nomProcedure) {
            case 'checkMail':
            case 'checkPseudo':
            case 'checkPassword':
            case 'checkUserIntoAssoc':
            case 'deleteAnimal':
            case 'deleteDemande':
            case 'deleteOffre':
            case 'deleteAssoc':
            case 'recupOneAssoc':
            case 'recupMonAssoc':
            case 'checkAssoc':
            case 'recupOneAnimal':
                array_push($params, '?');

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
        switch ($nomProcedure) {
            case 'connexionUser':
            case 'gestionDeCompte':
            case 'modifDemande':
            case 'recupAllAssoc':
            case 'modifImgAssoc':
            case 'recupAllAnimaux':
            case 'modifImgAnimal':
            case 'recupAllOffres':
            case 'recupAllDemandes':
                array_push($params, '?', '?');

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
        switch ($nomProcedure) {
            case 'ajoutUser':
            case 'checkAnimal':
            case 'recupAllNosAnimaux':
            case 'checkOffre':
                array_push($params, '?', '?', '?');

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
        switch ($nomProcedure) {
            case 'modifOffre':
            case 'ajoutDemande':
                array_push($params, '?', '?', '?', '?', '?');

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
        switch ($nomProcedure) {
            case 'ajoutAnimal':
            case 'modifAnimal':
            case 'ajoutOffre':
                array_push($params, '?', '?', '?', '?', '?', '?');

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
        switch ($nomProcedure) {
            case 'ajoutAssoc':
            case 'modifAssoc':
                array_push($params, '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');

                try {
                    $this->connexionDB();
                    $procedureCall = 'call ' . $nomProcedure . '(' . join(',', $params) . ')';
                    $requete = $this->pdo->prepare($procedureCall);
                    $requete->execute($procParams);
                    return $requete->fetchAll();
                } catch (Exception $e) {
                    die("Erreur :" . $e->getMessage());
                }
                break;
        }
    }
}
