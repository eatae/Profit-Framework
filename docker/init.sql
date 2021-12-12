
-- Authors
CREATE TABLE IF NOT EXISTS profit.authors (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,

    PRIMARY KEY (id)
) ENGINE=INNODB;


-- Articles
CREATE TABLE IF NOT EXISTS profit.articles (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    author_id MEDIUMINT NOT NULL,
    title VARCHAR(50) NOT NULL,
    `lead` VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (author_id)
        REFERENCES authors(id)
) ENGINE=INNODB;


INSERT INTO profit.authors (firstname, lastname)
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


INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_1', 'Lead_1' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_2', 'Lead_2' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_3', 'Lead_3' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_4', 'Lead_4' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_5', 'Lead_5' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_6', 'Lead_6' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_7', 'Lead_7' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_8', 'Lead_8' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_9', 'Lead_9' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_10', 'Lead_10' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_11', 'Lead_11' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_12', 'Lead_12' FROM profit.authors ORDER BY rand() LIMIT 1;



INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_13', 'Lead_13' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_14', 'Lead_14' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_15', 'Lead_15' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_16', 'Lead_16' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_17', 'Lead_17' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_18', 'Lead_18' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_19', 'Lead_19' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_20', 'Lead_20' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_21', 'Lead_21' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_22', 'Lead_22' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_23', 'Lead_23' FROM profit.authors ORDER BY rand() LIMIT 1;

INSERT INTO profit.articles (author_id, title, `lead`)
SELECT id, 'Title_24', 'Lead_24' FROM profit.authors ORDER BY rand() LIMIT 1;




# Create database for tests
# -------------------------

CREATE DATABASE IF NOT EXISTS tests;

CREATE TABLE tests.authors
SELECT * FROM profit.authors;

CREATE TABLE tests.articles
SELECT * FROM profit.articles;























