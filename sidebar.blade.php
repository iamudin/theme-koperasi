<aside class="space-y-6">
  <div class="rounded-3xl bg-white p-5 shadow dark:bg-slate-900">
    <div class="text-sm font-semibold text-slate-900 dark:text-slate-100">Pencarian</div>
    <form action="{{ url('search') }}" method="post" class="mt-4 flex gap-2">
      @csrf
      <input name="keyword" type="text" class="w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100" placeholder="Cari berita, program, layanan">
      <button type="submit" class="rounded-2xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800 dark:bg-emerald-400 dark:text-slate-950 dark:hover:bg-emerald-300">
        <i class="fa fa-magnifying-glass"></i>
      </button>
    </form>
  </div>

  <div class="rounded-3xl bg-white p-5 shadow dark:bg-slate-900">
    <div class="text-sm font-semibold text-slate-900 dark:text-slate-100">Berita Terbaru</div>
    <div class="mt-4 space-y-4">
      @foreach(query()->index_limit('berita', 5) as $row)
        <a href="{{ $row->link }}" class="group flex gap-3">
          <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-16 w-24 rounded-2xl object-cover bg-slate-100 dark:bg-slate-800">
          <div class="min-w-0">
            <div class="text-xs text-slate-500 dark:text-slate-400">{{ $row->created_at?->translatedFormat('d M Y') ?? '' }}</div>
            <div class="mt-1 text-sm font-semibold text-slate-900 group-hover:text-emerald-700 line-clamp-2 dark:text-slate-100">{{ $row->title }}</div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</aside>
