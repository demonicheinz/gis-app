# Kebijakan Keamanan

## Melaporkan Kerentanan

Jika Anda menemukan kerentanan keamanan dalam aplikasi GIS Banyumas, harap laporkan kepada kami dengan mengirimkan email ke [admin@heinz.id](mailto:admin@heinz.id). Kami akan menyelidiki semua laporan yang valid dan akan bekerja dengan Anda untuk memahami dan mengatasi masalah tersebut.

## Praktik Keamanan

### Kredensial dan Kunci Rahasia

- **JANGAN** menyimpan kredensial atau kunci rahasia dalam kode sumber.
- **JANGAN** mengunggah file `.env` atau file konfigurasi yang berisi kredensial ke repositori publik.
- **SELALU** gunakan variabel lingkungan untuk menyimpan kredensial.

### Deployment

- Pastikan server produksi selalu diperbarui dengan patch keamanan terbaru.
- Gunakan HTTPS untuk semua komunikasi.
- Batasi akses ke server produksi hanya untuk personel yang berwenang.

### Pengembangan

- Lakukan pemindaian keamanan secara teratur pada kode dan dependensi.
- Ikuti praktik pengkodean yang aman, seperti validasi input dan sanitasi output.
- Perbarui dependensi secara teratur untuk mengatasi kerentanan yang diketahui.

## Dependensi Pihak Ketiga

Aplikasi ini menggunakan beberapa dependensi pihak ketiga. Kami berusaha untuk menjaga dependensi ini tetap diperbarui, tetapi jika Anda menemukan kerentanan dalam salah satu dependensi, harap laporkan kepada kami.

## Penanganan Data

- Data pengguna harus ditangani sesuai dengan peraturan privasi data yang berlaku.
- Informasi sensitif harus selalu dienkripsi saat disimpan dan ditransmisikan.
- Akses ke data pengguna harus dibatasi berdasarkan prinsip hak istimewa paling sedikit. 