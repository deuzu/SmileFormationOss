<?php

    require_once './repository/usersRepository.php';

    function validateUser($name,$login,$psw){
        
        $userName  =  strip_tags($name) ;
        $userLogin = preg_match('/^[a-zA-Z0-9_-]/',$login);
        $userPsw   =  strip_tags($psw) ;
        
        $error=false;
        
        try{    

            //Vérifier Si les entrées ne sont pas vides et bien renseignées
            if ((isset($name)&& $name=="") 
                || (isset($login)&& $login=="")
                || (isset($psw) && $psw=="")){
                             

                throw new Exception('les champs du formulaire ne doivent pas etre vide');
                
            }
            
            //Vérifier si le login entré est correct   
            if (!$userLogin){

                throw new Exception('Le login n\'est pas correct');

            }
            
            if(userIsOK($userLogin, $userPsw)){
          
                throw new Exception('Ces identifiants existent déja');
            }
            
            
        }
        
        catch (Exception $e){
            $error = $e->getMessage();
        } 
        
        return $error;
    }
  