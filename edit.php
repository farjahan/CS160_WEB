<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Document</title>
        <link rel="stylesheet" type="text/css" href="style/reset.css"> 
        <link rel="stylesheet" type="text/css" href="style/jquery-ui.css"> 
        <link rel="stylesheet" type="text/css" href="style/mystyle.css"> 
    </head>
    <body>
        <h1>Edit Document</h1> 
        <form action=""> 
             
            <input type="text" id="filename" class="rinput" placeholder="File Name" required/> <br/>
             <input type="text" id="expdate" class="rinput dateinput" name="expdate" placeholder="Expiration Date"/> <br/>
   
             <textarea class="rinput comment" name="comment" placeholder="Comment" rows="5"></textarea> <br/>
             <input type="file" name="uploadfile" id="uploadfile" class="uploadfile" value="Upload File" accept="image/*, .pdf"/><br/><br/>
             <input type="submit" name="submit" id="submit" value="Save"/>
        </form> 
        
        
        <!--Javascript--> 
          <script type="text/javascript" src="script/jquery2.1.1.js" ></script> 
        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="script/jquery-ui.js"></script>
         <script type="text/javascript" src="script/main.js"></script>
    </body>
</html>
