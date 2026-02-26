# Gestion des Réservations – Laravel

Application de gestion de réservations développée avec :

- Laravel
- Breeze (authentification)
- Livewire
- Filament (admin panel)
- TailwindCSS

---

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve

Admin Panel

Accessible via:

/admin

Créer un utilisateur admin : php artisan make:filament-user
screenshots dans folder /screenshots
