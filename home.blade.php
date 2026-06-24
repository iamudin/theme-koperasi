@php
  $profil = query()->detail('page','tupoksi',true);
  $bannersHome = get_banner('home', 5);
  $bannerHeader = get_banner('header');
  $sambutan = query()->detail('sambutan',false,true);
@endphp

<section class="relative text-white">
  @if(!empty($bannerHeader) && count($bannerHeader) > 0 && !empty($bannerHeader->image))
    <div class="absolute inset-0 overflow-hidden">
      <img src="{{ $bannerHeader->image }}" alt="Background" class="h-full w-full object-cover scale-105">
      <div class="absolute inset-0 bg-slate-950/60"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-900/60 to-emerald-900/50"></div>
    </div>
  @else
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900"></div>
  @endif
  <div class="relative z-10 max-w-7xl mx-auto px-4 py-16 md:py-20">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-200">
          <i class="fa fa-globe text-emerald-300"></i>
          <span>Selamat datang di Website Resmi</span>
        </div>
        <h1 class="mt-6 text-3xl md:text-5xl font-black leading-tight">{{ get_option('nama_organisasi') ?? 'Nama Instansi / Organisasi' }}</h1>
        <div class="mt-4 text-slate-200 leading-relaxed"> <i class="fa fa-map-marker-alt"></i> {{ get_option('alamat') ?? 'Alamat Organisasi / Instansi / Unit Kerja / Tim / Grup' }}</div>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="#layanan" class="inline-flex items-center gap-2 rounded-xl bg-emerald-400 px-5 py-3 text-sm font-bold text-slate-950 hover:bg-emerald-300">
            <i class="fa fa-bolt"></i>
            <span>Layanan Utama</span>
          </a>
          <a href="#tupoksi" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/15">
            <i class="fa fa-hand"></i>
            <span>Sambutan</span>
          </a>
          <button type="button" onclick="openSearchModal()" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/15">
            <i class="fa fa-magnifying-glass"></i>
            <span>Pencarian</span>
          </button>
        </div>
      </div>

      <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur">
        <div class="text-sm text-slate-200">Informasi Penting</div>
        <div class="mt-4 grid grid-cols-2 gap-4">
          <div class="rounded-2xl bg-white/5 p-4">
            <div class="text-xs text-slate-300">Jam Layanan</div>
            <div class="mt-1 font-bold">{{ get_option('jam_layanan') ?? 'Senin - Jumat, 08.00 - 16.00' }}</div>
          </div>
            <a href="https://sipendekar.bengkaliskab.go.id" class="rounded-2xl bg-white/5 p-4 hover:bg-white/10">
            <div class="text-xs text-slate-300">Pengaduan</div>
            <div class="mt-1 font-bold">SP4N Lapor</div>
          </a>
     
        </div>
        <div class="mt-6 rounded-2xl border border-white/10 bg-slate-950/40 p-5">
          <div class="text-xs text-slate-300">Tanggal & Waktu</div>
          <div class="mt-2" id="homeRealtimeClock">
            <div class="text-xl font-bold text-white" id="clockDate">-</div>
            <div class="text-3xl font-black text-emerald-300 mt-1" id="clockTime">-</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function() {
  const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
  const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

  function updateClock() {
    const now = new Date();
    const dayName = days[now.getDay()];
    const date = now.getDate();
    const monthName = months[now.getMonth()];
    const year = now.getFullYear();
    
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    document.getElementById('clockDate').textContent = `${dayName}, ${date} ${monthName} ${year}`;
    document.getElementById('clockTime').textContent = `${hours}:${minutes}:${seconds}`;
  }

  updateClock();
  setInterval(updateClock, 1000);
})();
</script>

