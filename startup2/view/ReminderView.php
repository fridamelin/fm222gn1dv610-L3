<?php 

namespace view; 

class ReminderView {
    private static $messageId = 'ReminderView::Message';
    private static $reminder = 'ReminderView::Reminder';
    private static $toDo = 'ReminderView::ToDo';
    public static $keepValue = '';
    private $message = '';



    public function setMessage($message) {
		$this->message = $message;
    }

    public function userPressedAddButton() {
		return isset($_POST[self::$reminder]); 
    }

    public function getValue() {
        $input = $_POST[self::$toDo];
        return $input;
    }

    
    public function reminder() {
        return 
            '<h2>Add something to your ToDo list:</h2>
            <form method="post" id="reminderform">
            <fieldset>
            <p id="' . self::$messageId . '">' . $this->message .  '</p>
            <label for="' . self::$toDo . '"></label>
            <input type="text" id="' . self::$toDo . '" name="' . self::$toDo . '" value="' . self::$keepValue . '"/>
            <br>
            <input id="submit" type="submit" name="' . self::$reminder . '"  value="Add" />
            <br>
            </fieldset>
            </form>';
    }

}
