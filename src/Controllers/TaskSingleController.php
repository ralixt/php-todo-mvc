<?php

class TaskSingleController extends AbstractController {
  
  public function __construct() {
    // TODO faire des trucs
  }
  
  public function render() : void {
    // TODO remplacez les valeurs avec celles d'une tâche
    echo get_template( __PROJECT_ROOT__ . "/views/single.php", [
      'task' => null,
      'editing' => null
    ]);
  }

  

}