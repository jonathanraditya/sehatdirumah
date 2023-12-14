function copyText(data,button){
	var target = document.getElementById('data');
    target.select();
  	target.setSelectionRange(0, 99999);
    document.execCommand("copy");
  	document.getElementById('button').textContent='copied';
}