<section class="relative z-20 max-w-7xl mx-auto px-4 -mt-10 pb-6">
  <div class="rounded-3xl overflow-hidden shadow border border-white/10 dark:border-slate-800 relative">
    <div id="homeBannerSlider" class="relative aspect-[16/7]">
      @if($bannersHome && count($bannersHome) > 0)
        @foreach($bannersHome as $i => $banner)
          <div class="banner-slide bg-gradient-to-r from-emerald-600 via-emerald-500 to-slate-900 absolute inset-0 opacity-0 transition-opacity duration-500 {{ $i === 0 ? 'opacity-100' : '' }}">
            @if(!empty($banner->link))
              <a href="{{ $banner->link }}" class="block h-full">
            @endif
                @if(!empty($banner->image))
                  <img src="{{ $banner->image }}" alt="{{ $banner->name ?? 'Banner' }}" class="h-full w-full object-cover">
                @else
                  <div class="h-full w-full flex items-center justify-center text-white/90">
                    <div class="text-center px-6">
                      <div class="text-xs tracking-widest uppercase text-white/70">Banner</div>
                      <div class="mt-2 text-xl md:text-2xl font-black">{{ $banner->name ?? 'Informasi & Pengumuman' }}</div>
                    </div>
                  </div>
                @endif
            @if(!empty($banner->link))
              </a>
            @endif
          </div>
        @endforeach
      @else
        <div class="banner-slide aspect-[16/9] bg-gradient-to-r from-emerald-600 via-emerald-500 to-slate-900">
          <div class="h-full w-full flex items-center justify-center text-white/90">
            <div class="text-center px-6">
              <div class="text-xs tracking-widest uppercase text-white/70">Banner</div>
              <div class="mt-2 text-xl md:text-2xl font-black">Informasi & Pengumuman</div>
            </div>
          </div>
        </div>
      @endif
    </div>

    @if($bannersHome && count($bannersHome) > 1)
      <button id="prevBanner" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/20 hover:bg-white flex items-center justify-center text-slate-800 shadow-lg transition hover:scale-110">
        <i class="fa fa-chevron-left"></i>
      </button>
      <button id="nextBanner" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/20 hover:bg-white flex items-center justify-center text-slate-800 shadow-lg transition hover:scale-110">
        <i class="fa fa-chevron-right"></i>
      </button>

      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
        @foreach($bannersHome as $i => $banner)
          <button class="banner-dot w-2 h-2 rounded-full transition {{ $i === 0 ? 'bg-white' : 'bg-white/50' }} hover:bg-white" data-index="{{ $i }}"></button>
        @endforeach
      </div>
    @endif
  </div>

  @if($bannersHome && count($bannersHome) > 1)
  <script>
    (function() {
      const slides = document.querySelectorAll('#homeBannerSlider .banner-slide');
      const dots = document.querySelectorAll('.banner-dot');
      const prevBtn = document.getElementById('prevBanner');
      const nextBtn = document.getElementById('nextBanner');
      let currentIndex = 0;
      let autoPlayInterval;

      function showSlide(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;
        currentIndex = index;

        slides.forEach((slide, i) => {
          slide.classList.toggle('opacity-100', i === index);
          slide.classList.toggle('opacity-0', i !== index);
        });

        dots.forEach((dot, i) => {
          dot.classList.toggle('bg-white', i === index);
          dot.classList.toggle('bg-white/50', i !== index);
        });
      }

      function nextSlide() {
        showSlide(currentIndex + 1);
      }

      function prevSlide() {
        showSlide(currentIndex - 1);
      }

      function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 7000);
      }

      function stopAutoPlay() {
        clearInterval(autoPlayInterval);
      }

      prevBtn.addEventListener('click', () => {
        prevSlide();
        stopAutoPlay();
        startAutoPlay();
      });

      nextBtn.addEventListener('click', () => {
        nextSlide();
        stopAutoPlay();
        startAutoPlay();
      });

      dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
          showSlide(i);
          stopAutoPlay();
          startAutoPlay();
        });
      });

      startAutoPlay();
    })();
  </script>
  @endif
</section>

