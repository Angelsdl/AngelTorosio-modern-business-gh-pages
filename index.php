<?php
session_start();
$username = trim($_REQUEST['username']);
$password = trim($_REQUEST['password']);

// Conexión a la base de datos
$conn = new mysqli("localhost", "admin", "admin123", "usuarios");

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit();
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM administradores WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $passwordReHash = hash('sha256', $password);
        if ($passwordReHash == $user["password"]) {
            // Inicio de sesión exitoso
            $stmt = $conn->prepare("UPDATE administradores SET fecha_ultimo_acceso = NOW() WHERE id = ?");
            $stmt->bind_param("i", $user["id"]);
            $stmt->execute();
            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Contraseña incorrecta']);
        }
    } else {
        echo json_encode(['status' => 'error2', 'message' => 'Usuario no encontrado']);
    }

    $stmt->close();
    $conn->close();
?>
