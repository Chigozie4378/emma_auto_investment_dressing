<?php
class Controller extends Model
{

  protected function insert($table_name, ...$values)
  {
    $data_array = array();

    // Add null as the first value
    $data_array[] = null;

    // Add the remaining values to the data array
    foreach ($values as $value) {
      $data_array[] = $value;
    }

    // Insert the data into the table
    $this->insertData($table_name, array($data_array));
  }
  protected function fetchAll($table_name)
  {
    // select all datas
    return $this->selectAll("$table_name");
  }
  protected function fetchAllDesc($table_name)
  {
    // select all datas
    return $this->selectAllDesc("$table_name");
  }
  protected function fetchWhereAnd($table_name, ...$where_clauses)
  {
    $where_array = array();
    foreach ($where_clauses as $where_clause) {
      $parts = explode('=', $where_clause);
      $key = trim($parts[0]);
      $value = trim($parts[1]);
      $where_array[$key] = $value;
    }

    return $this->selectWhereAnd($table_name, $where_array);
  }
  protected function fetchWhereOr($table_name, ...$where_clauses)
  {
    $where_array = array();
    foreach ($where_clauses as $where_clause) {
      $parts = explode('=', $where_clause);
      $key = trim($parts[0]);
      $value = trim($parts[1]);
      $where_array[$key] = $value;
    }

    return $this->selectWhereOr($table_name, $where_array);
  }
  protected function fetchWhereLikeOr($table_name, ...$where_clauses)
  {
    $where_array = array();
    foreach ($where_clauses as $where_clause) {
      $parts = explode('=', $where_clause);
      $key = trim($parts[0]);
      $value = trim($parts[1]);
      $where_array[$key] = '%' . $value . '%'; // Add wildcards to value
    }

    return $this->selectWhereOr($table_name, $where_array);
  }
  protected function fetchWhereLikeAnd($table_name, ...$where_clauses)
  {
    $where_array = array();
    foreach ($where_clauses as $where_clause) {
      $parts = explode('=', $where_clause);
      $key = trim($parts[0]);
      $value = trim($parts[1]);
      $where_array[$key] = '%' . $value . '%'; // Add wildcards to value
    }

    return $this->selectWhereAnd($table_name, $where_array);
  }

  protected function trashWhere($table_name, ...$where_clauses)
  {
    $where_array = array();
    foreach ($where_clauses as $where_clause) {
      $parts = explode('=', $where_clause);
      $key = trim($parts[0]);
      $value = trim($parts[1]);
      $where_array[$key] = $value;
    }

    return $this->deleteWhere($table_name, $where_array);
  }


  protected function updates($table, $update_columns, $where_columns)
  {
    $this->updateData($table, $update_columns, $where_columns);
  }
}