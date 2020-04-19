<?php include_once("layout/header.html");

$html = "<table class='table'>
  <thead class='thead-dark'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>picture</th>
      <th scope='col'>First</th>
      <th scope='col'>Last</th>
      <th scope='col'>email</th>
      <th scope='col'>marks</th>
      <th scope='col'>status</th>
      <th scope=''></th>
    </tr>
  </thead>
  <tbody>
";

while($row = $records->fetch_assoc()) {
$status = $row['status'] == 1 ? "text-success" : "text-danger"; 

$html .= "
  <form method='POST' action='update'>
  <input type='hidden' name='id' value='".$row['id']."'> 
  <tr>
  <th scope='row'>".$row['id']."</th>
  <td><div class='img-container'><img src='images/".$row['profile_picture']."'></div></td>
  <td><input class='form-control' name='first_name' value=".$row['first_name']."></td>
  <td><input class='form-control' name='last_name' value=".$row['last_name']."></td>
  <td><input class='form-control' name='email' value=".$row['email']."></td>
  <td><input class='form-control' name='marks' value=".$row['marks']."></td>
  <td>
  <select name='status' class='custom-select ".$status." '>
  <option value='1'>Active</option>
  <option value='0'>Inactive</option>
</select>
  </td>
  <td><button type='submit' class='btn btn-primary manage-button' >Edit</button><br><button type='submit' formaction='destroy' class='btn btn-outline-danger manage-button' >Delete</button></td>
    </tr>
    </form>
";
}

$html .= '</tbody></table>
<div class="container">
<h4>Insert new record</h4>
<form enctype="multipart/form-data" method="post" action="insert" class="form-inline">
    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="First Name" name="first_name">
    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Last Name" name="last_name">
    <input type="hidden" value="" name="profile_picture">
    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Email" name="email">
    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Marks" name="marks">
    <input type="file" name="image" accept="image/x-png,image/jpeg">

    <input type="checkbox" name="status" class="form-control mb-2 mr-sm-2" placeholder="Status">
    <label class="mb-2 mr-sm-2">Status</label>
          
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
  </form>
  </div>
';




echo $html;
include_once("layout/footer.html");

 ?>

