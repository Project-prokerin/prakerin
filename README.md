## Prakerin
Prakerin adalah praktek kerja industri yang di gunakan untuk mengelola data magang di [SMK Taruna Bhakti Depok.](https://www.smktarunabhakti.net)

## How to use
1. unduh prokerin | clone : <https://github.com/Project-prokerin/prakerin.git>
2. taruh folder prokerin ke htdocs
3. ubah .env.example ke .env
4. lalau ubah nama database di env
5. buka cmd cd ke path prakerin
6. langkah pertama install composer dulu
 
   ```php
   composer install
    ```
7. langkah kedua update composer 
   
   ```php
   composer update
    ```
8. langkah ketga ketik seperti ini
 
   ```php
   php artisan key:generate
   ```
9. terakhir ketik untuk migrate table dari database


   ```php
   php artisan migrate:fresh -- seed
   ```
## Having bug?
1. cara pertama install composer dulu seperti di bawah ini

```php
  composer install
   ```
2. jika masih tidak bisa cara kedua coba ketik seperti di bawah ini

```php
   composer dump-autoload
   ```

## account + role

- Hubin : admin | pass = password
- kepala sekolah : KepalaSekolah | pass = password
- kaprog : BidangKaprog | pass = password
- bkk : bkk | BidangBkk = password
- tata usaha / tu : BidangTU | pass = password
- kesiswaan : kesiswaan | pass = password
- kurikulum : kurikulum | pass = password
- litbang : litbang | pass = password

- siswa : siswa 1-5 | pass = password

## credit
- [design web stisla](https://getstisla.com/)
- [framework laravel](https://laravel.com/)
- [jquery](https://jquery.com/)
- [fontawesome icon](https://fontawesome.com/)
- [bootstrap](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [DataTables](https://datatables.net/)
- [SweetAlert](https://sweetalert2.github.io/)


## team project
- [Rafie Aydin ](https://github.com/Rafieaydin) - team leader + requirement analysis
- [Nur Firdaus](https://github.com/NurFirdausR) - team requirement analysis
- [walada Hulama Zaki](https://github.com/waladahlmzaqi) - custom design stisla
- [Muhammad Raditya Nugraha Ilham](https://github.com/RadityaNugra) - custom design stisla


