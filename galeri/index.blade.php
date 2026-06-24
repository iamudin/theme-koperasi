<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <div class="text-sm text-slate-500 dark:text-slate-400">Galeri</div>
      <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $title ?? 'Galeri' }}</h1>

      @php
        $categories = query()->categories($module->name);
      @endphp
      @if(count($categories) > 0)
      <div class="mt-6 flex flex-wrap gap-2">
        <a href="{{ url($module->name) }}" class="px-4 py-2 rounded-full text-sm font-medium transition bg-emerald-600 text-white">Semua</a>
        @foreach($categories as $cat)
          <a href="{{ url($module->name . '/category/' . $cat->slug) }}" class="px-4 py-2 rounded-full text-sm font-medium transition bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">{{ $cat->name }}</a>
        @endforeach
      </div>
      @endif

      <div class="mt-6 grid sm:grid-cols-2 gap-6">
        @foreach($index as $row)
          <a href="{{ url($row->url) }}" class="group rounded-3xl overflow-hidden shadow hover:shadow-lg transition block">
            <div class="relative aspect-[4/3]">
              <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-105 transition duration-300 bg-slate-100 dark:bg-slate-800">
              <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
              @if(!empty($row->data_field['link_video']))
                <div class="absolute top-4 left-4 w-12 h-12 rounded-full bg-white/90 flex items-center justify-center shadow-lg">
                  <i class="fa fa-play text-emerald-600 text-xl ml-1"></i>
                </div>
              @endif
              <div class="absolute bottom-0 left-0 right-0 p-5">
                <div class="text-xs text-slate-200">{{ $row->created ?? '' }}</div>
                <div class="text-lg font-bold text-white line-clamp-2">{{ $row->title }}</div>
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
