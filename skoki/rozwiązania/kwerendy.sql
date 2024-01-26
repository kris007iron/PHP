a)
SELECT z.Imie,z.Nazwisko,SUM(Punkty) Suma 
FROM wyniki w INNER JOIN zawodnicy z ON w.ID_zawodnika=z.ID_zawodnika 
GROUP BY z.Imie,z.Nazwisko 
ORDER BY Suma DESC 
LIMIT 3;

b)
SELECT COUNT(*) ile 
FROM zawodnicy z INNER JOIN kraje k ON z.ID_kraju=k.ID_kraju 
WHERE k.Kraj='Polska';

c)
SELECT skok1,skok2 
FROM zawodnicy z INNER JOIN wyniki w ON z.ID_zawodnika=w.ID_zawodnika 
INNER JOIN konkursy k ON w.ID_konkursu=k.ID_konkursu 
WHERE imie='Kamil' AND Nazwisko='Stoch' AND k.Miejsce='Wis³a';

d)
SELECT DISTINCT imie,nazwisko 
FROM zawodnicy z INNER JOIN wyniki w ON z.ID_zawodnika=w.ID_zawodnika 
WHERE skok1>240 OR skok2>240;
