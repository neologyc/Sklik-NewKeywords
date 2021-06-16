# Sklik-NewKeywords

## Instalace
* SQL: https://github.com/neologyc/Sklik-NewKeywords/blob/master/install/install.sql - sloupce je potřeba pojmenovat aktuálně 2019-12 -> 2021-12
* Do tabulky seed_keywords se přidají slova, kteŕa se mají hledat (když prodávám drony od DJI, moje seed keywords jsou "dron", "drony", "dji", "mavic" - s k nim se pak stáhnou návrhy klíčových slov)
* Pak nastavíte přihlašovací údaje do DB - https://github.com/neologyc/Sklik-NewKeywords/blob/master/app/index.php (řádek 7 a níže)
* Aktualizoval bych knihovnu dibi/dibi

## Spuštění aplikace
* run přes - https://github.com/neologyc/Sklik-NewKeywords/blob/master/app/index.php
* vydržte až skript doběhne (set_time_limit je nastaven defaultně na 10 hodin - záleží ale na nastavení vašeho hostingu/serveru
* výsledky si v adminer/phpmyadmin zobrazím přes SQL dotazy z https://github.com/neologyc/Sklik-NewKeywords/blob/master/mining-sql-queries.sql ( je potřeba upravit roky v SQL podle aktuálních sloupců v DB)
