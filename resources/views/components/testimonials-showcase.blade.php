@props(['testimonials'])

<section id="testimonials-showcase" class="testimonials-showcase relative py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <div class="testimonials-showcase__orb testimonials-showcase__orb--1"></div>
        <div class="testimonials-showcase__orb testimonials-showcase__orb--2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="testimonials-reveal apple-reveal text-center max-w-3xl mx-auto mb-12 lg:mb-14">
            <p class="text-orange-600 font-semibold text-sm uppercase tracking-[0.2em] mb-4">Client Stories</p>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight leading-[1.05]">
                What clients say.
            </h2>
            <p class="mt-5 text-lg text-gray-500 leading-relaxed">
                Real feedback from teams who shipped products with us.
            </p>
        </div>

        <div class="testimonials-reveal testimonials-reveal--delay flex flex-wrap justify-center gap-8 lg:gap-12 mb-12 lg:mb-14">
            <div class="text-center">
                <div class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Top Rated</div>
                <div class="mt-1 text-sm text-gray-500">Highest quality results and client satisfaction</div>
            </div>
            <div class="hidden sm:block w-px h-10 bg-gray-200 self-center" aria-hidden="true"></div>
            <div class="text-center">
                <div class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">5.0 ★</div>
                <div class="mt-1 text-sm text-gray-500">Average client rating across delivered projects</div>
            </div>
        </div>

        @if($testimonials->isNotEmpty())
        @php $canCarousel = $testimonials->count() > 3; @endphp
        <div class="testimonials-reveal testimonials-reveal--delay-2 testimonials-carousel {{ $canCarousel ? '' : 'testimonials-carousel--static' }}" data-testimonials-carousel data-autoplay="{{ $canCarousel ? 'true' : 'false' }}">
            <div class="testimonials-carousel__controls flex items-center justify-end gap-2 mb-5 {{ $canCarousel ? '' : 'hidden' }}">
                <button type="button" class="testimonials-nav testimonials-nav--inline" aria-label="Previous testimonial" data-testimonials-prev>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" class="testimonials-nav testimonials-nav--inline" aria-label="Next testimonial" data-testimonials-next>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <div class="testimonials-viewport overflow-hidden" data-testimonials-viewport>
                <div class="testimonials-track flex gap-5 lg:gap-6" data-testimonials-track>
                    @foreach($testimonials as $index => $testimonial)
                    <article class="testimonials-card flex flex-col" data-testimonial-card style="--card-delay: {{ min($index, 2) * 100 }}ms">
                        <svg class="testimonials-card__mark w-8 h-8 text-orange-200 mb-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M14.017 21v-7.391c0-5.704-3.731-9.57-8.983-10.609l.995 2.151 2.432-.865-1.046 2.033-1.032-.017c-1.285 5.114-1.284 8.562 0 13.633h5.634zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l-.996 2.151 2.432-.865-1.045 2.033-1.033-.017c-1.285 5.114-1.282 8.562 0 13.633h5.634z"/>
                        </svg>

                        <div class="flex items-center gap-1 mb-4" aria-label="{{ $testimonial->rating ?? 5 }} out of 5 stars">
                            @for($star = 1; $star <= 5; $star++)
                            <svg class="w-4 h-4 {{ $star <= ($testimonial->rating ?? 5) ? 'text-orange-500' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>

                        @if($testimonial->project_type)
                        <span class="inline-flex self-start text-xs font-semibold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-full mb-4">{{ $testimonial->project_type }}</span>
                        @endif

                        <blockquote class="flex-1 min-h-[7.5rem]">
                            <p class="testimonials-card__quote text-gray-700 text-[15px] leading-relaxed line-clamp-5" data-quote-short="{{ e(Str::limit($testimonial->testimonial, 220)) }}" data-quote-full="{{ e($testimonial->testimonial) }}">
                                {{ Str::limit($testimonial->testimonial, 220) }}
                            </p>
                        </blockquote>

                        @if(strlen($testimonial->testimonial) > 220)
                        <button type="button" class="testimonials-read-more mt-3 text-left text-sm font-semibold text-orange-600 hover:text-orange-700 transition-colors" data-read-more>
                            Read more →
                        </button>
                        @endif

                        <footer class="mt-auto pt-5 border-t border-gray-200/80 flex items-center gap-3">
                            @if($testimonial->client_image)
                            <img src="{{ asset('storage/' . $testimonial->client_image) }}" alt="{{ $testimonial->client_name }}" class="w-11 h-11 rounded-full object-cover flex-shrink-0 ring-2 ring-orange-100">
                            @else
                            <div class="w-11 h-11 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                            </div>
                            @endif
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

            @if($canCarousel)
            <div class="testimonials-dots flex items-center justify-center gap-2 mt-8" data-testimonials-dots role="tablist" aria-label="Testimonial slides"></div>
            @endif
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

    const carousel = section.querySelector('[data-testimonials-carousel]');
    const track = carousel?.querySelector('[data-testimonials-track]');
    const cardEls = carousel ? Array.from(carousel.querySelectorAll('[data-testimonial-card]')) : [];

    if (!carousel || !track || !cardEls.length) return;

    const prevBtn = carousel.querySelector('[data-testimonials-prev]');
    const nextBtn = carousel.querySelector('[data-testimonials-next]');
    const dotsContainer = carousel.querySelector('[data-testimonials-dots]');
    const autoplay = carousel.dataset.autoplay === 'true';

    let index = 0;
    let paused = false;
    let autoplayTimer = null;
    let resizeTimer = null;

    const cardsPerView = () => {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 640) return 2;
        return 1;
    };

    const maxIndex = () => Math.max(0, cardEls.length - cardsPerView());

    const buildDots = () => {
        if (!dotsContainer) return;
        dotsContainer.innerHTML = '';
        const total = maxIndex() + 1;
        for (let i = 0; i < total; i++) {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'testimonials-dot' + (i === index ? ' is-active' : '');
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.setAttribute('role', 'tab');
            dot.addEventListener('click', () => goTo(i, true));
            dotsContainer.appendChild(dot);
        }
    };

    const updateDots = () => {
        if (!dotsContainer) return;
        dotsContainer.querySelectorAll('.testimonials-dot').forEach((dot, i) => {
            dot.classList.toggle('is-active', i === index);
        });
    };

    const slideOffset = () => {
        const card = cardEls[0];
        const gap = parseFloat(getComputedStyle(track).gap) || 24;
        return index * (card.offsetWidth + gap);
    };

    const applyTransform = () => {
        track.style.transform = `translate3d(-${slideOffset()}px, 0, 0)`;
        updateDots();
    };

    const goTo = (nextIndex, userTriggered = false) => {
        index = Math.max(0, Math.min(nextIndex, maxIndex()));
        applyTransform();
        if (userTriggered) resetAutoplay();
    };

    const next = (userTriggered = false) => {
        goTo(index >= maxIndex() ? 0 : index + 1, userTriggered);
    };

    const prev = (userTriggered = false) => {
        goTo(index <= 0 ? maxIndex() : index - 1, userTriggered);
    };

    const resetAutoplay = () => {
        if (!autoplay) return;
        clearInterval(autoplayTimer);
        autoplayTimer = setInterval(() => {
            if (!paused) next(false);
        }, 5000);
    };

    const onResize = () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (index > maxIndex()) index = maxIndex();
            buildDots();
            applyTransform();
        }, 150);
    };

    prevBtn?.addEventListener('click', () => prev(true));
    nextBtn?.addEventListener('click', () => next(true));

    carousel.addEventListener('mouseenter', () => { paused = true; });
    carousel.addEventListener('mouseleave', () => { paused = false; });
    carousel.addEventListener('focusin', () => { paused = true; });
    carousel.addEventListener('focusout', () => { paused = false; });

    section.querySelectorAll('[data-read-more]').forEach(btn => {
        btn.addEventListener('click', () => {
            const quote = btn.previousElementSibling?.querySelector('.testimonials-card__quote');
            if (!quote) return;
            const expanded = btn.dataset.expanded === 'true';
            if (expanded) {
                quote.textContent = quote.dataset.quoteShort;
                quote.classList.add('line-clamp-5');
                btn.textContent = 'Read more →';
                btn.dataset.expanded = 'false';
            } else {
                quote.textContent = quote.dataset.quoteFull;
                quote.classList.remove('line-clamp-5');
                btn.textContent = 'Show less';
                btn.dataset.expanded = 'true';
            }
        });
    });

    if (autoplay) {
        buildDots();
        resetAutoplay();
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            clearInterval(autoplayTimer);
        }
    }

    applyTransform();
    window.addEventListener('resize', onResize, { passive: true });
});
</script>
@endpush
@endonce
