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

function createTablesIfNotExists($conn)
{
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
                    email VARCHAR(319) NOT NULL,
                    id_role INT UNSIGNED NOT NULL,
                    FOREIGN KEY(id_role) REFERENCES Roles(id_role))",

        "Invoice" => "CREATE TABLE IF NOT EXISTS Invoice (
            id_invoice INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date
            amount INT UNSIGNED NOT NULL,
            title VARCHAR(80) NOT NULL,
            typology 
            description
            id_user INT UNSIGNED NOT NULL,
            FOREIGN KEY(id_user) REFERENCES User(id_user)
            
            --ID, data, importo, titolo, tipologia, descrizione, ID_utente (FK)
            --date amount title typology description
        )",


        "Client" => "CREATE TABLE IF NOT EXISTS Client (
            id_client INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(319) NOT NULL,
            first_name VARCHAR(30) NOT NULL,
            surname VARCHAR(30) NOT NULL, 
            gender 
            telephone
            address
            age INT UNSIGNED NOT NULL,
            id_invoice INT UNSIGNED NOT NULL,
            FOREIGN KEY(id_invoice) REFERENCES User(id_invoice)
            
        )",


        "Permission" => "CREATE TABLE IF NOT EXISTS Permission (
            id_permission INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            create
            read
            update
            delete
            id_ INT UNSIGNED NOT NULL,
            FOREIGN KEY(id_) REFERENCES (id_)
            --Permesso(ID, Create, Read, Update, Delete, ID_dispone (FK) )

            )",
            

    ];

    


    $db  = mysqli_select_db($conn, "acl");
    foreach ($SQL as $table => $command) {
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