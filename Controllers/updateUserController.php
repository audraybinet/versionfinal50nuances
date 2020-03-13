<?php
  require_once ROOT .'/Utils/Database.php';
  require_once ROOT . '/Models/User.php';
  if(!isset($_SESSION['auth']['login'])){
    header('Location:login.php');
    exit();
}
  
    $user = new user();
    $user->id = htmlspecialchars($_SESSION['auth']['id']);
    $user->getOne();

/**
 * 
 * @global type $errors
 * @param type $key
 * @return type
 */
function showError($key) {
    global $errors; //Récupère la variable $errors dans la portée globale
    return !empty($errors[$key]) ? '<div class="bg-danger">' . $errors[$key] . '</div>' : '';
}

// création des variables REGEX
$lastNameReg = '/^[\w\-]{3,30}$/'; //^[a-zA-Z]{3,30}$/';
$firstNameReg = '/^[\w\-]{3,30}$/';
$emailReg = '/^[^\s@]+@[^\s@]+\.[^\s@]{2,3}$/'; //^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$phoneReg = '/^[0-9][0-9\/]{0,13}[0-9][0-9\/]{3}/';

//Si je click sur valider et récupére le post submit
if (isset($_POST['submit'])) {
    //VERIFICATION LASTNAME
    //vérification si le post lastName existe
    if (isset($_POST['lastname'])) {
        //vérification si le post lastName est différent de vide
        if (!empty($_POST['lastname'])) {
            //vérification du post lastName avec la regex
            if (preg_match($lastNameReg, $_POST['lastname'])) {
                //si oui je créer la variable $lastName avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
                $lastname = htmlspecialchars((string) $_POST['lastname']);
            } else {
                //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
                $errors['lastname'] = "Le nom ne doit contenir que des lettres majuscule et minuscule entre 3 et 30 caractères";
            }
        } else {
            //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['lastname'] = "Le nom ne peut être vide";
        }
    }
    //VERIFICATION FIRSTNAME
    //vérification si le post lastName existe
    if (isset($_POST['firstname'])) {
        //verification si le post firstName est différent de vide
        if (!empty($_POST['firstname'])) {
            //vérification du post firstName avec la regex
            if (preg_match($firstNameReg, $_POST['firstname'])) {
                //si oui je créer la variable $firstName avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
                $firstname = htmlspecialchars((string) $_POST['firstname']);
            } else {
                //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
                $errors['firstname'] = "Le prénom ne doit contenir que des lettres majuscule et minuscule entre 3 et 30 caractères";
            }
        } else {
            //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['firstname'] = "Le prénom ne peut être vide";
        }
    }
    //VERIFICATION EMAIL
    //vérification si le post email existe
    if (isset($_POST['email'])) {
        //verification si le post email est différent de vide       
        if (!empty($_POST['email'])) {
            //vérification du post avec la regex
            if (preg_match($emailReg, $_POST['email'])) {
                //si oui je créer la variable £email avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
                $email = htmlspecialchars((string) $_POST['email']);
            } else {
                //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
                $errors['email'] = "Veuillez saisir une adresse mail valide. Ex: xxxxx@xxxxx.xx";
            }
        } else {
            //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['email'] = "L'adresse Email ne peut être vide";
        }
    }
    if (empty($errors)) {
        
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->email = $email;
        $user->updateUser();
        header('location:dashboard.php?id='.$user->id);
    }
   
    }
    
    //Si aucune erreur dans mon tableau d'erreur alors j'instencie mon objet user. 
    //$newUSer devient une instance de la classe user.
    //la methode magique construct est appelée automatiquement 
    //grace au mot clé new.
    /**/
    
?>
<?php require_once ROOT . '/Views/updateUser.php'; ?>