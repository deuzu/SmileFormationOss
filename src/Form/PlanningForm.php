<?php

namespace SmileOSS\Lab\OOP\Form;

class PlanningForm
{
    public function validate(array $planning)
    {
       // echo "debut validateCreateForm ";
       if( isset($planning["date"]) && isset($planning["label"]) &&   isset($planning["teach"])){
            if(($planning["label"])=="" || ($planning["teach"])==""){
               throw new \Exception("Champ vide!");
           }

           if(!is_numeric($planning["date"])){
                throw new \Exception("La date doit être au format numerique!");
            }

            return true;
       }

       else{
           throw new \Exception("probleme de validation de formulaire");
       }
    }
}
