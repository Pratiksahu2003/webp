@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('.select2').select2({ width: '100%' });
    }

    document.querySelectorAll('.ckeditor').forEach(function (el) {
        ClassicEditor.create(el).catch(console.error);
    });

    document.querySelectorAll('.status-toggle').forEach(function (toggle) {
        toggle.addEventListener('change', function () {
            fetch(this.dataset.url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            }).catch(function () {
                alert('Failed to update status');
            });
        });
    });

    document.querySelectorAll('.image-input').forEach(function (input) {
        input.addEventListener('change', function () {
            const preview = document.querySelector(this.dataset.preview);
            if (!preview || !this.files || !this.files[0]) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        });
    });
});

function addDynamicRow(containerId, template) {
    const container = document.querySelector(containerId);
    if (!container) return;
    container.insertAdjacentHTML('beforeend', template.replace(/__INDEX__/g, Date.now()));
}
</script>
@endpush
