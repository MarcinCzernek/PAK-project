# PAK-project
Example of censoring words in social network. Project for topic: "Ilusion of free internet:".

Aby uruchomić projekt trzeba mieć zainstalowany localhost server XAMPP.
Gdy mamy zainstalowany program XAMPP przechodzimy do pliku htdocs w lokalizacji programu XAMPP a w nim
trzeba utworzyć nowy folder wewnątrz folderu htdocs (można użyć dowolnej nazwy dla tego folderu)
Wypakowywujemy do nowo utworzonego folderu projekt. Uruchamiamy aplikacje XAMPP a w niej włączamy
Apache server i moduł MySQL. Nastepnie w aplikacji XAMPP w module mySQL wybieramy przycisk
'admin' - co daje dostęp do phpMyAdmin w którym tworzymy dwie nowy bazy danych: "pak_comment_db"
i "pak_login" po ich utworzeniu do każdej z tych baz importujemy zawarty w projekcie plik mysql:
pak_comment_db.sql do bazy pak_comment_db i pak_login.sql do bazy danych pak_login.
Dzięki tej operacji wygenerujemy konieczne do działania aplikacji tabele i kolumny.
Ostatecznie aby wyświetlić projekt w przeglądarce wpisujemy adres http://localhost/PAK-project/login.php
