<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ get_option('nama') ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah' }}</title>
  <script>
    tailwind = window.tailwind || {};
    tailwind.config = {
      darkMode: 'class'
    };
    (() => {
      let stored = null;
      try {
        stored = localStorage.getItem('theme');
      } catch (e) {}
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      const isDark = stored === 'dark' || (!stored && prefersDark);
      document.documentElement.classList.toggle('dark', isDark);
    })();
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
  <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur dark:border-slate-800 dark:bg-slate-950/90">
    <div class="max-w-7xl mx-auto px-4">
      @php
        $headerMenu = get_menu('header');
      @endphp
      <div class="h-16 flex items-center justify-between gap-6">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
          <img src="/logo.webp" alt="Logo" class="h-10 w-10 object-contain">
          <div class="leading-tight">
            <div class="text-xs text-slate-500 dark:text-slate-400">{{ get_option('kabupaten') ?? 'Kabupaten Bengkalis' }}</div>
            <div class="text-sm font-bold">{{ get_option('nama') ?? 'Dinas Koperasi dan Usaha Kecil dan Menengah' }}</div>
          </div>
        </a>

        <nav class="hidden md:flex items-center gap-5 text-sm">
          <a href="{{ url('/') }}" class="text-slate-700 hover:text-emerald-700 dark:text-slate-200 dark:hover:text-emerald-300">Beranda</a>
          @foreach($headerMenu as $menu)
            @php $sub1 = data_get($menu, 'sub'); @endphp
            @if(!empty($sub1))
              <div class="relative group">
                <button type="button" class="inline-flex items-center gap-2 text-slate-700 hover:text-emerald-700 dark:text-slate-200 dark:hover:text-emerald-300">
                  <span>{{ data_get($menu, 'name') }}</span>
                  <i class="fa fa-chevron-down text-xs"></i>
                </button>
                <div class="hidden group-hover:block absolute left-0 top-full mt-2 w-72 rounded-2xl border border-slate-200 bg-white shadow-lg overflow-hidden dark:border-slate-800 dark:bg-slate-950">
                  @foreach($sub1 as $submenu)
                    @php $sub2 = data_get($submenu, 'sub'); @endphp
                    @if(!empty($sub2))
                      <div class="relative group/submenu">
                        <a href="{{ data_get($submenu, 'url', '#') }}" class="flex items-center justify-between gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 dark:text-slate-200 dark:hover:bg-slate-900 dark:hover:text-emerald-300">
                          <span>{{ data_get($submenu, 'name') }}</span>
                          <i class="fa fa-chevron-right text-xs"></i>
                        </a>
                        <div class="hidden group-hover/submenu:block absolute left-full top-0 ml-2 w-72 rounded-2xl border border-slate-200 bg-white shadow-lg overflow-hidden dark:border-slate-800 dark:bg-slate-950">
                          @foreach($sub2 as $submenu2)
                            <a href="{{ data_get($submenu2, 'url', '#') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 dark:text-slate-200 dark:hover:bg-slate-900 dark:hover:text-emerald-300">{{ data_get($submenu2, 'name') }}</a>
                          @endforeach
                        </div>
                      </div>
                    @else
                      <a href="{{ data_get($submenu, 'url', '#') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 dark:text-slate-200 dark:hover:bg-slate-900 dark:hover:text-emerald-300">{{ data_get($submenu, 'name') }}</a>
                    @endif
                  @endforeach
                </div>
              </div>
            @else
              <a href="{{ data_get($menu, 'url', '#') }}" class="text-slate-700 hover:text-emerald-700 dark:text-slate-200 dark:hover:text-emerald-300">{{ data_get($menu, 'name') }}</a>
            @endif
          @endforeach
          <button id="theme-toggle" type="button" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-700 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
            <i class="fa fa-moon" id="theme-icon"></i>
            <span class="hidden lg:inline">Mode</span>
          </button>
          <a href="#kontak" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2 text-white hover:bg-slate-800 dark:bg-emerald-400 dark:text-slate-950 dark:hover:bg-emerald-300">
            <i class="fa fa-phone text-xs"></i>
            <span>Kontak</span>
          </a>
        </nav>

        <div class="md:hidden flex items-center gap-2">
          <button id="theme-toggle-mobile" type="button" class="inline-flex items-center justify-center h-10 w-10 rounded-xl border border-slate-200 bg-white text-slate-700 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200">
            <i class="fa fa-moon" id="theme-icon-mobile"></i>
          </button>
          <button id="mobile-menu-toggle" type="button" class="inline-flex items-center justify-center h-10 w-10 rounded-xl border border-slate-200 bg-white text-slate-700 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200">
          <i class="fa fa-bars"></i>
          </button>
        </div>
      </div>

      <div id="mobile-menu" class="md:hidden hidden pb-4">
        <div class="flex flex-col gap-2 text-sm">
          <a href="{{ url('/') }}" class="rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">Beranda</a>
          @foreach($headerMenu as $m1)
            @php $m1Sub = data_get($m1, 'sub'); @endphp
            @if(!empty($m1Sub))
              @php $m1Id = 'm1-' . $loop->index; @endphp
              <button type="button" data-menu-toggle="{{ $m1Id }}" class="w-full rounded-xl px-3 py-2 text-left text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800 flex items-center justify-between">
                <span>{{ data_get($m1, 'name') }}</span>
                <i class="fa fa-chevron-down text-xs"></i>
              </button>
              <div id="{{ $m1Id }}" class="hidden pl-3">
                <div class="mt-1 flex flex-col gap-1">
                  @foreach($m1Sub as $m2)
                    @php $m2Sub = data_get($m2, 'sub'); @endphp
                    @if(!empty($m2Sub))
                      @php $m2Id = $m1Id . '-m2-' . $loop->index; @endphp
                      <button type="button" data-menu-toggle="{{ $m2Id }}" class="w-full rounded-xl px-3 py-2 text-left text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800 flex items-center justify-between">
                        <span>{{ data_get($m2, 'name') }}</span>
                        <i class="fa fa-chevron-down text-xs"></i>
                      </button>
                      <div id="{{ $m2Id }}" class="hidden pl-3">
                        <div class="mt-1 flex flex-col gap-1">
                          @foreach($m2Sub as $m3)
                            <a href="{{ data_get($m3, 'url', '#') }}" class="rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">{{ data_get($m3, 'name') }}</a>
                          @endforeach
                        </div>
                      </div>
                    @else
                      <a href="{{ data_get($m2, 'url', '#') }}" class="rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">{{ data_get($m2, 'name') }}</a>
                    @endif
                  @endforeach
                </div>
              </div>
            @else
              <a href="{{ data_get($m1, 'url', '#') }}" class="rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">{{ data_get($m1, 'name') }}</a>
            @endif
          @endforeach
          <a href="#kontak" class="rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">Kontak</a>
          <a href="{{ url('search') }}" class="rounded-xl px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">Pencarian</a>
        </div>
      </div>
    </div>
  </header>
       	<script>
tailwind.config = {
  darkMode: 'class'
}
</script>
  <script>
    const toggleButton = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    if (toggleButton && mobileMenu) {
      toggleButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    }
    document.querySelectorAll('[data-menu-toggle]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-menu-toggle');
        const target = id ? document.getElementById(id) : null;
        if (!target) return;
        target.classList.toggle('hidden');
      });
    });
  </script>