<section id="tupoksi" class="max-w-7xl mx-auto px-4 py-12">
  <div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100"> <i class="fa fa-hand"></i> Sambutan Pimpinan</h2>
      <div class="mt-4 text-slate-700 leading-relaxed dark:text-slate-200">
        {!! str($sambutan->content ?? 'Selamat datang di website resmi kami')->limit(800). '<a class="font-bold" href="'.url($sambutan->url ?? '/').'">[ Selengkapnya ]</a>' ?? 'Selamat datang di website resmi kami' !!}
      </div>
      <div class="mt-6 flex items-center gap-4">
        <div class="relative">
          <div class="h-20 w-20 rounded-full bg-gradient-to-br from-emerald-100 to-emerald-200 dark:from-emerald-900/50 dark:to-slate-800 overflow-hidden border-2 border-emerald-200 dark:border-emerald-800">
            <img src="{{ $sambutan->thumbnail ?? noimage() }}" alt="Foto Pimpinan" class="h-full w-full object-cover">
          </div>
        </div>
        <div>
          <div class="text-sm text-slate-500 dark:text-slate-400">{{ $sambutan->field?->jabatan ?? 'Kepala Dinas' }}</div>
          <div class="font-bold text-slate-900 dark:text-white">{{ $sambutan->field?->nama ?? 'Nama Pimpinan' }}</div>
        </div>
      </div>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="text-sm text-slate-500 dark:text-slate-400">Akses Cepat</div>
      <div class="mt-4 space-y-3">
        <a href="#layanan" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">Daftar Layanan</div>
            <i class="fa fa-arrow-right text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Informasi layanan koperasi dan UMKM.</div>
        </a>
        <a href="#berita" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">Publikasi</div>
            <i class="fa fa-rss text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Berita dan Kegiatan</div>
        </a>
        <a href="/download" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">Informasi Publik</div>
            <i class="fa fa-download text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Dokumen Penting Instansi</div>
        </a>
        <a href="#galeri" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">Galeri</div>
            <i class="fa fa-camera text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Galeri Dokumentasi</div>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="layanan" class="max-w-7xl mx-auto px-4 py-12">
  <div class="flex items-end justify-between gap-6">
    <div>
      <div class="text-sm text-slate-500 dark:text-slate-400"> <i class="fa fa-desktop"></i> Pelayanan</div>
      <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Layanan Utama</h2>
    </div>
  </div>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse(query()->index_limit('layanan',3) as $row)
    <a href="{{ $row->link }}" class="group block rounded-3xl overflow-hidden shadow hover:shadow-lg transition">
      <div class="relative aspect-[4/3]">
        <div class="absolute inset-0">
          <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-105 transition duration-300">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6">
          <div class="font-bold text-white text-lg">{{ $row->title }}</div>
          <div class="mt-2 text-sm text-slate-200 line-clamp-2">{{ $row->description }}</div>
        </div>
      </div>
    </a>
   @empty
   <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100">Belum ada layanan.</div>
   </div>
   @endforelse
  </div>
</section>



<section id="berita" class="max-w-7xl mx-auto px-4 py-12">
  <div class="flex items-end justify-between gap-6">
    <div>
      <div class="text-sm text-slate-500 dark:text-slate-400"><i class="fa fa-rss"></i> Publikasi</div>
      <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Berita & Kegiatan</h2>
    </div>
    <a href="{{ url('berita') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">Lihat Semua</a>
  </div>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse(query()->index_limit('berita', 3) as $row)
      <a href="{{ $row->link }}" class="group rounded-3xl overflow-hidden bg-white shadow hover:shadow-lg transition dark:bg-slate-900">
        <div class="aspect-[16/9] bg-slate-100 dark:bg-slate-800">
          <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover">
        </div>
        <div class="p-5">
          <div class="text-xs text-slate-500 dark:text-slate-400"> <i class="fa fa-clock"></i> {{ $row->created_at?->diffForHumans() ?? '' }} oleh {{ $row->user->name }}</div>
          <div class="mt-1 font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-2 dark:text-slate-100">{{ $row->title }}</div>
          <div class="mt-2 text-sm text-slate-600 line-clamp-2 dark:text-slate-300">{{ $row->description }}</div>
        </div>
      </a>
    @empty
      <div class="rounded-3xl bg-white p-6 shadow text-slate-600 dark:bg-slate-900 dark:text-slate-300">Belum ada berita.</div>
    @endforelse
  </div>
</section>

