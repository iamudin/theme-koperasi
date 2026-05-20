<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <nav class="text-sm text-slate-500 dark:text-slate-400">
        <a href="{{ url('/') }}" class="hover:text-emerald-700">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ url($module->name) }}" class="hover:text-emerald-700">{{ $module->title }}</a>
        <span class="mx-2">/</span>
        <span class="text-slate-700 dark:text-slate-200">{{ $category->name ?? '' }}</span>
      </nav>

      <h1 class="mt-4 text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $category->name ?? 'Kategori' }}</h1>

      <div class="mt-6 grid sm:grid-cols-2 gap-6">
        @foreach($index as $row)
          <a href="{{ url($row->url) }}" class="group rounded-3xl overflow-hidden bg-white shadow hover:shadow-lg transition dark:bg-slate-900">
            <div class="aspect-[16/9] bg-slate-100 dark:bg-slate-800">
              <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover">
            </div>
            <div class="p-5">
              <div class="text-xs text-slate-500 dark:text-slate-400">{{ $row->created ?? '' }}</div>
              <div class="mt-1 font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-2 dark:text-slate-100">{{ $row->title }}</div>
              <div class="mt-2 text-sm text-slate-600 line-clamp-2 dark:text-slate-300">{{ $row->short_content ?? $row->description }}</div>
            </div>
          </a>
        @endforeach
      </div>

      @if(method_exists($index, 'links'))
        <div class="mt-8">{{ $index->links() }}</div>
      @endif
    </div>

    <div>
      {{ get_element('sidebar') }}
    </div>
  </div>
</section>
