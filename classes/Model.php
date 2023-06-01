<?php
class Model extends DB
{
    function __construct()
    {
        $this->connect();
    }

    function __destruct()
    {
        $this->closeConnection();
    }


    protected function closeConnection()
    {
        $dbconn = $this->connect();
        if ($dbconn) {
            $dbconn->close();
        }
    }
    protected function insertData($table_name, $data_array)
    {

        $dbconn = $this->connect();
        // Build query string
        $query = "INSERT INTO $table_name VALUES (";
        $query .= str_repeat('?,', count($data_array[0]));
        $query = rtrim($query, ',');
        $query .= ")";

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = '';
        foreach ($data_array[0] as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_double($value)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }
        $stmt->bind_param($types, ...array_values($data_array[0]));

        // Execute the statement for each set of data
        foreach ($data_array as $data) {
            $stmt->execute();
            if ($stmt->error) {
                die("Error: " . $stmt->error . $data);
            }
        }

        // Close statement and connection
        $stmt->close();
    }

    protected function selectWhereAnd($table_name, $where_array)
    {
        $dbconn = $this->connect();

        // Build query string
        $query = "SELECT * FROM $table_name WHERE ";
        $where_clause = array();
        foreach ($where_array as $key => $value) {
            if (strpos($value, '%') !== false) {
                $where_clause[] = "$key LIKE ?";
            } else {
                $where_clause[] = "$key = ?";
            }
        }
        $query .= implode(" AND ", $where_clause);

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = "";
        foreach ($where_array as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($where_array));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }
    protected function selectWhereAndLimit($table_name, $where_array)
    {
        $dbconn = $this->connect();

        // Build query string
        $query = "SELECT * FROM $table_name WHERE ";
        $where_clause = array();
        foreach ($where_array as $key => $value) {
            if (strpos($value, '%') !== false) {
                $where_clause[] = "$key LIKE ?";
            } else {
                $where_clause[] = "$key = ?";
            }
        }
        $query .= implode(" AND ", $where_clause);

        // Add ORDER BY id DESC LIMIT 1 clause
        $query .= " ORDER BY id DESC LIMIT 1";

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = "";
        foreach ($where_array as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($where_array));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }

    protected function selectWhereOr($table_name, $where_array)
    {
        $dbconn = $this->connect();

        // Build query string
        $query = "SELECT * FROM $table_name WHERE ";
        $where_clause = array();
        foreach ($where_array as $key => $value) {
            if (strpos($value, '%') !== false) {
                $where_clause[] = "$key LIKE ?";
            } else {
                $where_clause[] = "$key = ?";
            }
        }
        $query .= implode(" OR ", $where_clause);

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = "";
        foreach ($where_array as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($where_array));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }
    protected function selectAll($table_name)
    {
        $dbconn = $this->connect();

        // Prepare the statement with a placeholder for the table name
        $stmt = $dbconn->prepare("SELECT * FROM $table_name");

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }
    protected function selectAllDesc($table_name)
    {
        $dbconn = $this->connect();

        // Prepare the statement with a placeholder for the table name
        $stmt = $dbconn->prepare("SELECT * FROM $table_name ORDER BY id DESC");

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }
    protected function selectAllDescLimit($table_name)
    {
        $dbconn = $this->connect();

        // Prepare the statement with a placeholder for the table name
        $stmt = $dbconn->prepare("SELECT * FROM $table_name ORDER BY id DESC LIMIT 1");

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }


    protected function deleteWhere($table_name, $where_array)
    {
        $dbconn = $this->connect();

        // Build query string
        $query = "DELETE FROM $table_name WHERE ";
        $where_clause = array();
        foreach ($where_array as $key => $value) {
            $where_clause[] = "$key = ?";
        }
        $query .= implode(" AND ", $where_clause);

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = "";
        foreach ($where_array as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($where_array));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }

    protected function updateData($table, $update_columns, $where_columns)
    {
        $dbconn = $this->connect();
        // Construct the SQL query
        $sql = "UPDATE $table SET ";

        $update_values = array();
        foreach ($update_columns as $column_name => $new_value) {
            $sql .= "$column_name = ?, ";
            $update_values[] = $new_value;
        }
        // Remove the trailing comma and space
        $sql = rtrim($sql, ', ');

        // Append the WHERE clause to the SQL query
        if (!empty($where_columns)) {
            $sql .= " WHERE ";
            $where_values = array();
            foreach ($where_columns as $column_name => $old_value) {
                $sql .= "$column_name = ? AND ";
                $where_values[] = $old_value;
            }
            // Remove the trailing "AND" and space
            $sql = rtrim($sql, 'AND ');
            $update_values = array_merge($update_values, $where_values);
        }

        // Prepare and execute the SQL query
        $stmt = $dbconn->prepare($sql);

        // Create types string for bind_param based on the types of the update_values
        $types = '';
        foreach ($update_values as $value) {
            if (is_numeric($value)) {
                $types .= 'i';
            } else {
                $types .= 's';
            }
        }

        // Bind the parameters with types
        $stmt->bind_param($types, ...array_values($update_values));
        $stmt->execute();

        // Close statement and connection
        $stmt->close();
    }

    protected function selectWhereOperation($table_name, $where_array, $operation, $column_name)
    {
        $dbconn = $this->connect();

        switch (strtolower($operation)) {
            case 'sum':
                $query = "SELECT SUM($column_name) AS value FROM $table_name WHERE ";
                break;
            case 'count':
                $query = "SELECT COUNT($column_name) AS value FROM $table_name WHERE ";
                break;
            default:
                throw new Exception("Invalid operation: $operation");
        }

        // Build WHERE clause
        $where_clause = array();
        foreach ($where_array as $key => $value) {
            if (strpos($value, '%') !== false) {
                $where_clause[] = "$key LIKE ?";
            } else {
                $where_clause[] = "$key = ?";
            }
        }
        $query .= implode(" AND ", $where_clause);

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = "";
        foreach ($where_array as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($where_array));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();

        // Return the result object
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }
    protected function selectWhereAndDesc($table_name, $where_array)
    {
        $dbconn = $this->connect();

        // Build query string
        $query = "SELECT * FROM $table_name WHERE ";
        $where_clause = array();
        foreach ($where_array as $key => $value) {
            if (strpos($value, '%') !== false) {
                $where_clause[] = "$key LIKE ?";
            } else {
                $where_clause[] = "$key = ?";
            }
        }
        $query .= implode(" AND ", $where_clause);

        // Add ORDER BY id DESC LIMIT 1 clause
        $query .= " ORDER BY id DESC";

        // Prepare the statement
        $stmt = $dbconn->prepare($query);

        // Bind parameters
        $types = "";
        foreach ($where_array as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_double($value)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        $stmt->bind_param($types, ...array_values($where_array));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close statement and connection
        $stmt->close();


        // Return the result object
        return $result;
    }

    public function invoiceLock()
    {
        $dbconn = $this->connect();
        $stmt = $dbconn->prepare("SELECT * FROM sales FOR UPDATE");
        $stmt->execute();
        $stmt->close();
    }
    public function invoiceUnlock()
    {
        $dbconn = $this->connect();
        $stmt = $dbconn->prepare("UNLOCK TABLES");
        $stmt->execute();
        $stmt->close();
    }
}
