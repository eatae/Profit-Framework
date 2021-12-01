
-- Authors
CREATE TABLE IF NOT EXISTS authors (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,

    PRIMARY KEY (id)
) ENGINE=INNODB;


-- Articles
CREATE TABLE IF NOT EXISTS articles (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    author_id MEDIUMINT NOT NULL,
    title VARCHAR(50) NOT NULL,
    `lead` VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (author_id)
        REFERENCES authors(id)
) ENGINE=INNODB;


INSERT INTO authors (firstname, lastname)
VALUES ('Alexander', 'Pushkin'),
       ('Alexander', 'Solzhenitsyn'),
       ('Ivan', 'Turgenev'),
       ('Vladimir', 'Nabokov'),
       ('Mihail', 'Bulgakov'),
       ('Anton', 'Chekhov'),
       ('Ivan', 'Bunin'),
       ('Nikolay', 'Gogol'),
       ('Fyodor', 'Dostoyevsky'),
       ('Maxim', 'Gorkiy'),
       ('Leo', 'Tolstoy');


INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_1', 'Lead_1' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_2', 'Lead_2' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_3', 'Lead_3' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_4', 'Lead_4' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_5', 'Lead_5' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_6', 'Lead_6' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_7', 'Lead_7' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_8', 'Lead_8' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_9', 'Lead_9' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_10', 'Lead_10' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_11', 'Lead_11' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_12', 'Lead_12' FROM authors ORDER BY rand() LIMIT 1;



INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_13', 'Lead_13' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_14', 'Lead_14' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_15', 'Lead_15' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_16', 'Lead_16' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_17', 'Lead_17' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_18', 'Lead_18' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_19', 'Lead_19' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_20', 'Lead_20' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_21', 'Lead_21' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_22', 'Lead_22' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_23', 'Lead_23' FROM authors ORDER BY rand() LIMIT 1;

INSERT INTO articles (author_id, title, `lead`)
SELECT id, 'Title_24', 'Lead_24' FROM authors ORDER BY rand() LIMIT 1;

