USE acl;

CREATE TABLE
    IF NOT EXISTS roles (
        id_role INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS user (
        id_user VARCHAR(320) PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        photo TEXT NOT NULL,
        id_role INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_role) REFERENCES roles(id_role)
    );

CREATE TABLE
    IF NOT EXISTS permission (
        id_permission INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        pcreate BOOLEAN NOT NULL,
        pread BOOLEAN NOT NULL,
        pdelete BOOLEAN NOT NULL,
        pupdate BOOLEAN NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS dispose(
        id_dispose INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_role INT UNSIGNED NOT NULL,
        id_permission INT UNSIGNED NOT NULL,
        FOREIGN KEY(id_role) REFERENCES roles(id_role),
        FOREIGN KEY(id_permission) REFERENCES permission(id_permission)
    );

CREATE TABLE
    IF NOT EXISTS customer (
        id_customer INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(319) NOT NULL,
        first_name VARCHAR(30) NOT NULL,
        surname VARCHAR(30) NOT NULL,
        gender CHAR(1) NOT NULL,
        telephone VARCHAR(15) NOT NULL,
        address VARCHAR(100) NOT NULL,
        age INT UNSIGNED NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS invoice (
        id_invoice INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        date DATE NOT NULL,
        amount INT UNSIGNED NOT NULL,
        title VARCHAR(80) NOT NULL,
        typology VARCHAR(20) NOT NULL,
        description TEXT NOT NULL,
        id_user VARCHAR(320) NOT NULL,
        FOREIGN KEY(id_user) REFERENCES user(id_user),
        id_customer INT UNSIGNED NOT NULL,
        FOREIGN KEY(id_customer) REFERENCES customer(id_customer)
    );

INSERT INTO roles (name) VALUES ('Undefined');

INSERT INTO roles (name) VALUES ('admin');

INSERT INTO roles (name) VALUES ('commercial');

INSERT INTO roles (name) VALUES ('Area manager');

INSERT INTO roles (name) VALUES ('Administration');

INSERT INTO
    permission (
        id_permission,
        pcreate,
        pread,
        pdelete,
        pupdate
    )
VALUES (1, 1, 1, 1, 1);

INSERT INTO
    permission (
        id_permission,
        pcreate,
        pread,
        pdelete,
        pupdate
    )
VALUES (2, 1, 1, 0, 1);

INSERT INTO
    permission (
        id_permission,
        pcreate,
        pread,
        pdelete,
        pupdate
    )
VALUES (3, 0, 1, 1, 1);

INSERT INTO
    permission (
        id_permission,
        pcreate,
        pread,
        pdelete,
        pupdate
    )
VALUES (4, 0, 1, 1, 0);

INSERT INTO dispose (id_role, id_permission) VALUES (1, 1);

INSERT INTO dispose (id_role, id_permission) VALUES (2, 2);

INSERT INTO dispose (id_role, id_permission) VALUES (3, 3);

INSERT INTO dispose (id_role, id_permission) VALUES (4, 4);

INSERT INTO
    customer (
        email,
        first_name,
        surname,
        gender,
        telephone,
        address,
        age
    )
VALUES (
        "mario.rossi@gmail.com",
        "Mario",
        "Rossi",
        'M',
        "+39 011 5555551",
        "Via Roma 1",
        40
    ), (
        "paola.verdi@outlook.com",
        "Paola",
        "Verdi",
        'F',
        "+39 06 5555552",
        "Via Dante Alighieri 2",
        31
    ), (
        "andrea.giorgi@yahoo.it",
        "Andrea",
        "Giorgi",
        'M',
        "+39 02 5555553",
        "Via Garibaldi 3",
        55
    ), (
        "stefania.bianchi@hotmail.com",
        "Stefania",
        "Bianchi",
        'F',
        "+39 081 5555554",
        "Piazza San Pietro 4",
        23
    ), (
        "marco.neri@gmail.com",
        "Marco",
        "Neri",
        'M',
        "+39 02 5555555",
        "Via Appia Nuova 5",
        47
    ), (
        "anna.rossi@outlook.com",
        "Anna",
        "Rossi",
        'F',
        "+39 081 5555556",
        "Via Giulia 6",
        26
    ), (
        "giuseppe.rizzo@yahoo.it",
        "Giuseppe",
        "Rizzo",
        'M',
        "+39 011 5555557",
        "Corso Vittorio Emanuele 7",
        37
    ), (
        "francesca.martini@gmail.com",
        "Francesca",
        "Martini",
        'F',
        "+39 02 5555558",
        "Via dei Mille 8",
        29
    ), (
        "luca.ricci@outlook.com",
        "Luca",
        "Ricci",
        'M',
        "+39 06 5555559",
        "Piazza Navona 9",
        44
    ), (
        "valentina.parisi@yahoo.it",
        "Valentina",
        "Parisi",
        'F',
        "+39 081 5555560",
        "Via Toledo 10",
        51
    ), (
        "giorgio.gentile@hotmail.com",
        "Giorgio",
        "Gentile",
        'M',
        "+39 011 5555561",
        "Via Po 11",
        35
    ), (
        "elena.ferrari@gmail.com",
        "Elena",
        "Ferrari",
        'F',
        "+39 02 5555562",
        "Via Montenapoleone 12",
        46
    ), (
        "simone.conti@outlook.com",
        "Simone",
        "Conti",
        'M',
        "+39 06 5555563",
        "Via Cola di Rienzo 13",
        32
    ), (
        "silvia.moretti@yahoo.it",
        "Silvia",
        "Moretti",
        'F',
        "+39 081 5555564",
        "Via dei Tribunali 14",
        28
    ), (
        "roberto.romano@hotmail.com",
        "Roberto",
        "Romano",
        'M',
        "+39 011 5555565",
        "Corso Matteotti 15",
        48
    ), (
        "laura.fabbri@gmail.com",
        "Laura",
        "Fabbri",
        'F',
        "+39 02 5555566",
        "Via Palestro 16",
        39
    ), (
        "daniele.ruggiero@outlook.com",
        "Daniele",
        "Ruggiero",
        'M',
        "+39 06 5555567",
        "Via del Corso 17",
        25
    ), (
        "jens.petersen@gmail.com",
        "Jens",
        "Petersen",
        'M',
        "+45 20123456",
        "Borgergade 18",
        29
    ), (
        "anna.kowalska@wp.pl",
        "Anna",
        "Kowalska",
        'F',
        "+48 506789123",
        "ul. Książęca 20",
        42
    ), (
        "martin.schmidt@gmail.com",
        "Martin",
        "Schmidt",
        'M',
        "+49 1511234567",
        "Rheinuferpromenade 22",
        36
    ), (
        "maria.rodriguez@hotmail.com",
        "Maria",
        "Rodriguez",
        'F',
        "+34 633112233",
        "Calle Gran Via 24",
        27
    ), (
        "thierry.dupont@gmail.com",
        "Thierry",
        "Dupont",
        'M',
        "+33 612345678",
        "Rue de la Paix 26",
        53
    ), (
        "anja.mueller@hotmail.com",
        "Anja",
        "Müller",
        'F',
        "+49 1729876543",
        "Am Schlossgarten 28",
        38
    ), (
        "david.kovačić@gmail.com",
        "David",
        "Kovačić",
        'M',
        "+385 981234567",
        "Trg bana Jelačića 30",
        45
    ), (
        "sarah.andersen@gmail.com",
        "Sarah",
        "Andersen",
        'F',
        "+45 50123456",
        "Frederiksberggade 32",
        24
    ), (
        "luigi.rossi@hotmail.com",
        "Luigi",
        "Rossi",
        'M',
        "+41 789123456",
        "Via Pessina 34",
        33
    ), (
        "sofia.popova@gmail.com",
        "Sofia",
        "Popova",
        'F',
        "+359 888123456",
        "ul. Vitosha 36",
        41
    );