<section id="galeri" class="max-w-7xl mx-auto px-4 py-12">
  <div class="flex items-end justify-between gap-6">
    <div>
      <div class="text-sm text-slate-500 dark:text-slate-400">  <i class="fa fa-camera"></i> Dokumentasi</div>
      <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Galeri Terbaru</h2>
    </div>
    <a href="{{ url('galeri') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">Lihat Semua</a>
  </div>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse(query()->index_limit('galeri', 3) as $row)
      <a href="{{ $row->link }}" class="group rounded-3xl overflow-hidden shadow hover:shadow-lg transition block">
        <div class="relative aspect-[4/3]">
          <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-105 transition duration-300 bg-slate-100 dark:bg-slate-800">
          <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
          @if(!empty($row->data_field['link_video']))
            <div class="absolute top-4 left-4 w-12 h-12 rounded-full bg-white/90 flex items-center justify-center shadow-lg">
              <i class="fa fa-play text-emerald-600 text-xl ml-1"></i>
            </div>
          @endif
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <div class="text-xs text-slate-200">{{ $row->created ?? '' }}</div>
            <div class="text-lg font-bold text-white line-clamp-2">{{ $row->title }}</div>
          </div>
        </div>
      </a>
    @empty
      <div class="rounded-3xl bg-white p-6 shadow text-slate-600 dark:bg-slate-900 dark:text-slate-300">Belum ada galeri.</div>
    @endforelse
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-12 pb-16">
  <div id="kontak" class="rounded-3xl bg-slate-900 text-white p-8 md:p-10">
    <div class="grid md:grid-cols-2 gap-8">
      <div class="space-y-6">
        <div>
          <div class="text-sm text-slate-300">Kontak</div>
          <h2 class="mt-1 text-2xl font-bold">{{ get_option('nama_organisasi') ?? 'Di' }}</h2>
          <div class="mt-4 text-slate-200 leading-relaxed">Gunakan informasi di bawah ini untuk menghubungi kami</div>
        </div>
        <div class="space-y-3">
          <div class="rounded-2xl bg-white/10 p-4">
            <div class="text-xs text-slate-300">Alamat</div>
            <div class="mt-1 font-semibold">{{ get_option('alamat') ?? '-' }}</div>
          </div>
          <div class="rounded-2xl bg-white/10 p-4">
            <div class="text-xs text-slate-300">Email</div>
            <div class="mt-1 font-semibold">{{ get_option('email') ?? '-' }}</div>
          </div>
          <div class="rounded-2xl bg-white/10 p-4">
            <div class="text-xs text-slate-300">Telepon</div>
            <div class="mt-1 font-semibold">{{ get_option('telepon') ?? '-' }}</div>
          </div>
        </div>
      </div>
      <div>
        @php
          $mapUrl = null;
          if (get_option('latitude') && get_option('longitude')) {
            $mapUrl = map_by_coordinate(get_option('longitude'), get_option('latitude'));
          } elseif (get_option('link_peta')) {
            $mapUrl = get_option('link_peta');
          }
        @endphp
        @if($mapUrl)
          <div class="rounded-2xl overflow-hidden aspect-[10/6] bg-slate-800">
            <iframe
              src="{{ $mapUrl }}"
              class="w-full h-full"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        @else
          <div class="rounded-2xl aspect-square bg-slate-800 flex items-center justify-center">
            <div class="text-center px-6">
              <i class="fa fa-map-marker-alt text-4xl text-slate-500 mb-3"></i>
              <div class="text-sm text-slate-400">Peta lokasi belum tersedia</div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 z-[9999] bg-slate-950/80 backdrop-blur-sm hidden items-center justify-center p-4">
  <div class="w-full max-w-2xl bg-white dark:bg-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 dark:border-slate-800">
    <div class="p-6">
      <div class="flex items-center justify-between mb-6">
        <div class="text-lg font-bold text-slate-900 dark:text-white">Cari Informasi</div>
        <button type="button" onclick="closeSearchModal()" class="h-10 w-10 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 dark:bg-slate-800 dark:hover:bg-slate-700 dark:text-slate-300 transition">
          <i class="fa fa-times"></i>
        </button>
      </div>
      <form action="{{ url('search') }}" method="post" class="space-y-4">
        <div class="relative">
          <input type="text" id="searchInput" name="keyword" placeholder="Ketik pencarian Anda..." class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-5 py-4 text-slate-900 placeholder:text-slate-500 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 focus:outline-none dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-400 transition">
          <i class="fa fa-search absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 dark:text-slate-400"></i>
        </div>
        <div class="flex gap-3 justify-end">
          <button type="button" onclick="closeSearchModal()" class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800 transition">Batal</button>
          <button type="submit" class="px-6 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">Cari</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Search Modal Script -->
<script>
  function openSearchModal() {
    const modal = document.getElementById('searchModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
    document.getElementById('searchInput').focus();
  }

  function closeSearchModal() {
    const modal = document.getElementById('searchModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
  }

  // Close on backdrop click
  document.getElementById('searchModal').addEventListener('click', function(e) {
    if (e.target === this) {
      closeSearchModal();
    }
  });

  // Close on ESC key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeSearchModal();
    }
  });
</script>
