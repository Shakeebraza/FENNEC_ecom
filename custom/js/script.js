document.getElementById('topLocationsToggle').addEventListener('click', function() {
    var content = document.getElementById('topLocationsContent');
    if (content.style.display === 'none' || content.style.display === '') {
      content.style.display = 'block'; 
    } else {
      content.style.display = 'none'; 
    }
  });