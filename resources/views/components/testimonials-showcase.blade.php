@props(['testimonials'])

<section id="testimonials-showcase" class="testimonials-showcase relative py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <div class="testimonials-showcase__orb testimonials-showcase__orb--1"></div>
        <div class="testimonials-showcase__orb testimonials-showcase__orb--2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="testimonials-reveal text-center max-w-3xl mx-auto mb-12 lg:mb-16">
            <p class="text-orange-600 font-semibold text-sm uppercase tracking-[0.2em] mb-4">Client Stories</p>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight leading-[1.05]">
                What clients say.
            </h2>
            <p class="mt-5 text-lg text-gray-500 leading-relaxed">
                Real feedback from teams who shipped products with us.
            </p>
        </div>

        <div class="testimonials-reveal testimonials-reveal--delay flex flex-wrap justify-center gap-6 lg:gap-10 mb-14 lg:mb-16">
            <div class="text-center px-6">
                <div class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Top Rated</div>
                <div class="mt-1 text-sm text-gray-500 max-w-[14rem]">Highest quality results and client satisfaction</div>
            </div>
            <div class="hidden sm:block w-px h-12 bg-gray-200 self-center" aria-hidden="true"></div>
            <div class="text-center px-6">
                <div class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">5.0 ★</div>
                <div class="mt-1 text-sm text-gray-500 max-w-[14rem]">Average client rating across delivered projects</div>
            </div>
        </div>

        @if($testimonials->isNotEmpty())
        <div class="testimonials-reveal testimonials-reveal--delay-2 relative">
            <button type="button" class="testimonials-nav testimonials-nav--prev hidden md:flex" aria-label="Previous testimonial" data-testimonials-prev>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" class="testimonials-nav testimonials-nav--next hidden md:flex" aria-label="Next testimonial" data-testimonials-next>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>

            <div class="testimonials-scroll hide-scrollbar flex gap-5 lg:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 -mx-4 px-4 sm:mx-0 sm:px-0" data-testimonials-track>
                @foreach($testimonials as $index => $testimonial)
                <article
                    class="testimonials-card snap-center shrink-0 w-[min(88vw,22rem)] sm:w-[24rem] lg:w-[26rem] flex flex-col"
                    style="--card-delay: {{ $index * 80 }}ms"
                >
                    <div class="flex items-center gap-1 mb-5" aria-label="{{ $testimonial->rating ?? 5 }} out of 5 stars">
                        @for($star = 1; $star <= 5; $star++)
                        <svg class="w-4 h-4 {{ $star <= ($testimonial->rating ?? 5) ? 'text-orange-500' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>

                    @if($testimonial->project_type)
                    <span class="inline-flex self-start text-xs font-medium text-orange-600 bg-orange-50 px-2.5 py-1 rounded-full mb-4">{{ $testimonial->project_type }}</span>
                    @endif

                    <blockquote class="flex-1">
                        <p class="testimonials-card__quote text-gray-700 text-[15px] leading-relaxed" data-quote-short="{{ e(Str::limit($testimonial->testimonial, 200)) }}" data-quote-full="{{ e($testimonial->testimonial) }}">
                            “{{ Str::limit($testimonial->testimonial, 200) }}”
                        </p>
                    </blockquote>

                    @if(strlen($testimonial->testimonial) > 200)
                    <button type="button" class="testimonials-read-more mt-4 text-left text-sm font-medium text-orange-600 hover:text-orange-700 transition-colors" data-read-more>
                        Read more
                    </button>
                    @endif

                    <footer class="mt-6 pt-5 border-t border-gray-200/80 flex items-center gap-3">
                        <div class="w-11 h-11 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                            {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 truncate">{{ $testimonial->client_name }}</div>
                            <div class="text-sm text-gray-500 truncate">
                                @if($testimonial->client_position && $testimonial->client_company)
                                    {{ $testimonial->client_position }}, {{ $testimonial->client_company }}
                                @elseif($testimonial->client_company)
                                    {{ $testimonial->client_company }}
                                @else
                                    {{ $testimonial->client_position }}
                                @endif
                            </div>
                        </div>
                    </footer>
                </article>
                @endforeach
            </div>
        </div>
        @else
        <p class="text-center text-gray-500">Client testimonials coming soon.</p>
        @endif
    </div>
</section>

@once
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const section = document.getElementById('testimonials-showcase');
    if (!section) return;

    const revealEls = section.querySelectorAll('.testimonials-reveal');
    const cards = section.querySelectorAll('.testimonials-card');
    const track = section.querySelector('[data-testimonials-track]');
    const prevBtn = section.querySelector('[data-testimonials-prev]');
    const nextBtn = section.querySelector('[data-testimonials-next]');

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach(el => observer.observe(el));
        cards.forEach(el => observer.observe(el));
    } else {
        revealEls.forEach(el => el.classList.add('is-visible'));
        cards.forEach(el => el.classList.add('is-visible'));
    }

    const scrollByCard = (direction) => {
        if (!track) return;
        const card = track.querySelector('.testimonials-card');
        const gap = 24;
        const amount = card ? card.offsetWidth + gap : 320;
        track.scrollBy({ left: direction * amount, behavior: 'smooth' });
    };

    prevBtn?.addEventListener('click', () => scrollByCard(-1));
    nextBtn?.addEventListener('click', () => scrollByCard(1));

    section.querySelectorAll('[data-read-more]').forEach(btn => {
        btn.addEventListener('click', () => {
            const quote = btn.previousElementSibling?.querySelector('.testimonials-card__quote')
                || btn.closest('.testimonials-card')?.querySelector('.testimonials-card__quote');
            if (!quote) return;
            const expanded = btn.dataset.expanded === 'true';
            if (expanded) {
                quote.textContent = '“' + quote.dataset.quoteShort + '”';
                btn.textContent = 'Read more';
                btn.dataset.expanded = 'false';
            } else {
                quote.textContent = '“' + quote.dataset.quoteFull + '”';
                btn.textContent = 'Show less';
                btn.dataset.expanded = 'true';
            }
        });
    });
});
</script>
@endpush
@endonce
