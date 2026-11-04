<?php require_once __DIR__ . '/header.php'; ?>

<main>
  <!-- Hero Section -->
  <section id="beranda" class="bg-gradient-to-br from-[#eaf0ff] to-[#fff7e8] py-[80px]">
    <div class="w-[90%] max-w-[1100px] mx-auto">
      <div class="grid grid-cols-[1.5fr_1fr] items-center gap-[55px] max-[800px]:grid-cols-1 max-[800px]:text-center">
        <div>
          <p class="text-[#f39c12] text-[13px] font-bold tracking-[1.5px] mb-3">MEDIA INFORMASI PENYEWAAN</p>
          <h2 class="text-[clamp(30px,5vw,48px)] leading-[1.2] mb-5 font-bold">Temukan Alat Bangunan yang Kamu Butuhkan</h2>
          <p class="max-w-[600px] mb-7 text-[#58657a] max-[800px]:mx-auto">BangunSewa membantu kamu menemukan informasi alat bangunan yang tersedia untuk disewa tanpa harus membelinya.</p>
          <a href="#alat" class="inline-block rounded-lg font-bold bg-[#1f3c88] text-white px-6 py-3 hover:bg-[#152c67]">Lihat Alat</a>
        </div>
        <div class="bg-white text-center px-6 py-10 rounded-[18px] shadow-lg">
          <div class="text-[70px] mb-4">🛠️</div>
          <h3 class="font-bold text-xl mb-2">Alat Berkualitas</h3>
          <p class="text-[#58657a]">Temukan berbagai alat bangunan dari berbagai kategori.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Search Section -->
  <section class="py-12 bg-white">
    <div class="w-[90%] max-w-[900px] mx-auto">
      <div class="text-center mb-6">
        <p class="text-[#f39c12] text-sm font-bold tracking-wider mb-2">CARI ALAT</p>
        <h2 class="text-3xl font-bold">Temukan Alat yang Kamu Butuhkan</h2>
      </div>
      <form class="flex gap-3 max-[600px]:flex-col">
        <input type="search" placeholder="Cari nama alat, contoh: Bor, Gerinda..." class="flex-1 border border-gray-300 rounded-lg px-5 py-3 outline-none focus:border-[#1f3c88]">
        <button type="submit" class="bg-[#1f3c88] text-white font-bold px-7 py-3 rounded-lg hover:bg-[#152c67]">🔍 Cari</button>
      </form>
      <p class="text-center text-sm text-gray-500 mt-3">Cari berdasarkan nama atau jenis alat.</p>
    </div>
  </section>

  <!-- Kategori Section -->
  <section id="kategori" class="py-16">
    <div class="w-[90%] max-w-[1100px] mx-auto">
      <div class="text-center max-w-[700px] mx-auto mb-10">
        <p class="text-[#f39c12] text-[13px] font-bold tracking-[1.5px] mb-2">KATEGORI</p>
        <h2 class="text-[34px] font-bold mb-4">Pilih Kategori Alat</h2>
        <p class="text-[#69758a]">Temukan alat berdasarkan jenis pekerjaan yang sedang kamu lakukan.</p>
      </div>
      <div class="grid grid-cols-4 gap-5 max-[800px]:grid-cols-2 max-[500px]:grid-cols-1">
        <a href="#alat" class="bg-white p-6 rounded-xl text-center shadow hover:-translate-y-1 transition">
          <div class="text-5xl mb-3">🔩</div>
          <h3 class="font-bold">Peralatan Bor</h3>
          <p class="text-sm text-gray-500">Bor dan perlengkapannya</p>
        </a>
        <a href="#alat" class="bg-white p-6 rounded-xl text-center shadow hover:-translate-y-1 transition">
          <div class="text-5xl mb-3">⚙️</div>
          <h3 class="font-bold">Peralatan Potong</h3>
          <p class="text-sm text-gray-500">Gerinda dan alat potong</p>
        </a>
        <a href="#alat" class="bg-white p-6 rounded-xl text-center shadow hover:-translate-y-1 transition">
          <div class="text-5xl mb-3">🪜</div>
          <h3 class="font-bold">Peralatan Tinggi</h3>
          <p class="text-sm text-gray-500">Tangga dan perlengkapan</p>
        </a>
        <a href="#alat" class="bg-white p-6 rounded-xl text-center shadow hover:-translate-y-1 transition">
          <div class="text-5xl mb-3">🔨</div>
          <h3 class="font-bold">Peralatan Tangan</h3>
          <p class="text-sm text-gray-500">Palu dan alat lainnya</p>
        </a>
      </div>
    </div>
  </section>

  <!-- Daftar Alat Section (PHP Loop Rendering) -->
  <section id="alat" class="py-16 bg-white">
    <div class="w-[90%] max-w-[1100px] mx-auto">
      <div class="text-center max-w-[700px] mx-auto mb-10">
        <p class="text-[#f39c12] text-[13px] font-bold tracking-[1.5px] mb-2">KOLEKSI ALAT</p>
        <h2 class="text-[34px] font-bold mb-4">Daftar Alat Bangunan</h2>
        <p class="text-[#69758a]">Beberapa alat yang tersedia untuk disewa.</p>
      </div>

      <div class="grid grid-cols-3 gap-6 max-[800px]:grid-cols-2 max-[550px]:grid-cols-1">
        <?php foreach ($daftarAlat as $item): ?>
          <article class="bg-[#f7f9fc] rounded-xl overflow-hidden shadow">
            <div class="bg-[#eaf0ff] min-h-[160px] grid place-items-center">
              <?php if (file_exists($item->getGambar())): ?>
                <img src="<?= $item->getGambar(); ?>" alt="<?= htmlspecialchars($item->getNama()); ?>" class="h-32 object-contain">
              <?php else: ?>
                <span class="text-7xl">
                  <?php 
                    switch ($item->getKategori()) {
                      case 'Bor': echo '🔩'; break;
                      case 'Potong': echo '⚙️'; break;
                      case 'Tinggi': echo '🪜'; break;
                      case 'Tangan': echo '🔨'; break;
                      default: echo '🧰'; break;
                    }
                  ?>
                </span>
              <?php endif; ?>
            </div>

            <div class="p-6">
              <div class="flex justify-between items-start gap-3">
                <h3 class="text-xl font-bold"><?= htmlspecialchars($item->getNama()); ?></h3>
                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full"><?= htmlspecialchars($item->getStatus()); ?></span>
              </div>
              <p class="text-gray-500 my-3"><?= htmlspecialchars($item->getDeskripsi()); ?></p>
              <p class="text-sm text-gray-500">📍 <?= htmlspecialchars($item->getLokasi()); ?></p>
              <strong class="block text-[#1f3c88] text-lg my-4"><?= $item->getHargaFormatted(); ?></strong>
              <a href="#kontak" class="inline-block bg-[#f39c12] text-white font-bold px-4 py-2 rounded-lg hover:bg-[#d98200]">Tanya Informasi</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Tentang Kami Section -->
  <section id="tentang" class="py-20">
    <div class="w-[90%] max-w-[1100px] mx-auto">
      <div class="grid grid-cols-2 gap-10 items-center max-[800px]:grid-cols-1">
        <div>
          <p class="text-[#f39c12] text-[13px] font-bold tracking-[1.5px] mb-3">TENTANG KAMI</p>
          <h2 class="text-4xl font-bold mb-5">Informasi Penyewaan Lebih Mudah</h2>
          <p class="text-[#69758a]">BangunSewa merupakan website promosi yang menyediakan informasi mengenai alat bangunan, harga sewa, lokasi, dan kontak penyedia.</p>
        </div>
        <div class="bg-white rounded-2xl p-8 shadow">
          <div class="text-5xl mb-4">🏗️</div>
          <h3 class="text-xl font-bold mb-3">Mengapa BangunSewa?</h3>
          <ul class="space-y-3 text-gray-600">
            <li>✓ Informasi alat mudah ditemukan</li>
            <li>✓ Informasi harga sewa</li>
            <li>✓ Informasi lokasi penyedia</li>
            <li>✓ Hubungi penyedia melalui WhatsApp</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Cara Penyewaan Section -->
  <section class="py-16 bg-white">
    <div class="w-[90%] max-w-[1100px] mx-auto">
      <div class="text-center mb-10">
        <p class="text-[#f39c12] text-[13px] font-bold tracking-[1.5px] mb-2">CARA PENYEWAAN</p>
        <h2 class="text-3xl font-bold">Cara Menyewa Alat</h2>
      </div>
      <div class="grid grid-cols-4 gap-6 max-[800px]:grid-cols-2 max-[500px]:grid-cols-1">
        <div class="text-center">
          <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-[#1f3c88] text-white grid place-items-center text-xl font-bold">1</div>
          <h3 class="font-bold mb-2">Pilih Alat</h3>
          <p class="text-sm text-gray-500">Cari alat yang kamu butuhkan.</p>
        </div>
        <div class="text-center">
          <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-[#1f3c88] text-white grid place-items-center text-xl font-bold">2</div>
          <h3 class="font-bold mb-2">Lihat Informasi</h3>
          <p class="text-sm text-gray-500">Periksa harga dan lokasi alat.</p>
        </div>
        <div class="text-center">
          <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-[#1f3c88] text-white grid place-items-center text-xl font-bold">3</div>
          <h3 class="font-bold mb-2">Hubungi Penyedia</h3>
          <p class="text-sm text-gray-500">Hubungi penyedia melalui WhatsApp.</p>
        </div>
        <div class="text-center">
          <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-[#1f3c88] text-white grid place-items-center text-xl font-bold">4</div>
          <h3 class="font-bold mb-2">Sewa Alat</h3>
          <p class="text-sm text-gray-500">Lakukan proses penyewaan langsung.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Kontak Section -->
  <section id="kontak" class="py-20">
    <div class="w-[90%] max-w-[1100px] mx-auto">
      <div class="bg-[#1f3c88] text-white rounded-[18px] px-11 py-12 flex justify-between items-center gap-6 max-[800px]:flex-col max-[800px]:text-center">
        <div>
          <p class="text-[#f39c12] text-[13px] font-bold tracking-[1.5px] mb-3">HUBUNGI PENYEDIA</p>
          <h2 class="text-3xl font-bold mb-4">Butuh Informasi Alat?</h2>
          <p class="text-[#dce5ff]">Silakan hubungi penyedia untuk menanyakan ketersediaan dan harga alat.</p>
        </div>
        <a href="https://wa.me/6281234567890" target="_blank" class="inline-block bg-[#f39c12] text-white font-bold px-6 py-3 rounded-lg whitespace-nowrap hover:bg-[#d98200]">Hubungi WhatsApp</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>