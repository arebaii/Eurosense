<input id="inputgeom" type="file" name="shpFile" multiple>
<input name="say" id="resultgeom" value="">
<script>
/*

  let result = document.getElementById('resultgeom');
  let input = document.getElementById('inputgeom');
  let sendg = document.getElementById('loadg');

input.addEventListener('change', e => {
  e.preventDefault();
  if (input.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', input.files[0]);
    data.append('shp[]', input.files[1]);
    data.append('shp[]', input.files[2]);
    fetch('upload.php', {
      method: 'post',
      body: data
    })
    .then(r => r.text())
    .then(r => {
      result.value = r;
    })
  } else {
    console.log('Missing files. Need shp, shx and dbf')
  }
});
*/
</script>
