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
            $message = $this->reminderModel->getMessage();
            $this->reminderView->setMessage($message);


            //Om användaren är inloggad: 
            $value = $this->reminderView->keepTodoValue();
            $this->reminderModel->saveToDo($value);

        }
    }
}