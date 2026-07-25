<section class="max-w-7xl mx-auto px-4 py-10">
  <div>
    <div class="text-sm font-medium text-emerald-600 dark:text-emerald-500 mb-1 flex items-center gap-2">
      <span class="flex h-6 w-6 items-center justify-center rounded-md bg-emerald-50 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400">
        <i class="fa fa-desktop text-[10px]"></i>
      </span>
      {{ $module->title ?? 'Pelayanan' }}
    </div>
    <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Daftar {{ $module->title ?? 'Layanan' }}</h1>
  </div>

  <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
    @forelse($index as $row)
      <a href="{{ $row->link ?? url($row->url ?? '') }}" class="group flex items-center gap-4 rounded-3xl bg-white p-4 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] ring-1 ring-slate-100 hover:ring-emerald-200 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 dark:bg-slate-900 dark:ring-slate-800/80 dark:hover:ring-emerald-900/50">
        <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-2xl bg-slate-100 dark:bg-slate-800">
          <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}"
            class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>
        <div class="flex-1 min-w-0">
          <h3 class="font-bold text-slate-900 dark:text-slate-100 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors text-base truncate">{{ $row->title }}</h3>
          <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 line-clamp-2">{{ $row->description ?? $row->short_content }}</p>
        </div>
      </a>
    @empty
      <div class="col-span-full rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:ring-slate-800 text-center">
        <div class="text-lg font-medium text-slate-500 dark:text-slate-400">Belum ada data {{ $module->title ?? 'Layanan' }} saat ini.</div>
      </div>
    @endforelse
  </div>

  @if(method_exists($index, 'links'))
    <div class="mt-8">
      {{ $index->links() }}
    </div>
  @endif
</section>
