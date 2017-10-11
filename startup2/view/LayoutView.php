<?php

namespace view;

class LayoutView {
  
  public function render($loginModel, $v, DateTimeView $dtv, $reminderView) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
         '. $this->registerNew() . '
        
          ' . $this->renderIsLoggedIn($loginModel->isLoggedIn()) . '
          
          <div class="container">
              ' . $v->response($loginModel) . '
              ' . $reminderView .'
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
 
  public function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) 
    {
      return '<h2>Logged in</h2>';
    }else 
    {
      return '<h2>Not logged in</h2>';
    }
  }

  private function registerNew(){
    if(isset($_GET['register']))
    {
        return '<a href="?">Back to login</a>'; 
    }else
    {
      return '<a href="?register">Register a new user</a>';
    }
     
  }

}
