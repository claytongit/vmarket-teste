    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
      function toggleAll(source) {
          document.querySelectorAll('input[type=checkbox]').forEach(cb => cb.checked = source.checked);

          verifySelectedCount();
      }

      function verifySelectedCount() {
          const selectedCount = document.querySelectorAll('input[type="checkbox"][name="ids[]"]:checked').length;

          if (selectedCount > 1) {
            $('#btn-delete-multiple').removeClass('d-none');
          } else {
            $('#btn-delete-multiple').addClass('d-none');
          }
      }

      $(document).on('change', 'input[type="checkbox"][name="ids[]"]', verifySelectedCount);
    </script>
  </body>
</html>