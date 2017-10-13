<?php 

namespace view; 

class ReminderView {
    private static $messageId = 'ReminderView::Message';
    private static $reminder = 'ReminderView::Reminder';
    private static $showToDos = 'ReminderView::Show';
    private static $toDo = 'ReminderView::ToDo';
    private static $noteId = 'ReminderView::Note';
    private $message = '';
    private $answer;

    public function setMessage($message) {
		$this->message = $message;
    }

    public function getValue() {
        $input = $_POST[self::$toDo];
        return $input;
    }

    public function getAnswer($answer) {
        $this->answer = $answer;
    }
    
    public function userPressedAddButton() {
		return isset($_POST[self::$reminder]); 
    }

    public function userPressedShowButton() {
        return isset($_POST[self::$showToDos]);
    }

	public function showFile() {
        if($this->answer == true) {
            $myFile = 'ToDos.txt';
            return file_get_contents($myFile);
        } 
	}
    
    public function reminder() {
        return 
            '<h2>Add something to your ToDo list:</h2>
            <form method="post" id="reminderform">
            <fieldset>
            <p id="' . self::$messageId . '">' . $this->message .  '</p>
            <label for="' . self::$toDo . '"></label>
            <input type="text" id="' . self::$toDo . '" name="' . self::$toDo . '"/>
            <input id="submit" type="submit" name="' . self::$reminder . '"  value="Add" />
            <input id="submit1" type="submit" name="' . self::$showToDos . '"  value="Show ToDos" />
            <br>
            </fieldset>
            </form>'
            . $this->showToDoForm();
    }

    public function showToDoForm() {
        if($this->answer == true) {
            return 
            '<h2>ToDo:</h2>
            <fieldset>
            <p id="' . self::$noteId . '">' . $this->showFile() . '</p>  
            </fieldset>
            ';
        }
    }
}
