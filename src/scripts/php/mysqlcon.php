<?php

// Mysql
$host = 'db';
$user = 'root';
$pass = 'admin';
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}

function createTablesIfNotExists() {
    $SQL = [
        // Creation roles table
        "Roles" => "CREATE TABLE IF NOT EXISTS Roles (
            id_role INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name_role VARCHAR(30) NOT NULL)",
    
        // Creation User table
        "User" => "CREATE TABLE IF NOT EXISTS User (
                    id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    first_name VARCHAR(30) NOT NULL,
                    surname VARCHAR(30) NOT NULL, 
                    id_role INT UNSIGNED NOT NULL,
                    FOREIGN KEY(id_role) REFERENCES Roles(id_role))",
    ];
    
    
    $db  = mysqli_select_db($conn, "acl");
    foreach($SQL as $table=>$command){
        if ($conn->query($command) === TRUE) {
            echo "<br>Table" . $table . "created successfully";
        } else {
            echo "<br>Error creating table" . $table  . ": " . $conn->error;
        }
    }
}


// Utente(ID_utente, nome, email, ruolo (FK) )

// Ruolo(ID_ruolo, nome)

// Dispone(ID, ID_ruolo (FK), ID_permesso (FK) )

// Permesso(ID, Create, Read, Update, Delete, ID_dispone (FK) )

// Fattura(ID, data, importo, titolo, tipologia, descrizione, ID_utente (FK) )

// Cliente(ID, email, cognome, nome, sesso, telefono, indirizzo, età, ID_fattura (FK) )