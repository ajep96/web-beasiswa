# web-beasiswa
**README - Pendaftaran Beasiswa Online**

Selamat datang di sistem pendaftaran beasiswa online yang telah dikembangkan oleh Ajib Syah Abad. Sistem ini dirancang khusus untuk proses pendaftaran beasiswa di sebuah kampus dengan menggunakan Index Prestasi Kumulatif (IPK) sebagai salah satu kriteria penilaian.

### Fitur Utama

1. **Pengisian Data Pribadi**
   - Nama: Pengguna diminta untuk memasukkan nama lengkap.
   - Email: Format email akan diverifikasi untuk memastikan kevalidannya.
   - Nomor HP: Hanya angka yang diperbolehkan untuk memastikan format yang benar.

2. **Pemilihan Semester**
   - Pengguna dapat memilih semester saat ini dari pilihan 1 hingga 8, sesuai dengan jenjang studi S1 yang memiliki 8 semester.

3. **Asumsi IPK**
   - IPK akan diisi secara otomatis dengan menggunakan variabel konstan. Contohnya, asumsi IPK = 3.4 atau IPK = 2.9.

4. **Validasi IPK**
   - Jika IPK di bawah 3, pengguna tidak dapat melanjutkan pemilihan beasiswa, upload berkas, atau menyimpan data.
   - Jika IPK di atas 3, kursor akan secara otomatis berada pada pilihan beasiswa.

5. **Upload Berkas Syarat**
   - Pengguna dapat mengunggah berkas syarat beasiswa dalam format apa pun, seperti pdf, jpg, atau zip.

6. **Pendaftaran dan Status Pengajuan**
   - Setelah mengisi formulir, pengguna dapat mengklik "Daftar" untuk melihat hasil pendaftaran di menu khusus.
   - Status ajuan ("belum di verifikasi") akan secara otomatis ditampilkan di samping elemen formulir.

### Tugas yang Diselesaikan

1. **User Interface (UI) Mockup**
   - Mengimplementasikan desain antarmuka pengguna dengan membuat mockup untuk memvisualisasikan tata letak dan elemen formulir.
    
2. **Perintah Eksekusi Bahasa Pemrograman**
   - Menyertakan perintah eksekusi berbasis teks, grafik, dan multimedia untuk meningkatkan interaktivitas dan user experience.
    menampilkan grafik
    ""

3. **Kode Sesuai Guidelines dan Best Practices**
   - Menuliskan kode sesuai dengan panduan dan praktik terbaik untuk memastikan keberlanjutan dan keterbacaan kode.

4. **Pemrograman Terstruktur**
   - Mengimplementasikan pemrograman terstruktur dengan menggunakan tipe data yang tepat, struktur percabangan, prosedur, fungsi, dan array sesuai aturan penulisan program.
    " 
"
   - perulangan
    " // Menyimpan berkas ke folder "public/uploads" dan mengambil nama filenya
        // Menyimpan file berkas pendaftaran
        if ( $request->hasFile( 'berkas' ) ) {
            $berkas     = $request->file( 'berkas' );
            $namaBerkas = time() . '_' . $berkas->getClientOriginalName();
            $berkas->move( public_path( 'berkas' ), $namaBerkas );

            Beasiswa::create( $data + [ 'berkas' => $namaBerkas ] );

            return redirect()->route( 'hasil' )->with( 'success', 'Data Berhasil diinputkan' );
        }
        else {
            return redirect()->route( 'hasil' )->with( 'error', 'Data Gagal diinputkan, lengkapi data terlebih dahulu' );
        }
    "    
    Kode tersebut hanya melakukan satu perulangan jika file berkas ada, yaitu dengan menggunakanktur percabangan if dan else.
    Jadi, dalam kode di atas, hanya ada satu perulangan yaitu proses penguploadan file dan penyimpanan nama file ke database jika ada file berkas yang diupload.
 
   - Membuat program untuk akses file guna menyimpan dan mengelola data pendaftaran.
    Upload file berkas
     "// Menyimpan berkas ke folder "public/uploads" dan mengambil nama filenya
        // Menyimpan file berkas pendaftaran
        if ( $request->hasFile( 'berkas' ) ) {
            $berkas     = $request->file( 'berkas' );
            $namaBerkas = time() . '_' . $berkas->getClientOriginalName();
            $berkas->move( public_path( 'berkas' ), $namaBerkas );
            Beasiswa::create( $data + [ 'berkas' => $namaBerkas ] );
            return redirect()->route( 'hasil' )->with( 'success', 'Data Berhasil diinputkan' );
        }
        else {
            return redirect()->route( 'hasil' )->with( 'error', 'Data Gagal diinputkan, lengkapi data terlebih dahulu' );
        }"

6. **Menggunakan Library atau Komponen Pre-Existing**
   - Memanfaatkan library atau komponen pre-existing untuk meningkatkan efisiensi pengembangan dan fungsionalitas sistem.
    Library yang digunakan
   - Bootstrap
   - myChart
Dengan berbagai fitur dan implementasi yang telah dilakukan, sistem pendaftaran beasiswa online ini diharapkan dapat memudahkan dan mempercepat proses pendaftaran bagi mahasiswa yang berminat. Jika ada pertanyaan atau masukan, jangan ragu untuk menghubungi [kontak Anda]. Terima kasih atas dedikasi dan kerja keras Anda dalam mengembangkan platform ini!
