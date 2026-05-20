@php
  $profil = query()->detail('profil');
@endphp

<section class="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 text-white">
  <div class="max-w-7xl mx-auto px-4 py-16 md:py-20">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-200">
          <i class="fa fa-handshake text-emerald-300"></i>
          <span>Pelayanan Koperasi & UKM</span>
        </div>
        <h1 class="mt-6 text-3xl md:text-5xl font-black leading-tight">{{ get_option('nama') ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah' }}</h1>
        <div class="mt-4 text-slate-200 leading-relaxed">{{ get_option('tagline') ?? 'Mendorong koperasi yang sehat dan UMKM yang berdaya saing melalui pembinaan, fasilitasi, dan layanan publik.' }}</div>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="#layanan" class="inline-flex items-center gap-2 rounded-xl bg-emerald-400 px-5 py-3 text-sm font-bold text-slate-950 hover:bg-emerald-300">
            <i class="fa fa-bolt"></i>
            <span>Layanan Utama</span>
          </a>
          <a href="#tupoksi" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/15">
            <i class="fa fa-list-check"></i>
            <span>Tupoksi</span>
          </a>
          <a href="{{ url('search') }}" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/15">
            <i class="fa fa-magnifying-glass"></i>
            <span>Pencarian</span>
          </a>
        </div>
      </div>

      <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur">
        <div class="text-sm text-slate-200">Informasi Penting</div>
        <div class="mt-4 grid grid-cols-2 gap-4">
          <div class="rounded-2xl bg-white/5 p-4">
            <div class="text-xs text-slate-300">Jam Layanan</div>
            <div class="mt-1 font-bold">{{ get_option('jam_layanan') ?? 'Senin - Jumat, 08.00 - 16.00' }}</div>
          </div>
          <div class="rounded-2xl bg-white/5 p-4">
            <div class="text-xs text-slate-300">Pengaduan</div>
            <div class="mt-1 font-bold">{{ get_option('pengaduan_label') ?? 'Lapor & Saran' }}</div>
          </div>
          <a href="{{ get_option('ppid_url') ?? '#' }}" class="rounded-2xl bg-white/5 p-4 hover:bg-white/10">
            <div class="text-xs text-slate-300">PPID</div>
            <div class="mt-1 font-bold">Informasi Publik</div>
          </a>
          <a href="{{ get_option('pengaduan_url') ?? '#' }}" class="rounded-2xl bg-white/5 p-4 hover:bg-white/10">
            <div class="text-xs text-slate-300">Pengaduan</div>
            <div class="mt-1 font-bold">Aspirasi Warga</div>
          </a>
        </div>
        <div class="mt-6 rounded-2xl border border-white/10 bg-slate-950/40 p-5">
          <div class="text-xs text-slate-300">Alamat</div>
          <div class="mt-1 text-sm text-slate-200">{{ get_option('alamat') ?? 'Alamat kantor belum diatur.' }}</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="tupoksi" class="max-w-7xl mx-auto px-4 py-12">
  <div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="text-sm text-slate-500 dark:text-slate-400">Tugas Pokok</div>
      <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Tugas Pokok dan Fungsi</h2>
      <div class="mt-4 text-slate-700 leading-relaxed dark:text-slate-200">{!! $profil?->content ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah melaksanakan urusan pemerintahan daerah di bidang koperasi, usaha kecil, dan menengah serta tugas pembantuan sesuai ketentuan peraturan perundang-undangan.' !!}</div>
      <div class="mt-6 grid sm:grid-cols-2 gap-4">
        <div class="rounded-2xl border border-slate-200 p-5 dark:border-slate-800">
          <div class="font-bold text-slate-900 dark:text-slate-100">Pembinaan Koperasi</div>
          <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Pendampingan kelembagaan, tata kelola, RAT, dan penguatan manajemen.</div>
        </div>
        <div class="rounded-2xl border border-slate-200 p-5 dark:border-slate-800">
          <div class="font-bold text-slate-900 dark:text-slate-100">Pengembangan UMKM</div>
          <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Peningkatan kapasitas usaha, produktivitas, inovasi, dan daya saing.</div>
        </div>
        <div class="rounded-2xl border border-slate-200 p-5 dark:border-slate-800">
          <div class="font-bold text-slate-900 dark:text-slate-100">Fasilitasi Permodalan</div>
          <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Akses pembiayaan, kemitraan, dan penguatan ekosistem usaha.</div>
        </div>
        <div class="rounded-2xl border border-slate-200 p-5 dark:border-slate-800">
          <div class="font-bold text-slate-900 dark:text-slate-100">Pengawasan & Evaluasi</div>
          <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Pemantauan program, pendataan, serta evaluasi kinerja layanan.</div>
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
        <a href="{{ get_option('layanan_online_url') ?? '#' }}" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">Layanan Online</div>
            <i class="fa fa-arrow-up-right-from-square text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Portal layanan dan pengajuan.</div>
        </a>
        <a href="{{ get_option('ppid_url') ?? '#' }}" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">PPID</div>
            <i class="fa fa-arrow-up-right-from-square text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Permohonan informasi publik.</div>
        </a>
        <a href="#kontak" class="block rounded-2xl border border-slate-200 p-4 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
          <div class="flex items-center justify-between">
            <div class="font-semibold text-slate-900 dark:text-slate-100">Kontak</div>
            <i class="fa fa-phone text-slate-400 dark:text-slate-500"></i>
          </div>
          <div class="mt-1 text-sm text-slate-600 dark:text-slate-300">Telepon, email, dan alamat kantor.</div>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="layanan" class="max-w-7xl mx-auto px-4 py-12">
  <div class="flex items-end justify-between gap-6">
    <div>
      <div class="text-sm text-slate-500 dark:text-slate-400">Pelayanan</div>
      <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Layanan Utama</h2>
    </div>
    <div class="text-sm text-slate-500 dark:text-slate-400">{{ get_option('jam_layanan') ?? '' }}</div>
  </div>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
        <i class="fa fa-clipboard-check"></i>
      </div>
      <div class="mt-4 font-bold text-slate-900 dark:text-slate-100">Pembinaan Koperasi</div>
      <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Pendampingan kelembagaan, RAT, penguatan manajemen, dan tata kelola.</div>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
        <i class="fa fa-store"></i>
      </div>
      <div class="mt-4 font-bold text-slate-900 dark:text-slate-100">Pendampingan UMKM</div>
      <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Konsultasi usaha, penguatan produk, peningkatan kapasitas, dan legalitas.</div>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
        <i class="fa fa-money-bill-trend-up"></i>
      </div>
      <div class="mt-4 font-bold text-slate-900 dark:text-slate-100">Fasilitasi Akses Permodalan</div>
      <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Informasi pembiayaan, kemitraan, dan penguatan ekosistem usaha.</div>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
        <i class="fa fa-chalkboard-user"></i>
      </div>
      <div class="mt-4 font-bold text-slate-900 dark:text-slate-100">Pelatihan & Bimbingan Teknis</div>
      <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Pelatihan kewirausahaan, manajemen, pemasaran, dan peningkatan kualitas.</div>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
        <i class="fa fa-chart-line"></i>
      </div>
      <div class="mt-4 font-bold text-slate-900 dark:text-slate-100">Pemasaran & Digitalisasi</div>
      <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Promosi, perluasan pasar, event, kurasi produk, dan pendampingan digital.</div>
    </div>
    <div class="rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
        <i class="fa fa-scale-balanced"></i>
      </div>
      <div class="mt-4 font-bold text-slate-900 dark:text-slate-100">Monitoring & Evaluasi</div>
      <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Pendataan, pemantauan program, dan evaluasi kinerja layanan.</div>
    </div>
  </div>
</section>

<section id="program" class="max-w-7xl mx-auto px-4 py-12">
  <div class="rounded-3xl bg-white p-8 shadow dark:bg-slate-900">
    <div class="text-sm text-slate-500 dark:text-slate-400">Program</div>
    <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Fokus Program</h2>
    <div class="mt-6 grid md:grid-cols-2 gap-6">
      <div class="rounded-2xl border border-slate-200 p-6 dark:border-slate-800">
        <div class="font-bold text-slate-900 dark:text-slate-100">Penguatan Kelembagaan Koperasi</div>
        <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Peningkatan tata kelola, kepatuhan, serta penguatan layanan anggota.</div>
      </div>
      <div class="rounded-2xl border border-slate-200 p-6 dark:border-slate-800">
        <div class="font-bold text-slate-900 dark:text-slate-100">Peningkatan Daya Saing UMKM</div>
        <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Peningkatan kualitas produk, kemasan, branding, dan akses pasar.</div>
      </div>
      <div class="rounded-2xl border border-slate-200 p-6 dark:border-slate-800">
        <div class="font-bold text-slate-900 dark:text-slate-100">Akses Pembiayaan & Kemitraan</div>
        <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Fasilitasi kolaborasi dengan lembaga keuangan dan mitra usaha.</div>
      </div>
      <div class="rounded-2xl border border-slate-200 p-6 dark:border-slate-800">
        <div class="font-bold text-slate-900 dark:text-slate-100">Pelatihan Kewirausahaan</div>
        <div class="mt-2 text-sm text-slate-600 dark:text-slate-300">Peningkatan kompetensi pelaku usaha dan pendampingan berkelanjutan.</div>
      </div>
    </div>
  </div>
</section>

<section id="berita" class="max-w-7xl mx-auto px-4 py-12">
  <div class="flex items-end justify-between gap-6">
    <div>
      <div class="text-sm text-slate-500 dark:text-slate-400">Publikasi</div>
      <h2 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Berita & Kegiatan</h2>
    </div>
    <a href="{{ url('berita') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">Lihat Semua</a>
  </div>
  <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse(query()->index_limit('berita', 6) as $row)
      <a href="{{ $row->link }}" class="group rounded-3xl overflow-hidden bg-white shadow hover:shadow-lg transition dark:bg-slate-900">
        <div class="aspect-[16/9] bg-slate-100 dark:bg-slate-800">
          <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover">
        </div>
        <div class="p-5">
          <div class="text-xs text-slate-500 dark:text-slate-400">{{ $row->created_at?->translatedFormat('d F Y') ?? '' }}</div>
          <div class="mt-1 font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-2 dark:text-slate-100">{{ $row->title }}</div>
          <div class="mt-2 text-sm text-slate-600 line-clamp-2 dark:text-slate-300">{{ $row->description }}</div>
        </div>
      </a>
    @empty
      <div class="rounded-3xl bg-white p-6 shadow text-slate-600 dark:bg-slate-900 dark:text-slate-300">Belum ada berita.</div>
    @endforelse
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-12 pb-16">
  <div id="kontak" class="rounded-3xl bg-slate-900 text-white p-8 md:p-10">
    <div class="grid md:grid-cols-3 gap-6">
      <div class="md:col-span-2">
        <div class="text-sm text-slate-300">Kontak</div>
        <h2 class="mt-1 text-2xl font-bold">{{ get_option('nama') ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah' }}</h2>
        <div class="mt-4 text-slate-200 leading-relaxed">{{ get_option('deskripsi') ?? 'Gunakan informasi di bawah ini untuk menghubungi kami.' }}</div>
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
  </div>
</section>
