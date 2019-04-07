SET NAMES utf8;

/**********************************************************************************************************************/
/* DDL */

CREATE SCHEMA FACTOR DEFAULT CHARACTER SET utf8;


CREATE TABLE FACTOR.CATEGORY
(
    CATEGORY_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    CATEGORY_NAME VARCHAR(50) NOT NULL,

    PRIMARY KEY(CATEGORY_ID)

) ENGINE InnoDb CHARACTER SET UTF8;

INSERT INTO FACTOR.CATEGORY (CATEGORY_NAME) VALUES
    ('Sports'),
    ('Actualités'),
    ('Animaux'),
    ('Economie'),
    ('Cuisine')
;


CREATE TABLE FACTOR.ITEM
(
    ITEM_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    CATEGORY_ID INT UNSIGNED NOT NULL,

    ITEM_NAME VARCHAR(50) NOT NULL,
    ITEM_PRICE DECIMAL(8, 2) UNSIGNED NOT NULL,

    PRIMARY KEY(ITEM_ID),
    FOREIGN KEY (CATEGORY_ID) REFERENCES FACTOR.CATEGORY(CATEGORY_ID)

) ENGINE InnoDb CHARACTER SET UTF8;

INSERT INTO FACTOR.ITEM (CATEGORY_ID, ITEM_NAME, ITEM_PRICE) VALUES
    (1, 'L\'équipe'          , 6.50),
    (2, 'Le Monde'           , 3.50),
    (2, 'Le Parisien'        , 2.50),
    (2, 'France soir'        , 3.00),
    (3, '30 Million d\'amis' , 6.20),
    (3, 'Cheval pratique'    , 4.50),
    (4, 'Capital'            , 2.50)
;


/**********************************************************************************************************************/
# CHALLENGES


/**********************************************************************************************************************/
# 1) Write a SELECT that returns all categories sorted by (A) the number of items they have, and (B) the category name.
#    This query should fetch the following columns: the category name, the number of items (AS N_ITEMS)
#    and the average price of the titles in that category (AS AVERAGE_PRICE)

# TODO
SELECT CT.CATEGORY_NAME,COUNT(CATEGORY_NAME) AS "N_ITEMS" , AVG(IT.ITEM_PRICE) as "AVG PRICE"
FROM CATEGORY CT
JOIN  ITEM IT on IT.CATEGORY_ID = CT.CATEGORY_ID
GROUP BY IT.CATEGORY_ID
ORDER BY  COUNT(CATEGORY_NAME), CT.CATEGORY_NAME;


/**********************************************************************************************************************/
# 2) Write a SELECT query returning the CATEGORY rows that dont have any associated items, or just 1 associated item.
#    Only the category name column needs to be fetched by this query.


# TODO
SELECT CT.CATEGORY_NAME
FROM CATEGORY CT
LEFT JOIN  ITEM IT on IT.CATEGORY_ID = CT.CATEGORY_ID
GROUP BY CT.CATEGORY_ID
HAVING COUNT(IT.CATEGORY_ID) = 1;

# And 0 Items: 
SELECT CT.CATEGORY_NAME
FROM CATEGORY CT
LEFT JOIN  ITEM IT on IT.CATEGORY_ID = CT.CATEGORY_ID
GROUP BY CT.CATEGORY_ID
HAVING COUNT(IT.CATEGORY_ID) = 1 or COUNT(IT.CATEGORY_ID) =  0;