CREATE TABLE user (
    id INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(180) NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    login LONGTEXT NOT NULL,
    dateNew DATETIME NOT NULL,
    dateLogin DATETIME DEFAULT NULL,
    UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email),
    PRIMARY KEY(id)
);

CREATE TABLE produit (
    id INT AUTO_INCREMENT NOT NULL,
    type VARCHAR(100) NOT NULL,
    designation VARCHAR(255) NOT NULL,
    prix_ht NUMERIC(10, 2) NOT NULL,
    date_in DATE NOT NULL,
    time_sin DATETIME NOT NULL,
    stock INT DEFAULT 0 NOT NULL,
    image_filename VARCHAR(255) DEFAULT NULL,
    reduction_percent INT DEFAULT 0 NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE historique_reduction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produit_id INT NOT NULL,
    ancienne_valeur INT NOT NULL,
    nouvelle_valeur INT NOT NULL,
    date_modification DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (produit_id) REFERENCES produit(id) ON DELETE CASCADE
);