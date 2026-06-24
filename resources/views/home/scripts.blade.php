@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.home-filter-btn');
    const caseStudyItems = document.querySelectorAll('.home-case-study-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-orange-500', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            });
            button.classList.add('active', 'bg-orange-500', 'text-white');
            button.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');

            caseStudyItems.forEach(item => {
                const category = item.getAttribute('data-category');
                const show = filter === 'all' || category === filter;
                item.style.display = show ? '' : 'none';
            });
        });
    });
});
</script>
@endpush
