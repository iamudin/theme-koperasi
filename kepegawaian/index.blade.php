<section class="max-w-7xl mx-auto px-4 py-12">
  <div class="mb-12 text-center max-w-3xl mx-auto">
    <div class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 text-sm font-medium mb-4 ring-1 ring-emerald-500/20">
      <i class="fa fa-users text-xs"></i>
      <span>{{ $module->title ?? 'Kepegawaian' }}</span>
    </div>
    <h1 class="text-3xl md:text-5xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Daftar {{ $module->title }}</h1>
    <p class="mt-4 text-slate-500 dark:text-slate-400 md:text-lg">Susunan kepegawaian dan struktur organisasi kami yang berdedikasi untuk memberikan pelayanan terbaik.</p>
  </div>

  @php
   $index = query()->index_sort('kepegawaian');
  @endphp

  @if($row = $index->first())
    <div class="mb-16">
      <div class="flex items-center gap-4 mb-8">
        <div class="h-px bg-slate-200 dark:bg-slate-800 flex-1"></div>
        <div class="text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest bg-slate-50 dark:bg-slate-800/50 px-4 py-1 rounded-full border border-slate-200 dark:border-slate-700">Pimpinan</div>
        <div class="h-px bg-slate-200 dark:bg-slate-800 flex-1"></div>
      </div>
      
      <div class="max-w-4xl mx-auto">
        <div class="group relative rounded-[2.5rem] bg-white dark:bg-slate-900 p-3 md:p-4 shadow-[0_8px_30px_rgb(0,0,0,0.04)] ring-1 ring-slate-100 dark:ring-slate-800 flex flex-col md:flex-row items-center gap-6 md:gap-10 hover:shadow-2xl hover:ring-emerald-200 dark:hover:ring-emerald-900/50 transition-all duration-500">
          <div class="aspect-[3/4] w-full md:w-72 rounded-[2rem] bg-slate-100 dark:bg-slate-800 overflow-hidden relative shrink-0">
            <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          </div>
          <div class="flex-1 text-center md:text-left py-4 md:py-0 pr-0 md:pr-10 w-full">
            <div class="inline-block px-4 py-1.5 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-sm font-bold mb-4 border border-emerald-100 dark:border-emerald-800/50">
              {{ $row->field->jabatan ?? 'Jabatan Pimpinan' }}
            </div>
            <div class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100 mb-3 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">{{ $row->title }}</div>
            @if(!empty($row->description))
              <p class="text-slate-500 dark:text-slate-400 line-clamp-2 md:line-clamp-3 mb-6">{{ $row->description }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endif

  @if($index->count() > 1)
    <div class="flex items-center gap-4 mb-8">
      <div class="h-px bg-slate-200 dark:bg-slate-800 flex-1"></div>
      <div class="text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest bg-slate-50 dark:bg-slate-800/50 px-4 py-1 rounded-full border border-slate-200 dark:border-slate-700">Staf & Jajaran</div>
      <div class="h-px bg-slate-200 dark:bg-slate-800 flex-1"></div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
      @foreach($index->skip(1) as $row)
        <div class="group h-full relative rounded-[2rem] bg-white dark:bg-slate-900 p-2 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] ring-1 ring-slate-100 hover:ring-emerald-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 dark:ring-slate-800/80 dark:hover:ring-emerald-900/50 flex flex-col">
          <div class="aspect-[3/4] w-full overflow-hidden rounded-[1.5rem] bg-slate-100 dark:bg-slate-800 relative">
            <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          </div>
          <div class="p-4 text-center flex-1 flex flex-col justify-center">
            <h3 class="font-bold text-slate-900 dark:text-slate-100 text-sm md:text-base line-clamp-1 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">{{ $row->title }}</h3>
            <p class="text-[11px] md:text-xs text-slate-500 dark:text-slate-400 mt-2 font-medium px-2.5 py-1 bg-slate-50 dark:bg-slate-800/50 rounded-lg inline-block mx-auto border border-slate-100 dark:border-slate-800">{{ $row->field?->jabatan ?? 'Pegawai' }}</p>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</section>
