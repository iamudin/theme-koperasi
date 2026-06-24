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

      @php
        $categories = query()->categories($module->name);
      @endphp
      @if(count($categories) > 0)
      <div class="mt-6 flex flex-wrap gap-2">
        <a href="{{ url($module->name) }}" class="px-4 py-2 rounded-full text-sm font-medium transition bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">Semua</a>
        @foreach($categories as $cat)
          <a href="{{ url($module->name . '/category/' . $cat->slug) }}" class="px-4 py-2 rounded-full text-sm font-medium transition {{ ($cat->id == $category->id) ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700' }}">{{ $cat->name }}</a>
        @endforeach
      </div>
      @endif

      <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($index as $row)
          <a href="{{ url($row->url) }}" class="group rounded-3xl overflow-hidden bg-white shadow hover:shadow-lg transition dark:bg-slate-900">
            <div class="aspect-[4/3] bg-slate-100 dark:bg-slate-800">
              <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-105 transition duration-300">
            </div>
            <div class="p-5">
              <div class="mt-1 font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-1 dark:text-slate-100">{{ $row->title }}</div>
              <div class="mt-1 text-sm text-emerald-700 font-medium">{{ $row->description ?? 'Jabatan' }}</div>
              <div class="mt-2 text-sm text-slate-600 line-clamp-2 dark:text-slate-300">{{ $row->short_content ?? str(strip_tags($row->content))->limit(80) }}</div>
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
