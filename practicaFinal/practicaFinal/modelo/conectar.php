<?php
class Conectar {
    /**
     * Conexion con la base de datos usermgmt
     */
    public static function conexion() {
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=usermgmt', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");
        } catch (Exception $e) {
            echo "Linea de error: " . $e->getLine();
            die("Erro" . $e->getMessage());
        }
        return $conexion;
    }

    public static function aniadirUsuario($user, $password, $email, $painter) {
        $conexion = Conectar::conexion();
    
        $sql = "INSERT INTO users(name, password, email, painter_fk) VALUES (:user, :password, :email, :painter)";
        $resultado = $conexion->prepare($sql);

        $resultado->bindValue(":user", $user);
        $resultado->bindValue(":password", $password);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":painter", $painter);
    
        $resultado->execute();
    
        return $resultado;
    }
    
    public static function comprobarUsuario($nombre, $password) {
        $conexion = Conectar::conexion();
    
        $sql = "SELECT * FROM users WHERE name = :nombre AND password = :password";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(":nombre", $nombre);
        $resultado->bindValue(":password", $password);
        $resultado->execute();
    
        if ($resultado->rowCount() > 0) {    
            session_start();
            $_SESSION['nombre'] = $nombre;

            //Obtenemos el valor del pintor de la base de datos
            $sql = "SELECT painter_fk FROM users WHERE name = :nombre";
            $stmtPintor = $conexion->prepare($sql);
            $stmtPintor->bindValue(":nombre", $nombre);
            $stmtPintor->execute();
            $resultPintor = $stmtPintor->fetch(PDO::FETCH_ASSOC);

            $_SESSION['pintor'] = $resultPintor['painter_fk'];

            return true;
        }else {
            return false;
        }
    
        
    }

    public static function pintorFavorito($pintorFavoritoID) {
        $conexion = Conectar::conexion();
        
        $sql = "SELECT * FROM paintings WHERE painter_fk = :pintorFavoritoID";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":pintorFavoritoID", $pintorFavoritoID, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultado; 
    }

    public static function informacionCuadro($cuadroID) {
        $conexion = Conectar::conexion();

        $sql = "SELECT * FROM paintings WHERE id = :cuadroID";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":cuadroID", $cuadroID, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public static function modificarUsuario($nombre, $password, $email, $painter) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE users SET password = :password, email = :email, painter_fk = :painter WHERE name = :nombre";
        $resultado = $conexion->prepare($sql);

        $resultado->bindValue(":nombre", $nombre);
        $resultado->bindValue(":password", $password);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":painter", $painter);

        $resultado->execute();
        
        return $resultado;
    }

    public static function eliminarUsuario($nombre) {
        $conexion = Conectar::conexion();
    
        $sql = "DELETE FROM users WHERE name = :nombre";
        $resultado = $conexion->prepare($sql);
    
        $resultado->bindValue(":nombre", $nombre);
    
        $resultado->execute();
    
        return $resultado;
    }
    
}
?>