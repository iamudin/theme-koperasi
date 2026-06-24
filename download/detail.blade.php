<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <article class="lg:col-span-2 rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <nav class="text-sm text-slate-500 dark:text-slate-400">
        <a href="{{ url('/') }}" class="hover:text-emerald-700">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ url($module->name) }}" class="hover:text-emerald-700">{{ $module->title }}</a>
        <span class="mx-2">/</span>
        <span class="text-slate-700 dark:text-slate-200">{{ $category->name ?? 'Uncategorized' }}</span>
      </nav>

      <h1 class="mt-4 text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $detail->title }}</h1>
      <div class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ $detail->created ?? '' }}</div>

      <div class="prose max-w-none mt-6 dark:prose-invert">
        {!! $detail->content !!}
      </div>

      @if($detail->data_field['file'] ?? null)
      <div class="mt-8 p-6 rounded-2xl border-2 border-dashed border-emerald-200 bg-emerald-50 dark:border-emerald-800 dark:bg-emerald-900/20">
        <div class="flex items-center gap-4 flex-wrap">
          <div class="h-12 w-12 rounded-xl bg-emerald-600 flex items-center justify-center">
            <i class="fa fa-file text-white text-xl"></i>
          </div>
          <div class="flex-1 min-w-0">
            <div class="font-semibold text-slate-900 dark:text-white">Unduh File</div>
            <div class="text-sm text-slate-600 dark:text-slate-300 truncate">{{ basename($detail->data_field['file']) }}</div>
          </div>
          <a href="{{ $detail->data_field['file'] }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">
            <i class="fa fa-download"></i>
            Download
          </a>
        </div>
      </div>
      @endif
 
      <div class="mt-6 flex">
           Bagikan &nbsp;
        {{ $detail->share_to }}
      </div>
    </article>

    <div>
      {{ get_element('sidebar') }}
    </div>
  </div>
</section>
