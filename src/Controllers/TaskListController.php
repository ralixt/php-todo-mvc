<?php

class TaskListController extends AbstractController
{

    public function render(): void
    {
        $search = null;
        $orderBy = null;
        $page = null;

        $completd = null;


        $url = "http://localhost/";
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            //$url = $url."?search=".$search;
        }

        if (isset($_GET['order-by'])) {
            $orderBy = $_GET['order-by'];
            //$url = $url."&order-by=".$orderBy;
        }
        if (isset($_GET['page'])) {
            /*
            $p= $_GET['page'];
            $x = intval($p)+1;
            $page=(string)$x;
            */

            $page= $_GET['page'];
            //$url = $url."&page".$page;
        }

        /*
        if (isset($_GET['only-show-completed'])) {
            $completed = false;
        }
        */

        /*
        if (isset($_GET['hideCompleted'])) {
            $completed = false;
        }
        */



        $data = $_GET;


        echo get_template(
            __PROJECT_ROOT__ . "/Views/list.php",
            [
                'params' => $data,
                'tasks' => $this->taskService->list([
                    'search' => $search,
                    'orderBy' => $orderBy,
                    /*'hideCompleted' => $completed,*/
                    'page' => $page
                ])['tasks']
            ]
        );
    }


}