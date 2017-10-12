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
            $value = $this->reminderView->getValue();
            $this->reminderModel->setValueInTextBox($value);

            
            //Spara värdet till en fil 
            $this->reminderModel->writeToFile();

            //Skriv ut meddelandet 
            $message = $this->reminderModel->getMessage();
            $this->reminderView->setMessage($message);
        }
    }
}