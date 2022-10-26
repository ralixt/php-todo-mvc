<?php

class MemoryTaskService implements TaskServiceInterface {
  
  use SingletonTrait;
  
  /**
   * @var TaskEntity[]
   */
  private array $data;
  
  protected function __construct() {
    $this->init();
  }
  
  
  /**
   * Generate sample tasks
   *
   * @return void
   */
  private function init() : void {
    $this->data = [];
    for ($i = 0; $i < 30; $i++) {
      $this->data[$i] = (new TaskEntity())
        ->setId( $i )
        ->setTitle("Tâche n°" . $i + 1 )
        ->setDescription( "Contenu de ma tâche" )
        ->setCompleted( $i % 2 === 0 )
        ->setCreatedAt( "2022-10-2" . $i % 10 . "T16:53:44" )
        ->setUpdatedAt("2022-10-24T16:53:44" )
        ->setCompleted( "2022-10-24T16:53:44" );
    }
  }
  
  
  /**
   * @inheritDoc
   */
  public function get ( int $id ) : ?TaskEntity {
    return $this->data[$id] ?? null;
  }
  
  
  /**
   * @inheritDoc
   */
  public function list ( array $args = [] ) : array {
    $results = [];
    
    foreach ($this->data as $task) {
      if ( isset($args['search']) && !str_contains($task->getTitle(), $args['search']) )
        continue;
      
      if ( isset($args['hideCompleted']) && $args['hideCompleted'] && $task->isCompleted())
        continue;
      
      $results[] = $task;
    }
    
    return $results;
  }
  
  
  /**
   * @inheritDoc
   */
  public function create ( TaskEntity $task ) : TaskEntity {
    $lastId = count($this->data);
    
    $this->data[$lastId] = $task;
    $task->setId($lastId);
    $task->setCreatedAt( date("Y-m-d H:i:s") );
    
    return $task;
  }
  
  
  /**
   * @inheritDoc
   */
  public function update ( TaskEntity $task ) : TaskEntity {
    $this->data[ $task->getId() ] = $task;
    return $task;
  }
  
  
  /**
   * @inheritDoc
   */
  public function delete ( int $id ) : void {
    unset( $this->data[ $id ] );
  }
}