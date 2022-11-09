<?php
class TaskListController extends AbstractController {

  public function render () : void {
      $search = null;
      $orderBy = null;



      if(isset($_GET['search'])){
          $search = $_GET['search'];
      }

      if(isset($_GET['order-by'])){
          $orderBy = $_GET['order-by'];
      }




      echo get_template( __PROJECT_ROOT__ . "/Views/list.php", [
          'tasks' => $this->taskService->list(['search'=>$search, 'orderBy'=>$orderBy ])['tasks']
      ] );
  }

}