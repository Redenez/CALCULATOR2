   <?php 

    $exp = $_POST['expre']; 
    $new_exp = str_replace('x','*', $exp);
    $exp_first_char =$new_exp['0'];
    $exp_last_char = $new_exp[strlen($new_exp)-1];
    




    if (   ($exp_first_char == '.')
        OR ($exp_first_char == '*')
        OR ($exp_first_char == '+')
        OR ($exp_first_char == '-')
        OR ($exp_first_char == '/')
        ) 
    {
        $new_exp  = '0' . $new_exp;
    }



   if (    ($exp_last_char == '.')
        OR ($exp_last_char == '*')
        OR ($exp_last_char == '+')
        OR ($exp_last_char == '-')
        OR ($exp_last_char == '/')
        ) 
    {
        $new_exp  = $new_exp . '0';
    }




    if (   (strpos($exp, 'Erreur') !== false)

        OR (strpos($new_exp, '**') !== false)
        OR (strpos($new_exp, '*+') !== false)
        OR (strpos($new_exp, '*-') !== false)
        OR (strpos($new_exp, '*/') !== false)
        OR (strpos($new_exp, '*)') !== false)

        OR (strpos($new_exp, '++') !== false)
        OR (strpos($new_exp, '+*') !== false)
        OR (strpos($new_exp, '+-') !== false)
        OR (strpos($new_exp, '+/') !== false)
        OR (strpos($new_exp, '+)') !== false)


        OR (strpos($new_exp, '--') !== false)
        OR (strpos($new_exp, '-*') !== false)
        OR (strpos($new_exp, '-+') !== false)
        OR (strpos($new_exp, '-/') !== false)
        OR (strpos($new_exp, '-)') !== false)

        OR (strpos($new_exp, '//') !== false)
        OR (strpos($new_exp, '/*') !== false)
        OR (strpos($new_exp, '/+') !== false)
        OR (strpos($new_exp, '/-') !== false)
        OR (strpos($new_exp, '/)') !== false)

        OR (strpos($new_exp, '(*') !== false)
        OR (strpos($new_exp, '(+') !== false)
        OR (strpos($new_exp, '(-') !== false)
        OR (strpos($new_exp, '(/') !== false)
        OR (strpos($new_exp, '()') !== false)

        OR (strpos($new_exp, ')(') !== false)

        
        OR ($exp_first_char == ')')
        OR ($exp_last_char == '(')
        
        ) 
    {
        $new_exp = false;
    }




    for ($i=0; $i < strlen($new_exp)-1; $i++)
    {         
    
        if (    (is_numeric($new_exp[$i]) AND $new_exp[$i+1] == '(')
            OR  (is_numeric($new_exp[$i+1]) AND $new_exp[$i] == ')')
            OR  ($new_exp[$i] == '.' AND $new_exp[$i+1] == ')')
            OR  ($new_exp[$i] == ')' AND $new_exp[$i+1] == '.')
            OR  ($new_exp[$i] == '.' AND $new_exp[$i+1] == '(')
            OR  ($new_exp[$i] == '(' AND $new_exp[$i+1] == '.')

            )
        {
            $new_exp = false;
            break;
        }
     


    }
    

    if ($new_exp !== false)

    {

        function e($errno, $errstr, $errfile, $errline) 
        {
            echo '<font color="red">Erreur : Divion par 0</font>';
        }

        set_error_handler('e');


        $result = eval("return ($new_exp);");
        echo $result;
    }
    else
    {
        echo '<font color="red">Erreur de Syntax !</font>';
        $new_exp = 0;
    }





 ?>