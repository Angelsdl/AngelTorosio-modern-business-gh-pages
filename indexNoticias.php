<?php
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "noticias";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener las últimas tres noticias
$sql = "SELECT titulo, descripcion, fecha_creacion, imagen FROM noticias ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

$noticias = array();
$noticiashtml = '<div class="row gx-5">';
if ($result->num_rows > 0) 
{ 
    while($row = $result->fetch_assoc()) 
    { 
        $noticiashtml .= '<div class="col-lg-4 mb-5">'; 
        $noticiashtml .= '<div class="card h-100 shadow border-0">'; 
        $noticiashtml .= '<img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="...">'; 
        $noticiashtml .= '<div class="card-body p-4">'; 
        $noticiashtml .= '<div class="badge bg-primary bg-gradient rounded-pill mb-2"> Noticias </div>'; 
        $noticiashtml .= '<a class="text-decoration-none link-dark stretched-link" href="#!">'; 
        $noticiashtml .= '<h5 class="card-title mb-3">' . $row['titulo'] . '</h5>'; 
        $noticiashtml .= '</a>'; 
        $noticiashtml .= '<p class="card-text mb-0">' . $row['descripcion'] . '</p>'; 
        $noticiashtml .= '</div>'; 
        // Cerrar card-body 
        $noticiashtml .= '<div class="card-footer p-4 pt-0 bg-transparent border-top-0">'; 
        $noticiashtml .= '<div class="d-flex align-items-end justify-content-between">'; 
        $noticiashtml .= '<div class="d-flex align-items-center">'; 
        $noticiashtml .= '<div class="small">'; 
        $noticiashtml .= '<div class="text-muted">' . $row['fecha_creacion'] . '</div>'; 
        $noticiashtml .= '</div>'; 
        // Cerrar small 
        $noticiashtml .= '</div>'; 
        // Cerrar d-flex align-items-center 
        $noticiashtml .= '</div>'; 
        // Cerrar d-flex align-items-end justify-content-between 
        $noticiashtml .= '</div>'; 
        // Cerrar card-footer 
        $noticiashtml .= '</div>'; 
        // Cerrar card 
        $noticiashtml .= '</div>'; 
        // Cerrar col-lg-4 
        } } 
$noticiashtml .= '</div>'; // Cerrar row gx-5 
echo $noticiashtml;
$conn->close();
?>

