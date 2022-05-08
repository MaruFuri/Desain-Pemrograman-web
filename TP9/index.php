<?php
    include('db.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ester Inc.</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                colors: {
                    main: '#F7C59F',
                    secondary: '#917C75',
                    dark: '#2A324B',
                    ext: '#50576E',
                    ext2: '#767B91',
                    ext3: '#C7CCDB',
                    text: '#E1E5EE',    
                }
                }
            }
        }
    </script>
    <script>
        const changeScreen = (val) => {
            window.location.href = "?screen=" + val
        }
    </script>
</head>
<body>
<?php
    include('menu.php');

    $screen = isset($_GET["screen"]) ? $_GET["screen"] : "company";

    include($screen . ".php");
?>
</body>
</html>