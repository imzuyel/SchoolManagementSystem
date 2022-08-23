<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css"
  integrity="sha512-NXUhxhkDgZYOMjaIgd89zF2w51Mub53Ru3zCNp5LTlEzMbNNAjTjDbpURYGS5Mop2cU4b7re1nOIucsVlrx9fA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"
  integrity="sha512-lOrm9FgT1LKOJRUXF3tp6QaMorJftUjowOWiDcG5GFZ/q7ukof19V0HKx/GWzXCdt9zYju3/KhBNdCLzK8b90Q=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>

<script>
  @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
      new Noty({
        type: 'error',
        layout: 'topRight',
        timeout: 3000,
        text: '{{ $error }}',

      }).show();
    @endforeach
  @endif
</script>
