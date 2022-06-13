## Deployment steps

- Create mysql db
- Rename .env.example to .env
- Change db credentials in .env
- Run `composer install`
- Run migration `php artisan migrate --path=/database/migrations/2022_06_12_000000_create_images_table.php`
- Run `php artisan serve` to run project

## For shared hosting

- Root .htaccess

`<IfModule mod_rewrite.c>
Options +FollowSymLinks
RewriteEngine On
RewriteCond %{REQUEST_URI} !^/public/ 
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ /public/$1 
RewriteRule ^ /index.php [L]
# RewriteRule ^(/)?$ public/index.php [L] 
</IfModule>
`

- Public .htaccess

`<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>
    RewriteEngine On    
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
`

`
php artisan optimize:clear
php artisan route:clear
php artisan cache:clear
php artisan config:cache  
php artisan view:clear
`

## Upload Image
- Select an image and click on "Upload Image" button

## Download From URL
- Enter image URL and click on "Save Image" button

## View Details
- Click on the Details button to view the details of an image