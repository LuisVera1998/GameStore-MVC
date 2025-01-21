<?php
function modificarPerfil($connexio, $id_usuario)  
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $nom = trim($_POST['nom']);
        $email = trim($_POST['email']);
        $password = trim($_POST['contrasenya']);
        $adreca = trim($_POST['adreca']);
        $poblacio = trim($_POST['poblacio']);
        $codi_postal = trim($_POST['codipostal']);

        // Validaciones
        if (empty($nom) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚàèòÀÈÒñÑ ]+$/", $nom)) {
            return "El nom només pot contenir lletres i espais.";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "El correu electrònic no és vàlid.";
        }
        if (empty($password) || !preg_match("/^[a-zA-Z0-9]+$/", $password)) {
            return "La contrasenya ha de ser alfanumèrica.";
        }
        if (strlen($adreca) > 30) {
            return "L'adreça no pot tenir més de 30 caràcters.";
        }
        if (strlen($poblacio) > 30) {
            return "La població no pot tenir més de 30 caràcters.";
        }
        if (empty($codi_postal) || !preg_match("/^\d{5}$/", $codi_postal)) {
            return "El codi postal ha de contenir exactament 5 dígits.";
        }

        $comprovacioEmail = "SELECT COUNT(*) FROM usuarios WHERE email = $1 AND id != $2";
        $existeix = pg_query_params($connexio, $comprovacioEmail, array($email, $id_usuario));
        if (pg_fetch_result($existeix, 0, 0) > 0) {
            return "El correu electrònic ja està registrat amb un altre usuari.";
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $imagen_path = null;


        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $nombre_archivo = $_FILES['imagen']['name'];
            $tmp_nombre = $_FILES['imagen']['tmp_name'];
            $filesAbsolutePath = '/home/TDIW/tdiw-g10/public_html/uploadedFiles/';
            $filePath = '/uploadedFiles/';


            $nombre_archivo = uniqid('img_') . '.' . pathinfo($nombre_archivo, PATHINFO_EXTENSION);


            if (move_uploaded_file($tmp_nombre, $filesAbsolutePath . $nombre_archivo)) {

                $imagen_path = $filePath . $nombre_archivo;
            } else {
                return "Error al subir la imagen.";
            }
        }


        if ($imagen_path) {
            $sql = "UPDATE usuarios SET nom = $1, email = $2, password = $3, adreca = $4, poblacio = $5, codipostal = $6, imagen = $7 WHERE id = $8";
            $params = array($nom, $email, $hashed_password, $adreca, $poblacio, $codi_postal, $imagen_path, $id_usuario);
        } else {

            $sql = "UPDATE usuarios SET nom = $1, email = $2, password = $3, adreca = $4, poblacio = $5, codipostal = $6 WHERE id = $7";
            $params = array($nom, $email, $hashed_password, $adreca, $poblacio, $codi_postal, $id_usuario);
        }


        $resultat = pg_query_params($connexio, $sql, $params);

        if ($resultat) {
            return "Perfil actualizado correctamente.";
        } else {
            return "Error en la operación.";
        }
    }

    return "Error.";
}
?>
