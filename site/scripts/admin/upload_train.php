<?php
    function generer_random($longueur){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $longueur; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    if(isset($_FILES['file'])){
        $file = $_FILES['file'];
        $name = $_POST['name'];
        
        //Propriétés du fichier
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('jpeg', 'jpg', 'png', 'bmp');

        if(in_array($file_ext, $allowed)){
            if($file_error === 0){
                if($file_size <= 5242880){
                    if(is_dir('../personnes/' . $name . '/')){
                        $file_destination = '../personnes/' . $name . '/' . generer_random(6) . '.' . $file_ext;
                    }else{
                        mkdir('../personnes/' . $name . '/');
                        $file_destination = '../personnes/' . $name . '/' . generer_random(6) . '.' . $file_ext;
                    }
                    move_uploaded_file($file_tmp, $file_destination);
                    echo "Done!";
                    header('Location: train.php');
                }else{
                    echo "Le fichier est trop lourd.";
                }
            }else{
                echo "Une erreur c'est produite: " . $file_error;
            }
        }else{
            echo "Ce type de fichier n\'est pas compatible.";
        }
    }
?>