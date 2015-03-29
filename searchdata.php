<?php
session_start();

include('config.php');

if(isset($_GET['search_word']))
{
$search_word=$_GET['search_word'];

$sql=mysql_query("SELECT * FROM `listing` WHERE `id` LIKE '%$search_word%' OR `title` LIKE '%$search_word%' OR `location` LIKE '%$search_word%' ORDER BY `id` DESC LIMIT 20");

$count=mysql_num_rows($sql);

if($count === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

if($count > 0)
{

while($row=mysql_fetch_array($sql))
{
$bold_word='<b><a href="view.php?id='.$row['id'].'">'.$row['title'].'</a></b>';
$bold_word.='<br>Price per day: '.$row['price'];
$bold_word.='<br>Price per day+night: '.$row['price2'];

?>


<li><?php echo $bold_word; ?></li>
<?php
}
}
else
{

echo "<li>No Results</li>";

}


}
?>
