-- Récupère tous les films

SELECT * FROM movie;

-- Récupère tous les films dans la catégorie "Films de gangsters"
SELECT * FROM movie WHERE category_id = 1;

-- Récupérer tous les films dans la catégorie "Films de gangster" qui sont sortis avant 1990.
SELECT * FROM movie WHERE category_id = 1 AND `date`< "1990-1-1";

-- Récupère tous les films avec un tri

-- Récupère tous les films du plus récent au plus vieux
SELECT * FROM movie ORDER BY `date`DESC, `name`ASC;

-- Récupère les films dans l'ordre aléatoire
SELECT * FROM movie ORDER BY RAND();

-- Récupérer les 10 premiers films
SELECT * FROM movie LIMIT 3, 10; -- Commence à l'id 2 et récupère 10 films

-- Récupère le film le plus récent
SELECT `name`, `date`FROM movie ORDER BY `date`DESC LIMIT 1;

-- Récupère le film le plus ancien
SELECT `name`, `date`FROM movie ORDER BY `date`ASC LIMIT 1;

-- Récupère le film le plus récent et le plus ancien
SELECT * FROM movie
WHERE `date` = (SELECT MAX(`date`) as `date` FROM movie)
OR `date` = (SELECT MIN(`date`) as `date` FROM movie);

-- Compter le nombre de films
SELECT COUNT(id) FROM movie;

-- Avoir la moyenne des années de sortie des films
SELECT ROUND(AVG(YEAR (`date`))) FROM movie;