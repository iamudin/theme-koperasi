<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <div class="text-sm text-slate-500 dark:text-slate-400">Unduhan</div>
      <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $title ?? 'Arsip Unduhan' }}</h1>

      @php
        $categories = query()->index_category($module->name);
      @endphp
      @if(count($categories) > 0)
      <div class="mt-6 flex flex-wrap gap-2">
        <a href="{{ url($module->name) }}" class="px-4 py-2 rounded-full text-sm font-medium transition bg-emerald-600 text-white">Semua</a>
        @foreach($categories as $cat)
          <a href="{{ url($module->name . '/category/' . $cat->slug) }}" class="px-4 py-2 rounded-full text-sm font-medium transition bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">{{ $cat->name }} ({{ $cat->posts_count }})</a>
        @endforeach
      </div>
      @endif

      <div class="mt-6 space-y-4">
        @foreach($index as $row)
          <a href="{{ url($row->url) }}" class="group rounded-3xl bg-white p-5 shadow hover:shadow-lg transition block dark:bg-slate-900">
            <div class="flex gap-4 items-start">
              <div class="flex-shrink-0 h-16 w-16 rounded-2xl bg-gradient-to-br from-emerald-100 to-emerald-200 dark:from-emerald-900/50 dark:to-slate-800 flex items-center justify-center">
                <i class="fa fa-download text-2xl text-emerald-600 dark:text-emerald-400"></i>
              </div>
              <div class="min-w-0 flex-1">
                <div class="text-xs text-slate-500 dark:text-slate-400">{{ $row->created ?? '' }}</div>
                <div class="mt-1 text-lg font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-2 dark:text-slate-100">{{ $row->title }}</div>
                <div class="mt-2 text-sm text-slate-600 line-clamp-2 dark:text-slate-300">{{ $row->short_content ?? $row->description }}</div>
              </div>
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
