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
        "prova@prova.it",
        "prova",
        "prova",
        'M',
        "1234567890",
        "via prova 1",
        20
    );