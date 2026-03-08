# Code
- php artisan make:controller AdminController
- php artisan route:list
- php artisan make:model HomeSlide -m
- php artisan migrate
- php artisan make:controller Home/HomeSliderController
- composer require intervention/image
- php artisan make:model About -m
- php artisan migrate
- php artisan make:controller Home/AboutController
- {!! strip_tags($aboutpage->long_description) !!}
- php artisan make:model MultiImage -m

- If you are using "imageIntervention" V3 and face this error then you have to update some function because fome functions are replaced.
- Image::make() relpaced by Image::read().
- Image::canvas() replaced by Image::create() and so on. Just replace function. Worked for me, hope work for you.
- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
- <script src="{{ asset('backend/assets/js/code.js') }}"></script>

- php artisan make:model Portfolio -m
- php artisan migrate
- php artisan make:controller Home/PortfollioController