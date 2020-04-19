<?php include_once("layout/header.html") ?>
    <h4 class='text-center' style='margin-top:10%'>Active records appear here</h4>
    <div class="records">
    <table class="table">
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>picture</th>
                <th scope='col'>First</th>
                <th scope='col'>Last</th>
                <th scope='col'>email</th>
                <th scope='col'>marks</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($records as $record) {
                echo "<tr>
                <th><div class='img-container'><img src='images/".$record['profile_picture']."'></div></th>
                <td>".$record['first_name']."</td>
                <td>".$record['last_name']."</td>
                <td>".$record['email']."</td>
                <td>".$record['marks']."</td>
    
                </tr>";
            }

        ?>
        <tbody>
       
        </tbody>
    </table>
    </div>

<?php include_once("layout/footer.html") ?>