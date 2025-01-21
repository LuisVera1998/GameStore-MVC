<?php

    function getProductes($connexio, $id_categoria) {


        $sqlNom = "SELECT nom FROM categorias WHERE id = $id_categoria";
        
        $categoriaQuery = pg_query($connexio, $sqlNom);
        
        if (!$categoriaQuery) {
            die("Error al obtener el nombre de la categoría.");
        }
        
        $categoria = pg_fetch_assoc($categoriaQuery);
        

        if (!$categoria) {
            die("Categoría no encontrada.");
        }
        
        $nomCategoria = $categoria['nom'];  

        switch ($nomCategoria) {

            case 'Videojuegos':
                $sql = "SELECT id, nom, descripcion, precio, imagen, activo, id_categoria FROM Videojuegos";
                break;

            case 'Consolas':
                $sql = "SELECT id, nom, descripcion, precio, imagen, activo, id_categoria FROM consolas";
                break;

            case 'Cine':
                $sql = "SELECT id, nom, descripcion, precio, imagen, activo, id_categoria FROM cine";
                break;

            case 'Periféricos':
                $sql = "SELECT id, nom, descripcion, precio, imagen, activo, id_categoria FROM perifericos";
                break;

            case 'Merchandising':
                $sql = "SELECT id, nom, descripcion, precio, imagen, activo, id_categoria FROM merchandising";
                break;
        }
        
        $consulta = pg_query($connexio, $sql);
        

        if (!$consulta) {
            die("Error al obtener los productos.");
        }
    
        $productes = pg_fetch_all($consulta);
    
        return $productes;
    }



    function getDetalls($connexio, $id_producte, $id_categoria) {
        if (!$id_producte || !$id_categoria) {
            die("ID del producto o categoría no válido.");
        }
    

        $categorias = [
            1 => 'Videojuegos',
            2 => 'consolas',
            3 => 'cine',
            4 => 'perifericos',
            5 => 'merchandising'
        ];
    
        if (!array_key_exists($id_categoria, $categorias)) {
            die("Categoría desconocida.");
        }
    

        $tabla = $categorias[$id_categoria];
        $id_producte = (int) $id_producte;
    

        $tabla = strtolower($tabla);
    

        $sql = "SELECT id, nom, descripcion, precio, imagen, activo 
                FROM $tabla 
                WHERE id = $id_producte";
    
    

        $consulta = pg_query($connexio, $sql);
    
        if (!$consulta) {
            $error = pg_last_error($connexio);
            die("Error al obtener el producto: " . $error);
        }

        $producte = pg_fetch_assoc($consulta);
    
        return $producte;
    }


    function getProductesPerNom($connexio, $nomProducte) {

        $categories = ['Videojuegos', 'Consolas', 'Cine', 'Perifericos', 'Merchandising'];

        $productes = []; 


        foreach ($categories as $categoria) {
            $sql = "SELECT id, nom, descripcion, precio, imagen, activo, id_categoria 
                    FROM $categoria 
                    WHERE nom ILIKE '%' || $1 || '%'"; 


            $resultat = pg_query_params($connexio, $sql, [$nomProducte]);

            if (!$resultat) {
                die("Error al obtener los productos de la categoria $categoria.");
            }

            $productes = array_merge($productes, pg_fetch_all($resultat) ?: []);
        }

        return $productes;
    }

    
?>