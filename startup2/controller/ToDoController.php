<?php

namespace controller;

class ToDoController {
    private $reminderView;
    private $reminderModel; 

    public function __construct($Reminderview) {
        $this->reminderView = $Reminderview; 
        $this->reminderModel = new \model\ReminderModel();
    }

    public function userWantsToAddTodo() {
        if($this->reminderView->userPressedAddButton()) {
            $this->reminderModel->checkIfUserIsLoggedIn();
            //Är man inloggad kommer inget meddelande, är man utloggad får man meddelande
            $message = $this->reminderModel->getMessage();
            $this->reminderView->setMessage($message);
            
            //Hämta värdet och skicka in det i modellen 
            $value = $this->reminderView->getValue();
            $this->reminderModel->setValueInTextBox($value);

            //Spara värdet till en fil 
            $this->reminderModel->writeToFile();







            //Hämta värdet i boxen & skicka det till modellen 
            $newValue = $this->reminderView->setValueInTextBox();
            $this->reminderModel->getTextBoxValue($toDoValue);

            //Skicka in värdet i funktionen som ska skriva en fil 
            $this->reminderModel->writeToFile($toDoValue);
            $this->reminderModel->saveToDo($toDoValue);

            //Skriv ut meddelandet 
            $message = $this->reminderModel->getMessage();
            $this->reminderView->setMessage($message);
        }
    }
}