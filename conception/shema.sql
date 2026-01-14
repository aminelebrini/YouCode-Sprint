CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Formateur', 'Etudiant') NOT NULL
);

CREATE TABLE classes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    nombre INT NOT NULL,
    promo VARCHAR(100) NOT NULL,
    taux INT NOT NULL
);

CREATE TABLE sprints (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    date_debut DATE,
    date_fin DATE,
    classe_id INT,
    FOREIGN KEY (classe_id) REFERENCES classes(id) ON DELETE CASCADE
);

CREATE TABLE etudiants (
    user_id INT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    level VARCHAR(50),
    classe_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (classe_id) REFERENCES classes(id)
);

CREATE TABLE formateurs (
    user_id INT PRIMARY KEY,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE formateur_classe (
    formateur_id INT,
    classe_id INT,
    PRIMARY KEY (formateur_id, classe_id),
    FOREIGN KEY (formateur_id) REFERENCES formateurs(user_id),
    FOREIGN KEY (classe_id) REFERENCES classes(id)
);

CREATE TABLE briefs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    type VARCHAR(50), 
    sprint_id INT,
    FOREIGN KEY (sprint_id) REFERENCES sprints(id) ON DELETE CASCADE
);

CREATE TABLE rendu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    text text,
    link VARCHAR(255),
    date_soumission DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE rendu_etudiant (
    etudiant_id INT,
    rendu_id INT,
    brief_id INT,
    PRIMARY KEY (etudiant_id, rendu_id),
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(user_id),
    FOREIGN KEY (rendu_id) REFERENCES rendu(id),
    FOREIGN KEY (brief_id) REFERENCES briefs(id)
);

CREATE TABLE competences (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE competence_brief (
    brief_id INT,
    competence_id INT,
    PRIMARY KEY (brief_id, competence_id),
    FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE
);

CREATE TABLE evaluations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    commentaire TEXT,
    niveau_maitrise ENUM('IMITER', 'S_ADAPTER', 'TRANSPOSER') NOT NULL,
    etudiant_id INT,
    formateur_id INT,
    brief_id INT,
    competence_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(user_id),
    FOREIGN KEY (formateur_id) REFERENCES formateurs(user_id),
    FOREIGN KEY (brief_id) REFERENCES briefs(id),
    FOREIGN KEY (competence_id) REFERENCES competences(id)
);