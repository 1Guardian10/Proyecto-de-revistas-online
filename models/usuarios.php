<?php
namespace Models;
class usuarios extends ActivarModelo{
    protected static $tabla='usuarios';
    protected static $columnaDB=['username','email','role_id','password','creacion'];
    public $username;
    public $role_id;
    public $email;
    public $password;

    public function __construct($args=[])
    {
        $this->username=$args['username']??null;
        $this->role_id=$args['role_id']??null;
        $this->email=$args['email']??null;
        $this->password=$args['password']??null;
    }

    public static function verificarUsuario($pass, $user) {
        $passMD5 = md5($pass);
        $query = "SELECT role_id FROM " . static::$tabla . " WHERE password = '$passMD5' AND username = '$user'";
        try {
            $resultado = self::$db->query($query);
            if ($resultado && $resultado->num_rows > 0) {
                return $resultado->fetch_assoc(); 
            }
        } catch (\mysqli_sql_exception $e) {
            error_log("Error en la consulta: " . $e->getMessage());
        }
        return false;
    }
}
?>