<?php require_once 'VIEWS/inc/header.php' ?>




<table class="table container-xxl my-5 ">
<thead>
<tr>
    <th scope="col"></th>
    <th scope="col">First</th>
    <th scope="col">Last</th>
    <th scope="col">Handle</th>
</tr>
</thead>
<tbody>
<?php foreach($users as $l ):?>
    <tr>
    <th scope="row"><?= $l['id']; ?></th>
    <td><?= $l['nom']; ?></td>
    <td><?= $l['email']; ?></td>
    <td><?= $l['password']; ?></td>
    </tr>
<?php endforeach;?>

</table>



    
<?php require_once 'VIEWS/inc/footer.php' ?>