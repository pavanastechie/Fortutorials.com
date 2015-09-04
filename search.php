<?php
      $k=$_GET['k'];
$terms=explode(" ", $k);
$query="SELECT * FROM searchengine WHERE";
foreach ($terms as $each){
$i++;
if($i==1)
$query ="keywords LIKE '%$each%' ";
else
$query ="OR keywords LIKE '%$each%' ";
}

//connect
mysql_connect("mysql11.000webhost.com", "a1215634_search", "pavan48");
mysql_select_db("a1215634_search");
$result=mysql_query($query );
$numrows = mysql_num_rows($result);
if($numrows > 0)
{
while($row=mysql_fetch_assoc($query)){
$id=$row['id'];
$title=$row['title'];
$description=$row['description'];
$keywords=$row['keywords'];
$url=$row['url'];
echo "<h2> <a href='$url'>$title</h2>
$description<br/><br/>";
}
}
else
echo "no results found for \"<b>$k</b>\"";

//disconnect
mysql_close();
?>