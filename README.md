## Deployment steps

- Create mysql db
- Rename .env.example to .env
- Change db credentials in .env
- Run migration `php artisan migrate --path=/database/migrations/2022_06_12_000000_create_images_table.php`
- Run `php artisan serve` to run project

## Upload Image
- Select an image and click on "Upload Image" button

## Download From URL
- Enter image URL and click on "Save Image" button

## View Details
- Click on the Details button to view the details of an image