<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="grid lg:grid-cols-3 gap-8">
    <article class="lg:col-span-2">
      <nav class="text-sm text-slate-500 dark:text-slate-400 mb-6">
        <a href="{{ url('/') }}" class="hover:text-emerald-700">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ url($module->name) }}" class="hover:text-emerald-700">{{ $module->title }}</a>
        <span class="mx-2">/</span>
        <span class="text-slate-700 dark:text-slate-200">{{ $detail->title }}</span>
      </nav>

      <div class="rounded-3xl bg-white shadow dark:bg-slate-900 p-6 md:p-8">
        <div class="flex flex-col md:flex-row gap-8 items-start">
          <div class="w-full md:w-72 flex-shrink-0">
            <div class="aspect-square rounded-3xl bg-slate-100 dark:bg-slate-800 overflow-hidden border-4 border-emerald-100 dark:border-emerald-900/30">
              <img src="{{ $detail->thumbnail }}" alt="{{ $detail->title }}" class="h-full w-full object-cover">
            </div>
            <div class="mt-6 flex flex-wrap gap-3 justify-center md:justify-start">
              @if(!empty($detail->data_field['facebook']))
                <a href="{{ $detail->data_field['facebook'] }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-700 hover:text-white flex items-center justify-center transition">
                  <i class="fa-brands fa-facebook-f"></i>
                </a>
              @endif
              @if(!empty($detail->data_field['instagram']))
                <a href="{{ $detail->data_field['instagram'] }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-pink-600 text-slate-700 hover:text-white flex items-center justify-center transition">
                  <i class="fa-brands fa-instagram"></i>
                </a>
              @endif
              @if(!empty($detail->data_field['twitter']))
                <a href="{{ $detail->data_field['twitter'] }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-900 text-slate-700 hover:text-white flex items-center justify-center transition">
                  <i class="fa-brands fa-x-twitter"></i>
                </a>
              @endif
              @if(!empty($detail->data_field['linkedin']))
                <a href="{{ $detail->data_field['linkedin'] }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-blue-700 text-slate-700 hover:text-white flex items-center justify-center transition">
                  <i class="fa-brands fa-linkedin-in"></i>
                </a>
              @endif
              @if(!empty($detail->data_field['email']))
                <a href="mailto:{{ $detail->data_field['email'] }}" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-emerald-600 text-slate-700 hover:text-white flex items-center justify-center transition">
                  <i class="fa fa-envelope"></i>
                </a>
              @endif
            </div>
          </div>
          <div class="flex-1">
            <div class="text-sm font-semibold text-emerald-700">{{ $detail->description ?? 'Jabatan' }}</div>
            <h1 class="mt-1 text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $detail->title }}</h1>
            
            <div class="prose max-w-none mt-6 dark:prose-invert">
              {!! $detail->content !!}
            </div>

            <div class="mt-8">
              {{ share_button() }}
            </div>
          </div>
        </div>
      </div>
    </article>

    <div>
      {{ get_element('sidebar') }}
    </div>
  </div>
</section>
