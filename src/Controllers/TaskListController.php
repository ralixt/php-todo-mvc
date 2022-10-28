<?php
class TaskListController extends AbstractController {
  
  public function render () : void {
   echo get_template( __PROJECT_ROOT__ . "/Views/list.php", [
     'tasks' => $this->taskService->list()['tasks']
   ] );
  }
  
}