<link href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}"
  rel="stylesheet" />
<link href="{{ asset('/assets/plugins/select2/css/select2-bootstrap4.css') }}"
  rel="stylesheet" />

<script src="/assets/plugins/select2/js/select2.min.js"></script>

<script>
  $('.single-select').select2({
    theme: 'bootstrap4',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: Boolean($(this).data('allow-clear')),
  });
</script>
