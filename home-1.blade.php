@php
  $siteName = get_option('kabupaten') ?? 'Kabupaten Bengkalis';
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bengkaliskab.go.id</title>
  <script>
    tailwind = window.tailwind || {};
    tailwind.config = { darkMode: 'class' };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    html, body { height: 100%; overflow: hidden; }
  </style>
</head>
<body class="min-h-screen overflow-hidden bg-slate-950 text-white">
  <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-emerald-950"></div>
  <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top,rgba(16,185,129,0.35),transparent_60%),radial-gradient(circle_at_bottom,rgba(59,130,246,0.25),transparent_55%)]"></div>

  <header class="relative z-10 border-b border-white/10 bg-white/5 backdrop-blur">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between gap-6">
      <div class="flex items-center gap-3 min-w-0">
        <div class="h-10 w-10 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center">
          <i class="fa fa-globe text-emerald-300"></i>
        </div>
        <div class="leading-tight min-w-0">
          <div class="text-xs text-white/70">Portal Resmi</div>
          <div class="text-sm font-black truncate">Bengkaliskab.go.id</div>
        </div>
      </div>
      <div class="hidden md:flex items-center gap-3">
        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-2">
          <div class="text-[10px] uppercase tracking-widest text-white/70">Jam Layanan</div>
          <div class="mt-1 text-xs font-semibold">{{ get_option('jam_layanan') ?? 'Senin - Jumat, 08.00 - 16.00' }}</div>
        </div>
      </div>
    </div>
  </header>

  <main class="relative z-10 max-w-7xl mx-auto px-4 py-10 md:py-12 h-[calc(100vh-4rem)] overflow-hidden">
    <div class="flex items-start justify-between gap-6">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-200">
          <i class="fa fa-landmark text-emerald-300"></i>
          <span>{{ $siteName }}</span>
        </div>
        <h1 class="mt-5 text-3xl md:text-5xl font-black tracking-tight text-white">Layanan Website Kabupaten Bengkalis</h1>
        <div class="mt-3 text-slate-200 leading-relaxed max-w-2xl">
          Akses layanan pemerintah, layanan masyarakat, serta informasi publik dalam satu portal.
        </div>
      </div>
    </div>

    <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <a href="#" class="group rounded-3xl border border-white/10 bg-white/5 p-7 backdrop-blur hover:bg-white/10 transition">
        <div class="flex items-center gap-5">
          <div class="h-16 w-16 rounded-3xl bg-emerald-400/15 text-emerald-200 flex items-center justify-center">
            <i class="fa fa-landmark text-3xl"></i>
          </div>
          <div class="min-w-0">
            <div class="text-xs uppercase tracking-widest text-white/70">Kategori</div>
            <div class="mt-1 text-xl font-black text-white">Layanan Pemerintah</div>
            <div class="mt-1 text-sm text-white/70 line-clamp-2">Perizinan, pengadaan, kepegawaian, e-office, aplikasi daerah, dan layanan SPBE.</div>
          </div>
        </div>
      </a>

      <a href="#" class="group rounded-3xl border border-white/10 bg-white/5 p-7 backdrop-blur hover:bg-white/10 transition">
        <div class="flex items-center gap-5">
          <div class="h-16 w-16 rounded-3xl bg-sky-400/15 text-sky-200 flex items-center justify-center">
            <i class="fa fa-people-group text-3xl"></i>
          </div>
          <div class="min-w-0">
            <div class="text-xs uppercase tracking-widest text-white/70">Kategori</div>
            <div class="mt-1 text-xl font-black text-white">Masyarakat</div>
            <div class="mt-1 text-sm text-white/70 line-clamp-2">Pengaduan, pelaporan, layanan kesehatan, pendidikan, bansos, pajak & retribusi.</div>
          </div>
        </div>
      </a>

      <a href="#" class="group rounded-3xl border border-white/10 bg-white/5 p-7 backdrop-blur hover:bg-white/10 transition">
        <div class="flex items-center gap-5">
          <div class="h-16 w-16 rounded-3xl bg-amber-400/15 text-amber-200 flex items-center justify-center">
            <i class="fa fa-circle-info text-3xl"></i>
          </div>
          <div class="min-w-0">
            <div class="text-xs uppercase tracking-widest text-white/70">Kategori</div>
            <div class="mt-1 text-xl font-black text-white">Informasi Publik</div>
            <div class="mt-1 text-sm text-white/70 line-clamp-2">PPID, transparansi, berita, pengumuman, dokumen, dan data statistik.</div>
          </div>
        </div>
      </a>
    </div>

    <div class="mt-8 flex items-center justify-between gap-4 text-xs text-white/70">
      <div>Gunakan menu di atas untuk mengakses layanan.</div>
      <div class="hidden sm:block">{{ url('/') }}</div>
    </div>
  </main>

  <footer class="relative z-10 border-t border-white/10 bg-white/5 backdrop-blur">
    <div class="max-w-7xl mx-auto px-4 h-14 flex items-center justify-between text-xs text-white/70">
      <div>&copy; {{ date('Y') }} {{ $siteName }}</div>
      <div class="hidden sm:block">Portal Bengkaliskab.go.id</div>
    </div>
  </footer>
</body>
</html>
