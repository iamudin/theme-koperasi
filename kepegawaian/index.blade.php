<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="text-sm text-slate-500 dark:text-slate-400">{{ $module->title ?? '' }}</div>
  <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-slate-100">Daftar {{ $module->title }}</h1>

  @php
   $index = query()->index_sort('kepegawaian');
  @endphp

  @if($row = $index->first())
    <div class="mt-6">
      <div class="text-sm font-semibold text-emerald-700 mb-4">Pimpinan</div>
      <div class="grid sm:grid-cols-1 gap-6">
          <div class="group rounded-3xl overflow-hidden bg-white shadow hover:shadow-lg transition dark:bg-slate-900 flex flex-col sm:flex-row items-center gap-6 p-6">
            <div class="aspect-square w-full sm:w-48 rounded-2xl bg-slate-100 dark:bg-slate-800 overflow-hidden flex-shrink-0 border-4 border-emerald-100 dark:border-emerald-900/30">
              <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover">
            </div>
            <div class="flex-1">
              <div class="text-sm font-semibold text-emerald-700">{{ $row->field->jabatan ?? 'Jabatan Pimpinan' }}</div>
              <div class="mt-1 text-xl font-bold text-slate-900 group-hover:text-emerald-700 dark:text-slate-100">{{ $row->title }}</div>
           
            </div>
          </div>
      </div>
    </div>
    @endif

 
    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($index->skip(1) as $row)
        <div class="group rounded-3xl overflow-hidden bg-white shadow hover:shadow-lg transition dark:bg-slate-900">
          <div class="aspect-[4/3] bg-slate-100 dark:bg-slate-800">
            <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" class="h-full w-full object-cover group-hover:scale-105 transition duration-300">
          </div>
          <div class="p-5">
            <div class="mt-1 font-bold text-slate-900 group-hover:text-emerald-700 line-clamp-1 dark:text-slate-100">{{ $row->title }}</div>
            <div class="mt-1 text-sm text-emerald-700 font-medium">{{ $row->field?->jabatan ?? 'Jabatan' }}</div>
          </div>
</div>
      @endforeach
    </div>

</section>
