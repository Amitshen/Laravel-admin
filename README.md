# Blog App -- Amitech pvt ltd

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- You can login to adminpanel with default credentials __admin@admin.com__ - __password__

## License

Basically, feel free to use and re-use any way you want.

                    git clone https://github.com/Amitshen/Laravel-admin.git
                    cp .env.example .env
                    php artisan key:generate
                    php artisan migrate --seed
                    composer install --ignore-platform-reqs
