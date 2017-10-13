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
        if($this->reminderView->userPressedAddButton()) 
        {
            $value = $this->reminderView->getValue();
            $this->reminderModel->setValueInTextBox($value);

            $this->reminderModel->writeToFile();
            $message = $this->reminderModel->getMessage();
            $this->reminderView->setMessage($message);

        } else {
            if($this->reminderView->userPressedShowButton()) 
            {
                $answer = $this->reminderModel->canIShowFile();
                $this->reminderView->getAnswer($answer);
                $this->reminderView->showFile();
                $message = $this->reminderModel->getMessage();
                $this->reminderView->setMessage($message);
            } 
        }
    }     
}
