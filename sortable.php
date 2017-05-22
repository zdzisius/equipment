<?php

// ----------------------------------------------------- Made by chris 2017 ----------------------------------------------------

require_once('config.php');

class Sortable {

private $host;
private $user;
private $pass;
private $db;
private $stare_pozycje = array();


    public function __construct($host, $user, $pass, $db){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function main() {

        if(isset($_REQUEST['data'])){       // getting post associated with jquery library (sortable.js)
            $data = $_REQUEST['data'];
            $this->update($data);
        }

        else {
            $this->getRows();
        }
    }

    public function update($data) {
        
        $con = $this->connect();

        // --------------------------------- Getting ids from the data to compare with new positions ------------------------

        $old_pozycje = mysqli_query($con, "select id from data order by pozycja asc");
        $numrows = mysqli_num_rows($old_pozycje);
        for($i=0; $i<$numrows; $i++ ) {

            $row = mysqli_fetch_array($old_pozycje);
            $this->stare_pozycje[] = $row['id'];
        }


        // --------------------------------- Establishing and updating to db new positions ----------------------------------
        
        parse_str($data, $str);
        $pozycje = $str['item'];     
        $i = 1;

        foreach($pozycje as $key => $value) {
           
            $id = $this->stare_pozycje[$value-1];        
            mysqli_query($con, "update data set pozycja='$i' where id='$id'");                   
            $i++;
        }        

        echo "Kolejnosc zmieniona";
        $dcon = $this->disconnect($con);
    }



         // ---------------------------------- View table with data ordered by position ---------------------------------------- 

    public function getRows() {

        $con = $this->connect();
        $result = mysqli_query($con, "select * from data order by pozycja asc");
        $numrows = mysqli_num_rows($result);       
        $dcon = $this->disconnect($con);  //mysqli_close($con);
        
        echo "<tr class='nosort'><td>Dzial Teleinformatyki</td><td>komputer</td><td>cwi</td><td>530505050</td><td>chris</td><td>21-96</td><td>w realizacji</td></tr>";

        for($i=0; $i<$numrows; $i++ ){

            $row = mysqli_fetch_array($result);
            echo "<tr id=item_$row[pozycja]><td id=$row[pozycja]>$row[dzial]</td><td>$row[rodzaj_sprzetu]</td><td>$row[pomieszczenie]</td><td>$row[mpk]</td><td>$row[kontakt]</td><td>$row[telefon]</td><td>$row[status]</td></tr>";
      
        }
       

    }

        // -------------------------------- establishing connection to the db --------------------------------------------------

    public function connect() {

        $connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db) or die ('connecting error');
        return $connect;
    }


    public function disconnect($con) {

        mysqli_close($con);
        return null;
    }


}

$rowsObj = new Sortable($host, $user, $pass, $db);
$rowsObj->main();


?>