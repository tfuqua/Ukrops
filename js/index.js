
var searchToggleID = 'searchToggle';
var searchFormID = 'searchForm';

function toggleSearch() {
  document.getElementById(searchFormID).classList.toggle('active');
}

document.getElementById(searchToggleID).addEventListener('click', toggleSearch);
