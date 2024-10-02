<?php

namespace Models;

class ActivarModelo
{
    //base de datos
    protected static $db;
    protected static $tabla;
    protected static $columnasDB = [];

    public static function setDB($bd)
    {
        self::$db = $bd;
    }

    public static function listar()
    {
        $query = "Select * from " . static::$tabla;
        $resultado = self::$db->query($query);
        $usuario = [];
        if ($resultado) {
            $usuario = $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return $usuario;
    }

    public static function listarCon($campo, $valor)
    {
        if (is_int($valor)) {
            $query = "Select * from " . static::$tabla . " where $campo = $valor;";
        } else {
            $query = "Select * from " . static::$tabla . " where $campo =" . "'" . $valor . "'";
        }

        $resultado = self::$db->query($query);
        $datos = [];
        if ($resultado) {
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return $datos;
    }
    public static function listarIds($id, $campo, $valor)
    {
        if (is_int($valor)) {
            $query = "Select $id from " . static::$tabla . " where $campo = $valor;";
        } else {
            $query = "Select $id from " . static::$tabla . " where $campo =" . "'" . $valor . "'";
        }

        $resultado = self::$db->query($query);
        $datos = [];
        if ($resultado) {
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return $datos;
    }

    public function crear()
    {
        $atributos = $this->pasar();
        $query = "insert into " . static::$tabla . " (";
        $query .= join(",", array_keys($atributos));
        $query .= ") values ('";
        $query .= join("','", array_values($atributos));
        $query .= "');";
        self::$db->query($query);
        $ultimoId = self::$db->insert_id;
        if ($ultimoId) return $ultimoId;
        else return false;
    }

    public function pasar()
    {
        $atributos = $this;
        $resultado = [];
        foreach ($atributos as $key => $value) {
            $resultado[$key] = self::$db->escape_string($value);
        }
        return $resultado;
    }

    public static function verificarUsuario($pass, $user)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE password = MD5('$pass') AND username = '$user'";

        $resultado = self::$db->query($query);

        if ($resultado && $resultado->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function actualizar($id)
    {
        $atributos = $this->pasar();
        $valores = [];

        foreach ($atributos as $key => $value) {
            if ($key === 'id') continue;
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(", ", $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($id) . "' ;";

        // Depuración: muestra la consulta
        echo $query;

        $resultado = self::$db->query($query);

        // Manejo de errores
        if (!$resultado) {
            echo "Error en la consulta: " . self::$db->error;
        }

        return $resultado ? true : false;
    }
}
