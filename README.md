# Welover


Router setup on apache
```
RewriteEngine on
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-l
RewriteRule ^(.*)$ index.php/$1
```
Router setup on Nginx
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
