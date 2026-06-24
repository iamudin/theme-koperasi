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

      <img src="{{ $detail->thumbnail }}" alt="{{ $detail->title }}" class="mt-6 w-full rounded-3xl object-cover bg-slate-100 dark:bg-slate-800">

      <div class="prose max-w-none mt-6 dark:prose-invert">
        {!! $detail->content !!}
      </div>

      <div class="mt-6 flex"> Bagikan &nbsp;
        {{ $detail->share_to}}
      </div>
    </article>

    <div>
      {{ get_element('sidebar') }}
    </div>
  </div>
</section>
