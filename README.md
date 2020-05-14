# Click-Counter
Counts the number of clicks on a link using PHP and SQL.

There are two php files in the project - src.php and goto.php.

On the first page(src.php), there are five links which can be clicked.
There is an HTML table which fetches the values from an SQL Database and prints it.

The first page redirects to goto.php which then redirects to the corresponding link which was clicked on the first page.
In goto.php, the views (or clicks) on the corresponding link are incremented in the SQL Database.
