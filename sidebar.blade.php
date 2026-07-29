<aside class="space-y-8 sticky top-[100px]">
  {{ get_element('sidebar-banner') }}
  <div class="rounded-3xl bg-white p-5 shadow dark:bg-slate-900">
    <div class="text-sm font-semibold text-slate-900 dark:text-slate-100"> <i class="fa fa-rss"></i> Berita Terbaru</div>
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
