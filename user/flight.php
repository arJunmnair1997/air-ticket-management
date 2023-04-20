
<?php
    require 'connection.php';
   
   
    $sql='SELECT * FROM flight';
    $statement=$connection->prepare($sql);
    $statement->execute();
    $flights=$statement->fetchAll(PDO::FETCH_OBJ);

?> 
<?php  require 'header.php'; ?>
<div class="w-100 mt-5 p-5 overflow-scroll overflow-x-hidden" style="height:300px">
    <table class="table table-primary table-striped text-center">
        <thead>
            <tr>
                <th>
                    SlNo
                </th>
                <th>
                    Name
                </th>
                <th>
                    Airline 
                </th>
                <th>
                    total Seats
                </th>
                <th>
                    Created By
                </th>
                <th>
                    Edited By 
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Edited At
                </th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
             foreach($flights as $flight): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $flight->name ?></td>
                    <td><?= $flight->airline_id ?></td>
                    <td><?= $flight->total_seat ?></td>
                    <td><?= $flight->created_by ?></td>
                    <td><?= $flight->edited_by ?></td>
                    <td><?= $flight->created_at ?></td>
                    <td><?= $flight->edited_at ?></td>
                    <td ><a href="edit.php?id=<?php echo $flight->id; ?>" class="btn btn-success" target="_blank">Edit</a></td>
                    <?php if(isset($_GET['msg'])){
                         echo "<script>alert('updated Successfully')</script>";}?>
                    <td><a href="delete.php?"class="btn btn-danger"onclick="return confirm('Are you sure?');">Delete</a>
                    <?php if(isset($_GET['del'])){
                         echo "<script>alert('Deleted Successfully')</script>";}?>
                </td>
                </tr>
            <tr>
            
            <?php
            $i=$i+1;
             endforeach ?>
        </tbody>
    </table>
</div> 
<?php

    require 'footer.php';
?>