# e-wedo (e-commorec wedding orginizer bireuen)
Aplikasi Marketplace wedding orginizer collab aditya aziz fikri untuk Yunda Uniki

Untuk jalanin nya 
1. Install ``PHP 8.1 atau 8.2``
2. Install Composer
3. Buka VSCODE & buka project nya
4. Ubah file ``.env_asli`` jadi ke .env dan hapus isian ``DB_Password``
5. Buka Terminal vscode
6. Jalankan perintah composer install sampai muncul folder ``vendor``
7. Jalankan apache & Mysql di Xampp kemudian akses PHPMYADMIN
8. Buatlah Database kosong dengan nama elaundry
9. Jalankan perintah ``php artisan serve``
8. Jalankan perintah ``php artisan migrate:fresh --seed --seeder=UserSeeder`` di terminal vscode
9. Buka http://127.0.0.1:8000/ di browser
