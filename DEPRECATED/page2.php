<? $x = $_POST["numstocks"]; 

 //want to retrieve info from last page and print out the stocks


<? for(i=1; $i<$x; ++i){

print $_POST["stock" . $i]. </ br>;

}?>