<?php 

namespace view; 

class ReminderView {

    private static $reminder = 'ReminderView::Reminder';


    public function userPressedAddButton() {
		return isset($_POST[self::$reminder]); 
    }
    

    public function reminder() {
        return 
            '<h2>Add something to your ToDo list:</h2>
            <form method="post" id="reminderform">
            <textarea rows="3" cols="50" name="reminder">Enter a reminder here..</textarea> 
            <br>
            <input id="submit" type="submit" name="' . self::$reminder . '"  value="Add" />
            <br>
            </form>';
    }

}
