<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <div class="text-sm text-slate-500 dark:text-slate-400">Hasil Pencarian</div>
      <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $keyword ?? '' }}</h1>

      <div class="mt-6 space-y-4">
        @forelse($index ?? [] as $row)
          <a href="{{ url($row->url) }}" class="group rounded-3xl bg-white p-5 shadow hover:shadow-lg transition block dark:bg-slate-900">
            <div class="flex gap-4">
              <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-24 w-36 rounded-2xl object-cover bg-slate-100 dark:bg-slate-800">
              <div class="min-w-0">
                <div class="text-xs text-slate-500 dark:text-slate-400">{{ $row->created ?? '' }}</div>
                <div class="mt-1 text-lg font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-2 dark:text-slate-100">{{ $row->title }}</div>
                <div class="mt-2 text-sm text-slate-600 line-clamp-2 dark:text-slate-300">{{ $row->description }}</div>
              </div>
            </div>
          </a>
        @empty
          <div class="rounded-3xl bg-white p-6 shadow text-slate-600 dark:bg-slate-900 dark:text-slate-300">Tidak ada hasil.</div>
        @endforelse
      </div>

      @if(isset($index) && method_exists($index, 'links'))
        <div class="mt-6">{{ $index->links() }}</div>
      @endif
    </div>

    <div>
      {{ get_element('sidebar') }}
    </div>
  </div>
</section>
