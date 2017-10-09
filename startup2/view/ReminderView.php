<?php 


//TODO: En textruta där användaren kan fylla i komihåg saker, rutan ska sedan sparas på sidan. 

class ReminderView {

    private static $reminder = 'ReminderView::Reminder';

    public function reminder() {

        return 
            '<h2>Add something to yuor ToDo list:</h2>
            <form action="/Upload.php" method="post" id="reminderform">
            <textarea rows="3" cols="50" name="reminder">Enter a reminder here..</textarea> 
            <br>
            <input id="submit" type="submit" name="' . self::$reminder . '"  value="Add" />
            <br>
            </form>'

}

}
