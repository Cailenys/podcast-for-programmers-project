<?php
    class Account {

        // Functions manually called

        public function_construct(){

        }

        public function_register(){ 

            $this->validateUsername($username);
            $this->validateUsername($firstName);
            $this->validateUsername($lastName);
            $this->validateUsername($email, $email2);
            $this->validateUsername($password, $password2);

        }

        // The private functions can only be called within this class

        private function validateUsername($un){

            echo " username function called";
        }

        private function validateFirstName($fn){
            
        }

        private function validateLastName($ln){
            
        }

        private function validateEmails($em, $em2){
            
        }

        private function validatePassword($pw, $pw2){
            
        }

    }
?>