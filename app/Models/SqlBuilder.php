<?php

namespace App\Models;

use Aura\SqlQuery\QueryFactory;
use PDO;

class SqlBuilder
{
    private $pdo;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }
    
    protected function build_query($action, $table, $cols=null, $fetch=null, $extra_options=null) {
        if($action == 'select') {
            $query = $this -> queryFactory -> newSelect();
            $query -> from($table);
        }

        if($action == 'insert') {
            $query = $this -> queryFactory -> newInsert();
            $query -> into($table);
        }

        if($action == 'update') {
            $query = $this -> queryFactory -> newUpdate();
            $query -> table($table);
        }

        if($action == 'delete') {
            $query = $this -> queryFactory -> newDelete();
            $query -> from($table);
        }

        if(!empty($cols) && $cols != '*') {
            $query -> cols($cols);
        } elseif($cols == '*') {
            $query -> cols(['*']);
        } 

        if(!empty($extra_options['join'])) {
            $query -> join($extra_options['join']['join_type'], 
                           $extra_options['join']['join_table'], 
                           $extra_options['join']['join_expression']);
        }

        if(!empty($extra_options['setPaging']) && !empty($extra_options['page'])) {
            $query -> setPaging($extra_options['setPaging'])
                   -> page($extra_options['page']);
        }

        if(!empty($extra_options['where']) && !empty($extra_options['bindValues'])) {
            if(is_array($extra_options['where'])) {
                foreach($extra_options['where'] as $where) {
                    $query -> where($where);
                }
                $query -> bindValues($extra_options['bindValues']);
            } else {
                $query  -> where($extra_options['where'])
                        -> bindValues($extra_options['bindValues']);
            }
        }

        $sth = $this->pdo->prepare($query->getStatement());
        
        if($sth -> execute($query->getBindValues()) && $action != 'select') {return true;} 
        elseif($sth -> execute($query->getBindValues()) && $action == 'select') {
            if($fetch == 'all') {
                $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            elseif($fetch == 'one') {
                $result = $sth -> fetch(PDO::FETCH_ASSOC);
                return $result;
            }}
        else {return false;}
    }
}
