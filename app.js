var button = document.getElementById('button');
var text = document.getElementById('text');
var content = document.getElementById('content');

button.onclick = function(){
    var data = text.value();

    const cap = new XMLHttpRequest();

    cap.open('POST', 'save.php', true);
    cap.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    cap.send('show=' + data);

    cap.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var show = this.responseText;

            content.innerHTML = show;
        }
    }
}