<?php

function clean($string)
{
    return htmlentities($string);
}

function redirect($location)
{
    return header("location:{$location}");
}
function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['Message']=$msg;
    }
    else
    {
        $msg="";
    }
}

function display_message()
{
    if(isset($_SESSION['Message']))
    {
        echo $_SESSION['Message'];
        unset($_SESSION['Message']);
    }
}

function Token_Generator()
    {
        $token = $_SESSION['token']=md5(uniqid(mt_rand(),true));
        return $token;
    }

    function send_email($email,$sub,$msg,$header)
{
    return mail($email,$sub,$msg,$header);
}

function Error_validation($Error)
{
    return '<div class="alert alert-danger">'.$Error.'</div>';
}

    function user_validation()
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $FirstName = clean($_POST['FirstName']);
        $LastName = clean($_POST['LastName']);
        $UserName = clean($_POST['UserName']);
        $Email = clean($_POST['Email']);
        $Pass = clean($_POST['pass']);
        $cpass = clean($_POST['cpass']);

        

        $Errors = [];
        $Max = 20;
        $Min = 03;

        if(strlen($FirstName)<$Min)
        {
            $Errors[]="First name cannot be less than {$Min} character";
        }

        if(strlen($FirstName)>$Max)
        {
            $Errors[]="First name cannot be more than {$Max} character";
        }

        if(strlen($LastName)<$Min)
        {
            $Errors[]="Last name cannot be less than {$Min} character";
        }

        if(strlen($LastName)>$Max)
        {
            $Errors[]="Last name cannot be more than {$Max} character";
        }

        if(!preg_match("/^[a-zA-Z,0-9]*$/",$UserName))
        {
            $Errors[]="username cannot accept such character";
        }

        if(Email_Exists($Email))
        {
            $Errors[]="Email Already register";   
        }

         if(User_Exists($UserName))
        {
            $Errors[]="username Already register";   
        }
        
        // if(empty($UserName))
        // {
        //     $Errors[]= "pls fill";
        // }

        if($Pass!=$cpass)
        {
            $Errors[]="password not matched";
        }


        if(!empty($Errors))
        {
            foreach($Errors as $Error)
            {
                echo Error_validation($Error);
            }
        }
        else
        {
            if(user_registration($FirstName,$LastName,$UserName,$Email,$Pass))
            {
                set_message('<p class="bg-success text-center lead"> Successfuly Activated, you have successfully registered, please check your activation link</p>');
                redirect("index.php");
            }
            else
            {
                set_message('<p class="bg-danger text-center lead"> your Account is not registered, Please try again</p>');
                redirect("index.php");
            }

        }

       
    }
}
function Email_Exists($email)
{
    $sql = " select * from users where Email='$email'";
    $result = Query($sql);
    if(fatech_data($result))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function User_Exists($user)
{
    $sql = " select * from users where UserName='$user'";
    $result = Query($sql);
    if(fatech_data($result))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function user_registration($FName,$LName,$UName,$Email,$Pass)
{
    $FirstName = escape($FName);
    $LastName = escape($LName);
    $UserName = escape($UName);
    $Email = escape($Email);
    $Pass = escape($Pass);

    if(Email_Exists($Email))
    {
        return true;
    }

    elseif(User_Exists($UserName))
    {
        return true;
    }
    else
    {
        $Password = md5($Pass);
        $Validation_code = md5($UserName + microtime());

        $sql= "insert into users (FirstName,LastName,UserName,Email,Password,Validation_Code,Active) values ('$FirstName','$LastName','$UserName','$Email','$Password','$Validation_code','0')";

        $result = Query($sql);
        confirm($result);

        $subject = "Activate your account";

        $msg = " Please click the link below to Activate your account http://localhost/loginpro/activate.php?Email=$Email&Code=$Validation_code";

        $header = "From No-Reply admin@onlineekomall.com";

        send_email($Email,$subject,$msg,$header);

        return true;
    }
} 

function activation()
{
    if($_SERVER['REQUEST_METHOD']=="GET")
    {
         $Email = $_GET['Email'];
         $Code = $_GET['Code'];

        $sql = "select * from users where Email='$Email' AND  Validation_Code='$Code'";
        $result = Query($sql);
        confirm($result);

        if(fatech_data($result))
        {
            $sqlquery = "update users set Active='1', Validation_Code='0' where Email='$Email'AND Validation_Code='$Code'";
            $result2 =Query($sqlquery);
            confirm($result2);
            set_message('<p class="bg-success text-center lead">your account successfully activated</p>');
            redirect('login.php');
        }
        else
        {
          echo  '<p class="bg-danger text-center lead">Account not activated </p>';   
        }
    }
}


function login_validation()
{
    $Errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $UserEmail = clean($_POST['UEmail']);
        $UserPass = clean($_POST['UPass']);
        $Remember = isset($_POST['remember']);

        if(empty($UserEmail))
        {
            $Errors[] = "Please Enter your Email";
        }
        if (empty($UserPass))
        {
            $Errors[] = "Please Enter your Password";           
        }
        if (!empty($Errors))
        {
        foreach ($Errors as $Error)
            {
                echo Error_validation($Error);
            }
        }
        else
        {
            if(user_login($UserEmail,$UserPass,$Remember))
            {
                redirect("admin.php");
            }
            else
            {
                echo Error_validation("please enter correct email or password");
            }
        }
    }
    
   
}


function user_login($UEmail,$UPass,$Remember)
{
    $query = "select * from users where Email='$UEmail' and Active='1'";
    $result =Query($query);

    if($row=fatech_data($result))
    {
        $db_pass = $row['Password'];
        if(md5($UPass)==$db_pass)

            {
                if($Remember == true)
                {
                    setcookie('email',$UEmail, time() + 86400);
                }
                $_SESSION['Email']=$UEmail;
                return true;
            }            

        else
            {
                return false;
            }
    }

}


function logged_in()
{
    if(isset($_SESSION['Email']) || isset($_COOKIE['email']))
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>