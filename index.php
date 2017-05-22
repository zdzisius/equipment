<html>

<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="sortable.css">
<script	src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<script src="sortable.js"></script>

<body>
    <div class="container">
        <h3> Lista sprzetu do wydania: </h3>
        
        <table>
            <thead>
            <tr style="font-weight: bold;"><td>Dzial</td><td>Rodzaj sprzetu</td><td>Pomieszczenie</td><td>MPK</td><td>Kontakt</td><td>Telefon</td><td>Status</td></tr>

            </thead>
        <tbody>
           
            <?php require_once('sortable.php'); ?> 
                      
        </tbody>
        </table>
        <br /><button class="save">save</button>

    </div>

</body>
</html>