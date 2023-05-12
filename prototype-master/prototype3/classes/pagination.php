
<?php
include './connect.php';

class Paginate extends connect
{
    public function getData($page, $table, $limit)
    {
        $this->connection();
        try {
            $offset = ($page - 1) * $limit;
            $stmt = $this->pdo->prepare("SELECT DISTINCT *
            FROM $table
            LIMIT :limit 
            OFFSET :offset;");
            // $stmt->bindParam(':table', $table, PDO::PARAM_STR);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $allData = $stmt->fetchAll();
            return $allData;
        } catch (PDOException $e) {
            throw new Exception('error getting all ' . $e->getMessage());
        }
    }

    public function getCount($table)
    {
        $this->connection();
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $table");
        // $stmt->bindParam(':table', $table, PDO::PARAM_STR);
        $stmt->execute();
        $tableLength = $stmt->fetchColumn();

        $pagesNum = 0;

        if (($tableLength % 6) == 0) {
            $pagesNum = $tableLength / 6;
        } else {
            $pagesNum = ceil($tableLength / 6);
        }
        return $pagesNum;
    }
}



$test = new Paginate;

echo "<pre>";
print_r($test->getCount('project'));
echo "</pre>";



