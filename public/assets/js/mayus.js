<script>
  document.querySelectorAll('.uppercase-input').forEach(function(input) {
      input.addEventListener('input', function() {
          this.value = this.value.toUpperCase();
      });
  });
</script>