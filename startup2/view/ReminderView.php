<?php 

namespace view; 

class ReminderView {
    private static $reminder = 'ReminderView::Reminder';
    private static $toDo = 'ReminderView::ToDo';
    private $message = '';



    public function setMessage($message) {
		$this->message = $message;
	}

    public function userPressedAddButton() {
		return isset($_POST[self::$reminder]); 
    }


	public function keepTodoValue() {
        if (isset($_POST[self::$toDo])) {
            $toDoValue= $_POST[self::$toDo];
            //Spara $toDoValue --> till fil 
        }
	}   
    
    public function reminder() {
        return 
            '<h2>Add something to your ToDo list:</h2>
            <form method="post" id="reminderform">
            <textarea for="' . self::$toDo . '"rows="3" cols="50" name="reminder">Enter a reminder here..</textarea> 
            <br>
            <input id="submit" type="submit" name="' . self::$reminder . '"  value="Add" />
            <br>
            </form>';
    }

}
