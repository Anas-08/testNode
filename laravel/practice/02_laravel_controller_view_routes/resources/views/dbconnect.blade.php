<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel & Mysql Workbench</title>
</head>
<body>
    <div>
        <?php 
        
            if(DB::connection()->getpdo()){
                echo "DB Connected...";
            } else{
                echo "DB Not Connected...";
            }   
        ?>
    </div>
    
</body>
</html>