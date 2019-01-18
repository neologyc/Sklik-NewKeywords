# vytahnuti dat za aktualni mesic

SELECT *
FROM `data`
WHERE  `2018-01` + `2018-02` + `2018-03` + `2018-04` + `2018-05` + `2018-06` + `2018-07` + `2018-08` < 10
ORDER BY `diff-2018-11` DESC
LIMIT 500;


# příprava na export
INSERT INTO data_for_export
SELECT *
FROM `data`
WHERE  `2018-01` + `2018-02` + `2018-03` + `2018-04` + `2018-05` + `2018-06` + `2018-07` + `2018-08` < 10
ORDER BY `diff-2018-11` DESC;
