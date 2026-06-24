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
<footer class="border-t border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-950">
  <div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-4 gap-8">

@foreach(get_menu('footer')->take(3) as $row)
      <div>
        <div class="text-sm font-semibold text-slate-900 dark:text-slate-100 mb-4">{{ $row->name }}</div>
        <div class="space-y-3">
          @foreach ($row->sub as $sub )
            
          <a href="{{ $sub->url }}" class="flex items-center gap-3 text-sm text-slate-600 dark:hover:text-emerald-700 dark:text-slate-300">
            <i class="fa fa-arrow-right text-emerald-700 w-5"></i>
            <span>{{ $sub->name }}</span>
          </a>
          @endforeach
      
        </div>
      </div>
@endforeach
    <div>
      <img src="/stats.webp" alt="Stats" class="xl:w-full rounded-3xl">
    </div>
    
    </div>

    <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col md:flex-row gap-3 md:items-center md:justify-between text-sm text-slate-500 dark:border-slate-800 dark:text-slate-400">
      <div>&copy; {{get_option('tahun_pembuatan') ?? date('Y') }} {{ get_option('nama_organisasi') ?? 'Nama Instansi / Tim / Organisasi' }}.</div>
      <div class="flex items-center gap-4">
        Ikuti kami di :
        <a href="{{ get_option('facebook') ?? '#' }}" class="hover:text-emerald-700">Facebook</a>
        <a href="{{ get_option('instagram') ?? '#' }}" class="hover:text-emerald-700">Instagram</a>
        <a href="{{ get_option('youtube') ?? '#' }}" class="hover:text-emerald-700">YouTube</a>
      </div>
    </div>
  </div>
</footer>

<script>
  (() => {
    const getStoredTheme = () => {
      try {
        return localStorage.getItem('theme');
      } catch (e) {
        return null;
      }
    };

    const setStoredTheme = (value) => {
      try {
        localStorage.setItem('theme', value);
      } catch (e) {}
    };

    const applyThemeIcons = () => {
      const isDark = document.documentElement.classList.contains('dark');
      const icon = document.getElementById('theme-icon');
      const iconMobile = document.getElementById('theme-icon-mobile');
      if (icon) icon.className = isDark ? 'fa fa-sun' : 'fa fa-moon';
      if (iconMobile) iconMobile.className = isDark ? 'fa fa-sun' : 'fa fa-moon';
    };

    const applyTheme = (value) => {
      const isDark = value === 'dark';
      document.documentElement.classList.toggle('dark', isDark);
      document.body && document.body.classList.toggle('dark', isDark);
      applyThemeIcons();
    };

    const initTheme = () => {
      const stored = getStoredTheme();
      if (stored === 'dark' || stored === 'light') {
        applyTheme(stored);
        return;
      }
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      applyTheme(prefersDark ? 'dark' : 'light');
    };

    const bindToggle = (id) => {
      const el = document.getElementById(id);
      if (!el || el.dataset.themeBound === '1') return;
      el.dataset.themeBound = '1';
      el.addEventListener('click', () => {
        const next = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
        setStoredTheme(next);
        applyTheme(next);
      });
    };

    initTheme();
    bindToggle('theme-toggle');
    bindToggle('theme-toggle-mobile');

    window.addEventListener('storage', (e) => {
      if (e.key === 'theme' && (e.newValue === 'dark' || e.newValue === 'light')) {
        applyTheme(e.newValue);
      }
    });
  })();
</script>
</body>
</html>
