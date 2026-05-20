<footer class="border-t border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-950">
  <div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-3 gap-8">
      <div class="md:col-span-2">
        <div class="flex items-center gap-3">
          <img src="/logo.webp" alt="Logo" class="h-10 w-10 object-contain">
          <div>
            <div class="text-sm font-bold">{{ get_option('nama') ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah' }}</div>
            <div class="text-xs text-slate-500 dark:text-slate-400">{{ get_option('kabupaten') ?? 'Kabupaten Bengkalis' }}</div>
          </div>
        </div>
        <div class="mt-4 text-sm text-slate-600 leading-relaxed dark:text-slate-300">{{ get_option('deskripsi') ?? 'Portal informasi, layanan, dan publikasi kegiatan Dinas Koperasi dan Usaha Kecil dan Menengah.' }}</div>
      </div>

      <div id="kontak">
        <div class="text-sm font-semibold text-slate-900 dark:text-slate-100">Kontak</div>
        <div class="mt-4 space-y-2 text-sm text-slate-600 dark:text-slate-300">
          <div class="flex items-start gap-2">
            <i class="fa fa-location-dot mt-0.5 text-emerald-700"></i>
            <span>{{ get_option('alamat') ?? '-' }}</span>
          </div>
          <div class="flex items-start gap-2">
            <i class="fa fa-phone mt-0.5 text-emerald-700"></i>
            <span>{{ get_option('telepon') ?? '-' }}</span>
          </div>
          <div class="flex items-start gap-2">
            <i class="fa fa-envelope mt-0.5 text-emerald-700"></i>
            <span>{{ get_option('email') ?? '-' }}</span>
          </div>
          <div class="flex items-start gap-2">
            <i class="fa fa-clock mt-0.5 text-emerald-700"></i>
            <span>{{ get_option('jam_layanan') ?? 'Senin - Jumat, 08.00 - 16.00' }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col md:flex-row gap-3 md:items-center md:justify-between text-sm text-slate-500 dark:border-slate-800 dark:text-slate-400">
      <div>&copy; {{ date('Y') }} {{ get_option('nama') ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah' }}.</div>
      <div class="flex items-center gap-4">
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
