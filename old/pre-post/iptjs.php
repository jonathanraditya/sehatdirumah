<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        
        <script>
        $(document).ready(() => {
            $("textarea").html("");
            $("#sh2").hide(1);
            $("#hf2").click(() => {
                $("#form2").hide(200);
                $("#hf2").hide(1);
                $("#sh2").show(1);
            });
            
            $("#sh2").click(() => {
                $("#form2").show(200);
                $("#sh2").hide(1);
                $("#hf2").show(1);
            });
            
        });
        
        /*let openNewWindow = (link, target , toolbar, scrollbars, resizeable, top, left, width ,height) => {
            window.open(link, target, "toolbar=" + toolbar ,"scrollbars=" + scrollbars + ",resizable=" + resizeable + ",top="+top+",left="+left+",width="+width+",height="+height);
        };*/  
            
        let copyData = (id, target) => {
            let tval = document.getElementById(id).value;
            document.getElementById(target).value = "";
            document.getElementById(target).value = tval;
        };
        </script>
        
    </head>
    <body>
        <form id="form1" method="post" action="prev.php">
            form 1<br>
            <input name="ipt-prev-title" onkeydown="copyData('ipt-prev-title' , 'ipt-prev-title-t')"
                     onkeyup="copyData('ipt-prev-title' , 'ipt-prev-title-t')"
                     onkeypress="copyData('ipt-prev-title' , 'ipt-prev-title-t')" 
            placeholder="title"
            type="text" id="ipt-prev-title"><br>
            
            <input name="ipt-prev-tgl" onkeydown="copyData('ipt-prev-tgl' , 'ipt-prev-tgl-t')"
                     onkeyup="copyData('ipt-prev-tgl' , 'ipt-prev-tgl-t')"
                     onkeypress="copyData('ipt-prev-tgl' , 'ipt-prev-tgl-t')" 
            placeholder="tanggal"
            type="text" id="ipt-prev-tgl"><br>
            
            <textarea placeholder="artikel" name="txt-prev" id="txtr" 
            onkeydown="copyData('txtr' , 'txtr-t')"
            onkeyup="copyData('txtr' , 'txtr-t')"
            onkeypress="copyData('txtr' , 'txtr-t')">
                
            </textarea>
            <input type="submit" value="submit">
        </form><br>
        
        <button id="hf2">Hide form 2</button>
        <button id="sh2">Show form 2</button>
        <!--<button onclick="window.open('prev.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=100%,width=100%,height=400')" id="prev">preview</button><br>-->
        
        <!--<form id="form2" action="publish.php">
            <label>
            form 2<br>
            <input name="ipt-prev-title-t"
            placeholder="title"
            type="text" id="ipt-prev-title-t"><br>
            
            <input name="ipt-prev-tgl-t"
            placeholder="tanggal"
            type="text" id="ipt-prev-tgl-t"><br>
            
            <textarea placeholder="artikel" name="txt-prev-t" id="txtr-t">
                
            </textarea>
            <input type="submit" value="submit">
            </label>
        </form>-->
    </body>
</html>