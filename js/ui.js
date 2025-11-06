// ui.js - helper for UI (future expansion)
document.addEventListener('click', function(e){
  // close navbar collapse on click outside (mobile)
  const toggler = document.querySelector('.navbar-toggler');
  const collapse = document.querySelector('.navbar-collapse.show');
  if (collapse && toggler && !toggler.contains(e.target) && !collapse.contains(e.target)) {
    const bsCollapse = bootstrap.Collapse.getInstance(collapse);
    if (bsCollapse) bsCollapse.hide();
  }
});
