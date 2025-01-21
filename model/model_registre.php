<?php
    function registreUsuari($connexio) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nom = trim($_POST['nom']);
            $email = trim($_POST['email']);
            $password = trim($_POST['contrasenya']);
            $adreca = trim($_POST['adreca']);
            $poblacio = trim($_POST['poblacio']);
            $codi_postal = trim($_POST['codipostal']);
            
            // Validar nom
            if (empty($nom) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚàèòÀÈÒñÑ ]+$/", $nom)) {
                return "El nombre solo puede contener letras y espacios.";
            }
            
            // Validar correu
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "El correo electrónico no es válido.";
            }
            
            // Validar passw
            if (empty($password) || !preg_match("/^[a-zA-Z0-9]+$/", $password)) {
                return "La contraseña debe ser alfanumérica.";
            }
            
            // Validar direcció
            if (strlen($adreca) > 30) {
                return "La dirección no puede tener más de 30 caracteres.";
            }
            
            // Validar poblacio
            if (strlen($poblacio) > 30) {
                return "La ciudad no puede tener más de 30 caracteres.";
            }
            
            // Validar codi postal
            if (empty($codi_postal) || !preg_match("/^\d{5}$/", $codi_postal)) {
                return "El código postal debe contener exactamente 5 dígitos.";
            }
    

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            // Comprovar si ja existeix
            $comprovacioEmail = "SELECT COUNT(*) FROM usuarios WHERE email = $1";
            $existeix = pg_query_params($connexio, $comprovacioEmail, array($email));
            if (pg_fetch_result($existeix, 0, 0) > 0) {
                return "El correo electrónico ya está registrado.";
            }
    
            $sql = "INSERT INTO usuarios (nom, email, password, adreca, poblacio, codipostal) 
                    VALUES ($1, $2, $3, $4, $5, $6)";
            $params = array($nom, $email, $hashed_password, $adreca, $poblacio, $codi_postal);
    
            $resultat = pg_query_params($connexio, $sql, $params);
    
            if ($resultat) {
                return TRUE;
            } else {
                return "Hubo un error al registrar el usuario. Por favor, inténtalo de nuevo.";
            }
        }
        return "Método no permitido.";
    }
    
?>
