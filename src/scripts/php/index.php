<?php
$host = 'db';

$user = 'admin';
$pass = 'admin';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}

// Utente(ID_utente, nome, email, ruolo (FK) )

// Ruolo(ID_ruolo, nome, ID_dispone (FK))

// Dispone(ID, ID_ruolo (FK), ID_permesso (FK) )

// Permesso(ID, Create, Read, Update, Delete, ID_dispone (FK) )

// Fattura(ID, data, importo, titolo, tipologia, descrizione, ID_utente (FK) )

// Cliente(ID, email, cognome, nome, sesso, telefono, indirizzo, età, ID_fattura (FK) )