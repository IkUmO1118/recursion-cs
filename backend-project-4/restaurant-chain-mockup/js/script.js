document.querySelectorAll('.accordion-header').forEach(function(header) {
  header.addEventListener('click', function() {
      const accordion = this.parentElement;
      accordion.classList.toggle('open');
  });
});