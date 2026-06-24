@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.home-filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            document.querySelectorAll('.home-filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-orange-500', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            });
            button.classList.add('active', 'bg-orange-500', 'text-white');
            button.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            document.querySelectorAll('.home-case-study-item').forEach(item => {
                const category = item.getAttribute('data-category');
                item.style.display = (filter === 'all' || category === filter) ? '' : 'none';
            });
        });
    });
});
</script>
@endpush
