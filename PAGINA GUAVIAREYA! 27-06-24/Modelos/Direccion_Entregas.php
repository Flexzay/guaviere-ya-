<?php
include_once 'Conexion.php';

/**
 * Clase Modelo_Direccion_Entregas
 * 
 * Esta clase maneja operaciones relacionadas con las direcciones de entrega de usuarios.
 */
class Modelo_Direccion_Entregas {
    private static $conn; // Propiedad estática para almacenar la conexión

    /**
     * Método privado para inicializar la conexión si aún no está establecida.
     *
     * @return void
     */
    private static function initConnection() {
        if (!self::$conn) {
            self::$conn = Conexion();
        }
    }

    /**
     * Constructor para inicializar la conexión.
     */
    public function __construct() {
        self::initConnection();
    }

    /**
     * Método para insertar una nueva dirección de entrega en la base de datos.
     *
     * @param string $correo Correo del usuario al que pertenece la dirección.
     * @param string $numeroCasa Número de casa de la dirección.
     * @param string $clCraAv Calle, Carrera o Avenida de la dirección.
     * @param string $barrio Barrio de la dirección.
     * @return bool Retorna true si la inserción fue exitosa, false en caso contrario.
     * @throws Exception Si hay un error preparando la consulta SQL.
     */
    public function insertarDireccion($correo, $numeroCasa, $clCraAv, $barrio) {
        self::initConnection();
        // Preparar la consulta SQL para insertar la dirección
        $sql = "INSERT INTO Direccion_Entregas (Correo, Numero_Casa, CL_Cra_AV, Barrio) VALUES (?, ?, ?, ?)";
        $stmt = self::$conn->prepare($sql);

        if ($stmt === false) {
            // Lanzar una excepción si hay un error preparando la consulta
            throw new Exception("Error preparando la consulta: " . self::$conn->error);
        }

        // Vincular los parámetros a la consulta preparada
        $stmt->bind_param("ssss", $correo, $numeroCasa, $clCraAv, $barrio);

        // Ejecutar la consulta
        $success = $stmt->execute();

        // Cerrar la consulta
        $stmt->close();

        // Retornar si la inserción fue exitosa
        return $success;
    }

    /**
     * Método estático para obtener todas las direcciones de entrega de un usuario por su correo.
     *
     * @param string $correo Correo del usuario del que se quieren obtener las direcciones.
     * @return array Retorna un array de direcciones de entrega obtenidas, o null si no hay resultados.
     * @throws Exception Si hay un error preparando la consulta SQL.
     */
    public static function obtenerDireccionesPorUsuario($correo) {
        self::initConnection();
        // Preparar la consulta SQL para obtener las direcciones por correo de usuario
        $sql = "SELECT ID_Dire_Entre, Numero_Casa, CL_Cra_AV, Barrio FROM Direccion_Entregas WHERE Correo = ?";
        $stmt = self::$conn->prepare($sql);

        if ($stmt === false) {
            // Lanzar una excepción si hay un error preparando la consulta
            throw new Exception("Error preparando la consulta: " . self::$conn->error);
        }

        // Vincular el parámetro $correo a la consulta preparada
        $stmt->bind_param("s", $correo);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado de la consulta
        $result = $stmt->get_result();

        // Obtener las filas como un array asociativo
        $direcciones = $result->fetch_all(MYSQLI_ASSOC);

        // Cerrar la consulta
        $stmt->close();

        // Retornar las direcciones obtenidas
        return $direcciones;
    }

    // Otros métodos relacionados con las direcciones de entrega pueden ser añadidos según sea necesario
}
?>

