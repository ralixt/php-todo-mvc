<?php
class TaskListController extends AbstractController {

  public function render () : void {
      $search = null;
      $orderBy = null;
      $page = null;


      $url = "http://localhost/";
      if(isset($_GET['search'])){
          $search = $_GET['search'];
          $url = $url."?search=".$search;
      }

      if(isset($_GET['order-by'])){
          $orderBy = $_GET['order-by'];
          $url = $url."&order-by=".$orderBy;
      }
      if(isset($_GET['page'])){
          $page = $_GET['page'];
          $url = $url."&page".$page;
      }




      $data = $_GET;

      echo get_template( __PROJECT_ROOT__ . "/Views/list.php", [
          'tasks' => $this->taskService->list(['args'=>$data,'search'=>$search, 'orderBy'=>$orderBy, 'page'=>$page ])['tasks']
      ] );
  }

}