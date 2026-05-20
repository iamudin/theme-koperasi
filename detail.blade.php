<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <article class="lg:col-span-2 rounded-3xl bg-white p-6 shadow dark:bg-slate-900">
      <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $detail->title ?? '' }}</h1>
      <div class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ $detail->created ?? '' }}</div>

      @if(!empty($detail?->thumbnail))
        <img src="{{ $detail->thumbnail }}" alt="{{ $detail->title ?? '' }}" class="mt-6 w-full rounded-3xl object-cover bg-slate-100 dark:bg-slate-800">
      @endif

      <div class="prose max-w-none mt-6 dark:prose-invert">
        {!! $detail->content ?? '' !!}
      </div>

      <div class="mt-6">
        {{ share_button() }}
      </div>
    </article>

    <div>
      {{ get_element('sidebar') }}
    </div>
  </div>
</section>
