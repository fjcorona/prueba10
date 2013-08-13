<?php
namespace Tablas\Model;
/**
 * Componentes necesarios para el modelado
 */
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select as Select;
/**
 * @package FuerzaventamenTable
 */
class FuerzaventamenTable extends AbstractTableGateway{
    /**
     * Nombre de la Tabla
     * @var type 
     */
    protected $table  = 'fuerzaventamen';
    
    /**
     * Configura Adaptador de Base de Datos
     * 
     * @param \Zend\Db\Adapter\Adapter $adapter
     */
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }
    
    /**
     * Realiza una consulta utilizandon left join
     * 
     * @param type $nombrePuesto
     * @return type
     */
    public function findByPosition(){
        
       $resultSet = $this->select(
                function (Select $select){ 
                    $select->limit(51);
                }
          
         );
         
        
        $resultSet->buffer();
        $resultSet->next();       
        return $this->getEntitiesJoin($resultSet);
    }
    
   /**
    * Selecciona columnas para vista
    * 
    * @param type $resultSet
    * @return type
    */
    private function getEntitiesJoin($resultSet){
        $entities = array();
        
        foreach ($resultSet as $row){
            $map= array(
                'nomina' => $row->nomina,
                'division' => $row->division,
                'ap_paterno' => $row->ap_paterno,
                'ap_materno' => $row->ap_materno,
                'nombres' => $row->nombres,
                'fecha_nacim' => $row->fecha_nacim,
            ); 
            
            $entities[] = $map;  

        }
        
        return $entities;
    }
    
    
    public function findByPosition2(){
        
      $resultSet = $this->select(
                function (Select $select){
                    $select->join(array('cp'=>'cat_puesto'),
                                'cp.id=fuerzaventamen.puesto');
                    //$select->where('puesto=96');
                    //$select->where('cp.nombre = "VENDEDOR"');
                    $select->where('cp.id=96');
                    $select->limit(1000);
                    $select->order('nomina ASC');
                }
          
         );
         
        $resultSet->buffer();
        $resultSet->next();       
        return $this->getEntitiesJoin2($resultSet);
    }
    
   public function findByPosition3(){
        
      $resultSet = $this->select(
              
                function (Select $select){
                        $select->join(
                        array('cp'=>'cat_puesto'),
                        'cp.id=fuerzaventamen.puesto',
                        $select::SQL_STAR,
                        $select::JOIN_LEFT
                    ) 
                    ->where('cp.id=96')
                    ->order('nomina ASC')
                    ->limit(1000)
                    ;
                }
               );
                 
        $resultSet->buffer();
        $resultSet->next();
        return $this->getEntitiesJoin2($resultSet);
    }
    
        
    /**
    * Selecciona columnas para vista
    * 
    * @param type $resultSet
    * @return type
    */
    private function getEntitiesJoin2($resultSet){
        $entities = array();
        
        foreach ($resultSet as $row){
            $map= array(
                'nomina'        => $row->nomina,
                'division'      => $row->division,
                'ap_paterno'    => $row->ap_paterno,
                'ap_materno'    => $row->ap_materno,
                'nombres'       => $row->nombres,
                'puesto'        => $row->nombre,
                'fecha_nacim'   => $row->fecha_nacim,
            ); 
            
            $entities[] = $map;  

        }
        
        return $entities;
    }

}

