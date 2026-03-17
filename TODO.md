# Gallery App Photo Error Fix TODO

## Steps (Approved Plan):
- [x] 1. Run `php artisan migrate` (create visuras table)
- [x] 2. Edit visura/index.blade.php (pass :photos="$photos")
- [x] 3. Edit hero-section.blade.php (use passed $photos)
- [x] 4. Run `npm run build` (Vite assets)
- [x] 5. Run `php artisan storage:link` (photo serving) — already exists
- [x] 6. Run `php artisan optimize:clear` (clear caches)
- [ ] 7. Test `php artisan serve` and visit /visura

Progress tracked here after each step.
