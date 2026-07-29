@php
  $bannerSidebars = get_banner('sidebar', 5);
@endphp

<div class="rounded-3xl bg-white shadow overflow-hidden dark:bg-slate-900 relative">
  @if($bannerSidebars && count($bannerSidebars) > 0)
    <div id="sidebarBannerSlider" class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden w-full">
      @foreach($bannerSidebars as $banner)
        <div class="w-full shrink-0 snap-start relative">
          @if(!empty($banner->link))
            <a href="{{ $banner->link }}" class="block w-full">
          @else
            <div class="w-full block">
          @endif

            @if(!empty($banner->image))
              <img src="{{ $banner->image }}" alt="Banner" class="w-full h-auto">
            @else
              <div class="aspect-[4/3] w-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                <div class="text-center px-6">
                  <div class="text-xs tracking-widest uppercase text-slate-500 dark:text-slate-400">Banner</div>
                  <div class="mt-2 text-sm font-bold text-slate-900 dark:text-slate-100">Info Penting</div>
                </div>
              </div>
            @endif

          @if(!empty($banner->link))
            </a>
          @else
            </div>
          @endif
        </div>
      @endforeach
    </div>

    @if(count($bannerSidebars) > 1)
      <button id="prevSidebarBanner" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/80 hover:bg-white text-slate-800 flex items-center justify-center shadow transition backdrop-blur z-10"><i class="fa fa-chevron-left text-xs"></i></button>
      <button id="nextSidebarBanner" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/80 hover:bg-white text-slate-800 flex items-center justify-center shadow transition backdrop-blur z-10"><i class="fa fa-chevron-right text-xs"></i></button>
      
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const sSlider = document.getElementById('sidebarBannerSlider');
          const sPrev = document.getElementById('prevSidebarBanner');
          const sNext = document.getElementById('nextSidebarBanner');
          let sInterval;

          if (sSlider && sPrev && sNext) {
            const scrollSidebarNext = () => {
              if (sSlider.scrollLeft + sSlider.clientWidth >= sSlider.scrollWidth - 10) {
                sSlider.scrollTo({ left: 0, behavior: 'smooth' });
              } else {
                sSlider.scrollBy({ left: sSlider.offsetWidth, behavior: 'smooth' });
              }
            };

            sPrev.addEventListener('click', () => {
              if (sSlider.scrollLeft <= 0) {
                sSlider.scrollTo({ left: sSlider.scrollWidth, behavior: 'smooth' });
              } else {
                sSlider.scrollBy({ left: -sSlider.offsetWidth, behavior: 'smooth' });
              }
            });
            
            sNext.addEventListener('click', scrollSidebarNext);

            // Auto slide
            sInterval = setInterval(scrollSidebarNext, 5000);
            
            sSlider.parentElement.addEventListener('mouseenter', () => clearInterval(sInterval));
            sSlider.parentElement.addEventListener('mouseleave', () => {
              sInterval = setInterval(scrollSidebarNext, 5000);
            });
          }
        });
      </script>
    @endif
  @else
    <div class="w-full bg-slate-100 dark:bg-slate-800">
      <div class="aspect-[4/3] w-full flex items-center justify-center">
        <div class="text-center px-6">
          <div class="text-xs tracking-widest uppercase text-slate-500 dark:text-slate-400">Banner</div>
          <div class="mt-2 text-sm font-bold text-slate-900 dark:text-slate-100">Info Penting</div>
        </div>
      </div>
    </div>
  @endif
</div>
