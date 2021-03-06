<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<div id="right-area">
	
<title>Clients View</title>
<div id="main-content">
<?php echo link_tag( ASSETS_DIR . SCRIPTS_DIR . 'module-add-user-validate/form-validate.css' ); ?></head>

</head>
<body>
<h2  id="title-area" style="padding: 20px; margin: auto 20px;">Clients View</h2>
<hr>
<div id="clients-list">
<h3 id="add-client"><?php echo anchor("clients/add", "Add New Client")?></h3>
<hr>
<h2>Active Clients</h2>
<table>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email Address</th>
<th>Edit</th>
<th>Deactivate</th>
</tr>
<?php if (isset($clients)) : foreach ($clients as $row) : ?>
<tr>
<td><?php echo $row->c_fname; ?></td>
<td><?php echo $row->c_lname; ?></td>
<td><?php echo $row->c_email; ?></td>
<td><?php echo anchor("clients/edit/$row->c_id", "Edit")?></td>
<td><?php echo anchor("clients/deactivate/$row->c_id", "Deactivate")?></td>
</tr>
<?php endforeach; ?>
<?php else :?>
<h2>No values found</h2>
<?php endif;?>


</table>
<hr>
<h2>Inactive Clients</h2>
<table>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email Address</th>
<th>Edit</th>
<th>Activate</th>
</tr>
<?php if (isset($clients2)) : foreach ($clients2 as $row) : ?>
<tr>
<td><?php echo $row->c_fname; ?></td>
<td><?php echo $row->c_lname; ?></td>
<td><?php echo $row->c_email; ?></td>
<td><?php echo anchor("clients/edit/$row->c_id", "Edit")?></td><td><?php echo anchor("clients/activate/$row->c_id", "Activate")?></td>
</tr>
<?php endforeach; ?>
<?php else :?>
<h2>No values found</h2>
<?php endif;?>


</table>
</div>
</div>
</div>
</body>
</html>