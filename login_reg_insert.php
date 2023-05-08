<?php

	include("db.php");

    include('config.php');

	session_start();

		$name=$_POST['name'];
        $email=$_POST['email'];
        $username=$_POST['username'];
		$password=$_POST['password'];


		  if(!empty($name) && !empty($email) && !empty($username)  && !empty($password)){

			$duplicate_email = mysqli_query($connect,"select * from users where email='$email'");

			$duplicate_username = mysqli_query($connect,"select * from users where username='$username'");

               // действия с текст. файлом и парсинг
				$source=file_get_contents($filename);

			    $arr = array();

			    $ptrn = "/\b([a-z0-9._-]+@[a-z0-9.-]+)\b/i";

			    preg_match_all($ptrn,$source,$arr);

                $user_id = count($arr[1]) + 1;

			    $bool = in_array($email,$arr[1]); // true or false

			    $register_date = date('Y-m-d H:i:s');

                // валидация email
		   if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	          {
	             echo json_encode(array("statusCode"=>205));

	             $result = 'statusCode = 205; Your Email is not valid !!!';

	            }  else  if($bool == 1)

				//if (mysqli_num_rows(duplicate_email)>0)
				{
					$result = 'statusCode = 201';
					echo json_encode(array("statusCode"=>201));

				}
				// проверка дубликата email в БД

				/*else if (mysqli_num_rows($duplicate_username)>0)
				{
					echo json_encode(array("statusCode"=>202));
				}*/
			   else {
                   $_SESSION['email']=$email;

				   $text = $user_id.','.$name.','.$email.','.md5($password)."\r\n";

					//записываем текст в файл
					file_put_contents($filename, $text, FILE_APPEND);

                    // сохранаяем в БД
					$sql = "INSERT INTO `users`( `name`, `email`, `password`,`username`,`uploaded_on`)
					VALUES ('$name','$email','".md5($password)."', '$username', '$register_date')";

					if (mysqli_query($connect, $sql)) {

						$result = 'statusCode = 200';

						echo json_encode(array("statusCode"=>200));

					} else {

						$result = 'statusCode = 203';

						echo json_encode(array("statusCode"=>203));
					}
				
			}

			mysqli_close($connect);
		} else {
            $result = 'statusCode = 204';

			echo json_encode(array("statusCode"=>204));
		};

            //заливаем логи
		    $result =  $result.' , '. $register_date.';'."\r\n";

            file_put_contents($log_file, $result, FILE_APPEND);
