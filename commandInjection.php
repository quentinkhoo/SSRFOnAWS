<html>
    <body>
        <form action="" method="post">
        <h1> We provide you the best way to ping </h1>
            IP to ping:
            <input type=text name="t1">
            <br>
            <br>
            <input type=submit name="s">
            <?php
if(isset($_POST['s']))
{
            $a=$_POST['t1']; //accessing value from the text field

                if($a == ''){
                        $output = shell_exec("ping -c 1 www.google.com");
                        echo "<br>";
                        echo $output;
                } else{
                        $output =  shell_exec("ping -c 1 ".$a);
                        echo "<br>";
                echo $output; //displaying result
                }
}
            ?>
        </form>
    </body>
</html>
